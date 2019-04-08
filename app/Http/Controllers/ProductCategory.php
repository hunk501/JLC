<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlProductCategory;
use App\MdlProduct;

class ProductCategory extends Controller
{
    public function __construct() {        
        
    }

    public function lists() {

        // Lists 
        $records = MdlProductCategory::all();
        //dd(count($records));
        return view('category.category_lists')->with(['records'=>$records]);
    }

    public function form(Request $request) {

        if($request->isMethod('post')) {

            // Validate
            Validator::make($request->all(), $this->getRules())->validate();

            // Create product category
            MdlProductCategory::create([
                'name' => $request->input('name'),
                'image_url' => $request->input('image')
            ]);

            Session::flash('success', 'Product Category has been created!');
            return redirect('category');
        }

        return view('category.category_form');        
    }

    public function delete(Request $request) {  
        $output = [];      
        if( $request->input('pc_id') && $request->input('_token') ) {        

            // Remove Product Category
            $pcat = MdlProductCategory::whereIn('pc_id', $request->input('pc_id'));
            $pcat->delete();
            
            // Remove Products
            $pd = MdlProduct::whereIn('pc_idfk', $request->input('pc_id'));
            $pd->delete();
            
            $output['success'] = true;
            $output['msg'] = 'Product Category has been remove!';
        } else {
            $output['success'] = false;
            $output['msg'] = 'Invalid request';
        }        
        echo json_encode($output);
    }

    public function edit(Request $request, $pc_id) {
        $category = MdlProductCategory::find($pc_id);
        if(empty($category)) { die("WALA"); }

        if($request->isMethod('post')) {
            $rules = $this->getRules();
            $rules['name'] = 'required';

            // Validate inputs
            Validator::make($request->all(), $rules)->validate();
            
            $category->name = $request->input('name');
            $category->image_url = $request->input('image');
            $category->save();

            Session::flash('success', 'Category has been updated!');
            return redirect('category');
        }

        return view('category.category_edit')->with(['pc_id'=>$pc_id,'category'=>$category]);
    }

    private function getRules() {
        return [
            'name' => 'required|unique:tbl_product_category'
        ];
    }

}
