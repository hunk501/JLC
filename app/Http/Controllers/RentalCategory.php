<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlRentalCategory;
use App\MdlRentalProduct;

class RentalCategory extends Controller
{
    public function __construct() {        
        $this->middleware('auth');    
    }

    public function lists() {

        // Lists 
        $records = MdlRentalCategory::all();
        //dd($records);
        return view('rental.category_list')->with(['records'=>$records]);
    }

    public function form(Request $request) {

        if($request->isMethod('post')) {

            // Validate
            Validator::make($request->all(), $this->getRules())->validate();

            // Create category
            MdlRentalCategory::create([
                'Category_name' => $request->input('category_name')
            ]);

            Session::flash('success', 'Rental Category has been created!');
            return redirect('rent_cat');
        }

        return view('rental.category_add');        
    }

    public function delete(Request $request) {  
        $output = [];      
        if( $request->input('rc_id') && $request->input('_token') ) {        

            // Remove Category
            $pcat = MdlRentalCategory::whereIn('rc_id', $request->input('rc_id'));
            $pcat->delete();
            
            // Remove Products
            $pd = MdlRentalProduct::whereIn('rc_idfk', $request->input('rc_id'));
            $pd->delete();
            
            $output['success'] = true;
            $output['msg'] = 'Rental Category has been remove!';
        } else {
            $output['success'] = false;
            $output['msg'] = 'Invalid request';
        }        
        echo json_encode($output);
    }

    public function edit(Request $request, $rc_id) {
        $category = MdlRentalCategory::find($rc_id);
        if(empty($category)) { die("WALA"); }

        if($request->isMethod('post')) {
            $rules = $this->getRules();
            $rules['category_name'] = 'required';

            // Validate inputs
            Validator::make($request->all(), $rules)->validate();
            
            $category->category_name = $request->input('category_name');            
            $category->save();

            Session::flash('success', 'Category has been updated!');
            return redirect('rent_cat');
        }

        return view('rental.category_edit')->with(['rc_id'=>$rc_id,'category'=>$category]);
    }

    private function getRules() {
        return [
            'category_name' => 'required|unique:tbl_rental_category'
        ];
    }
}
