<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlProductCategory;

class ProductCategory extends Controller
{
    public function __construct() {        
        
    }

    public function lists() {

        // Lists 
        $records = MdlProductCategory::all();
        //dd($records);
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

    private function getRules() {
        return [
            'name' => 'required|unique:tbl_product_category'
        ];
    }

}
