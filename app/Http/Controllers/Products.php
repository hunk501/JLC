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
            return view('product.product_lists')->with(['pc_id'=>$pc_id,'records'=>$records,'pc_name'=>$category->name]);
        }        
    }

    public function add(Request $request, $pc_id) {
        $category = MdlProductCategory::find($pc_id);
        if(empty($category)) { die('Wala'); }

        if($request->isMethod('post') && !empty($pc_id)) {

            // Validate inputs
            Validator::make($request->all(), $this->getRules())->validate();            
            // Create Product
            MdlProduct::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'pc_idfk' => $pc_id,
                'image_url' => $request->input('image'),
                'stock' => $request->input('stock'),
                'status' => 1
            ]);

            Session::flash('success', 'Product has been created!');
            return redirect('product'.'/'.$pc_id);
        }
        return view('product.product_form')->with(['pc_id'=>$pc_id,'pc_name'=>$category->name]);
    }

    public function edit(Request $request, $pc_id, $p_id) {
        $category = MdlProductCategory::find($pc_id);
        $product = MdlProduct::find($p_id);
        
        if(empty($category) || empty($product)) { die('Wala'); }

        if($request->isMethod('post')) {
            // Validate inputs
            Validator::make($request->all(), $this->getRules())->validate();
            
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->image_url = $request->input('image');
            $product->stock = $request->input('stock');
            $product->save();

            Session::flash('success', 'Product has been updated!');
            return redirect('product'.'/'.$pc_id);
        }

        return view('product.product_edit')->with(['pc_id'=>$pc_id,'p_id'=>$p_id,'pc_name'=>$category->name,'product'=>$product]);
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

}
