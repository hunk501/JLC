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

    // |unique:tbl_insurance'
    protected function getRules() {
        return [
            'name' => 'required',            
            'stock' => 'required|integer',
            'description' => 'required'
        ];        
    }

}
