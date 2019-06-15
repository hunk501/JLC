<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlProduct;
use App\MdlProductCategory;

class Products extends Controller
{
    public function __construct() {        
        $this->middleware('auth');
    }

    public function lists(Request $request, $pc_id) {
        //echo $pc_id;                
        $category = MdlProductCategory::find($pc_id);
        if(!empty($category)) {
            $records = MdlProduct::where('pc_idfk', $pc_id)->orderBy('name', 'ASC')->get();
            $category = MdlProductCategory::find($pc_id);
            //dd($category->name);
            return view('product.product_lists')->with([
                'pc_id'=>$pc_id,
                'records'=>$records,
                'pc_name'=>$category->name,
                'page_type'=>$category->page_type]);
        }        
    }

    public function add(Request $request, $pc_id) {
        $category = MdlProductCategory::find($pc_id);
        if(empty($category)) { die('Wala'); }

        if($request->isMethod('post') && !empty($pc_id)) {

            $filename = NULL;
            $rules = $this->getRules();
            $hasFiles = FALSE;

            if($request->hasFile('images')) {                
                $hasFiles = TRUE;
                $rules['images'] = 'mimes:jpg,png,gif';
            }

            // Validate inputs
            Validator::make($request->all(), $rules)->validate(); 
            
            // Files
            if($hasFiles) {
                $filename = $this->uploadFiles($request);
            }

            // Create Product
            MdlProduct::create([
                'name' => $request->input('name'),
                'description' => htmlspecialchars($request->input('description')),
                'pc_idfk' => $pc_id,
                'image_url' => $filename,
                'stock' => $request->input('stock'),
                'status' => 1
            ]);

            Session::flash('success', 'Product has been created!');
            return redirect('product'.'/'.$pc_id);
        }
        return view('product.product_form')->with([
            'pc_id'=>$pc_id,
            'pc_name'=>$category->name,
            'page_type'=>$category->page_type,
            'ckeditor'=>TRUE]);
    }

    public function edit(Request $request, $pc_id, $p_id) {
        $category = MdlProductCategory::find($pc_id);
        $product = MdlProduct::find($p_id);
        
        //dd($category->toArray());

        if(empty($category) || empty($product)) { die('Wala'); }

        if($request->isMethod('post')) {

            $filename = NULL;
            $rules = $this->getRules();
            $hasFiles = FALSE;

            if($request->hasFile('images')) {                
                $hasFiles = TRUE;
                $rules['images'] = 'mimes:jpg,png,gif';
            }

            // Validate inputs
            Validator::make($request->all(), $this->getRules())->validate();

            // Files
            if($hasFiles) {                
                $filename = $this->uploadFiles($request);

                $product->image_url = $filename;
            }
            
            $product->name = $request->input('name');
            $product->description = htmlspecialchars($request->input('description'));            
            $product->stock = $request->input('stock');
            $product->save();

            Session::flash('success', 'Product has been updated!');
            return redirect('product'.'/'.$pc_id);
        }

        return view('product.product_edit')->with([
            'pc_id'=>$pc_id,
            'p_id'=>$p_id,
            'pc_name'=>$category->name,
            'product'=>$product,
            'page_type'=>$category->page_type,
            'ckeditor'=>TRUE]);
    }

    public function delete(Request $request) {  
        $output = [];      
        if( $request->input('p_id') && $request->input('_token') ) {        

            $p = MdlProduct::whereIn('p_id', $request->input('p_id'));
            $p->delete();            
            
            $output['success'] = true;
            $output['msg'] = 'Products has been remove!';
        } else {
            $output['success'] = false;
            $output['msg'] = 'Invalid request';
        }        
        echo json_encode($output);
    }

    // |unique:tbl_insurance'
    protected function getRules() {
        return [
            'name' => 'required',            
            'stock' => 'required|integer',
            'description' => 'required'
        ];        
    }


    public function uploadFiles($request) {

        if( $request->hasFile('images') ) {
            
            $images = $request->file('images');

            $filename = time() .'.'. $images->getClientOriginalExtension();
            $destination_path = public_path('/img');
            //$path = $request->file('images')->storeAs('images', $filename );

            $images->move($destination_path, $filename);

            return $filename;
        }

        return NULL;
    }

}
