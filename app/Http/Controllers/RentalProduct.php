<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlProduct;
use App\MdlProductCategory;

use App\MdlRentalCategory;
use App\MdlRentalProduct;

class RentalProduct extends Controller
{
    public function __construct() {        
        
    }

    public function lists(Request $request, $rc_id) {
        //echo $pc_id;                
        $category = MdlRentalCategory::find($rc_id);
        if(!empty($category)) {
            $records = MdlRentalProduct::where('rc_idfk', $rc_id)->orderBy('name', 'ASC')->get();
            //$category = MdlProductCategory::find($rc_id);
            //dd($category->name);
            return view('rental.product_list')->with(['rc_id'=>$rc_id,'records'=>$records,'category_name'=>$category->category_name]);
        }        
    }

    public function add(Request $request, $rc_id) {
        $category = MdlRentalCategory::find($rc_id);
        if(empty($category)) { die('Wala'); }

        if($request->isMethod('post') && !empty($rc_id)) {

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
            MdlRentalProduct::create([
                'name' => $request->input('name'),
                'description' => htmlspecialchars($request->input('description')),
                'rc_idfk' => $rc_id,
                'image_url' => $filename,
                'stock' => $request->input('stock'),
                'status' => 1,
                'rental_type' => $request->input('rental_type'),
                'rental_rate' => $request->input('rental_rate')
            ]);

            Session::flash('success', 'Product has been created!');
            return redirect('rent_prod'.'/'.$rc_id);
        }
        return view('rental.product_add')->with([
            'rc_id'=>$rc_id,
            'category_name'=>$category->category_name,
            'ckeditor'=>TRUE]);
    }

    public function edit(Request $request, $rc_id, $rp_id) {
        $category = MdlRentalCategory::find($rc_id);
        $product = MdlRentalProduct::find($rp_id);
        
        if(empty($category) || empty($product)) { die('Wala'); }

        if($request->isMethod('post')) {
            // Validate inputs
            $rules = $this->getRules();
            $rules['name'] = 'required';

            $filename = NULL;            
            $hasFiles = FALSE;

            if($request->hasFile('images')) {                
                $hasFiles = TRUE;
                $rules['images'] = 'mimes:jpg,png,gif';
            }

            Validator::make($request->all(), $rules)->validate();

            // Files
            if($hasFiles) {                            
                $filename = $this->uploadFiles($request);

                $product->image_url = $filename;
            }
            
            $product->name = $request->input('name');
            $product->description = htmlspecialchars($request->input('description'));            
            $product->stock = $request->input('stock');
            $product->rental_type = $request->input('rental_type');
            $product->rental_rate = $request->input('rental_rate');            
            $product->save();

            Session::flash('success', 'Product has been updated!');
            return redirect('rent_prod'.'/'.$rc_id);
        }

        return view('rental.product_edit')->with([
            'rc_id'=>$rc_id,
            'rp_id'=>$rp_id,
            'category_name'=>$category->category_name,
            'product'=>$product,
            'ckeditor'=>TRUE]);
    }

    public function delete(Request $request) {  
        $output = [];      
        if( $request->input('rp_id') && $request->input('_token') ) {        

            $p = MdlRentalProduct::whereIn('rp_id', $request->input('rp_id'));
            $p->delete();            
            
            $output['success'] = true;
            $output['msg'] = 'Products has been remove!';
        } else {
            $output['success'] = false;
            $output['msg'] = 'Invalid request';
        }        
        echo json_encode($output);
    }

    protected function getRules() {
        return [
            'name' => 'required|unique:tbl_rental_products',            
            'stock' => 'required|integer',
            'description' => 'required',
            'rental_rate' => 'required|numeric',
            'rental_type' => 'required',
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
