<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlProduct;
use App\MdlProductCategory;
use App\MdlCart;

class Sales extends Controller
{
    public function __construct() {        
        $this->middleware('auth');
    }

    public function index(Request $request) {
        // Lists 
        $records = MdlCart::all();//MdlProductCategory::all();
        // foreach($records as $key => $record) {
        //     echo"<pre>";print_r($record->transaction_id);
        //     echo"<pre>";print_r($record->getProduct->toArray());
        // }
        // die();
        return view('sales.lists')->with(['records'=>$records]);
    }

    public function edit(Request $request, $transaction_id) {
        $category = MdlCart::find($transaction_id);
        if(empty($category)) { die("WALA"); }

        if($request->isMethod('post')) {        
            // Update status
            $category->status = $request->input('status');
            $category->save();

            Session::flash('success', 'Record has been updated!');
            return redirect('sales');
        }

        return view('sales.edit')->with(['transaction_id'=>$transaction_id,'record'=>$category]);
    }

    public function delete(Request $request) {  
        $output = [];      
        if( $request->input('transaction_id') && $request->input('_token') ) {        

            // Remove from Cart
            $pcat = MdlCart::whereIn('transaction_id', $request->input('transaction_id'));
            $pcat->delete();
            
            $output['success'] = true;
            $output['msg'] = 'Record has been remove!';
        } else {
            $output['success'] = false;
            $output['msg'] = 'Invalid request';
        }        
        echo json_encode($output);
    }

}