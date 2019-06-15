<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlProductCategory;
use App\MdlProduct;
use App\MdlRequestQuote;

class RequestQuotes extends Controller
{
    public function __construct() {        
        $this->middleware('auth');
    }

    public function lists() {

        // Lists 
        $records = MdlRequestQuote::select(
            'tbl_request_quote.*', 
            'tbl_product.name as product_name', 
            'tbl_product_category.name as  product_category')
        ->join('tbl_product', 'tbl_product.p_id', '=', 'tbl_request_quote.service_id')
        ->join('tbl_product_category', 'tbl_product_category.pc_id', '=', 'tbl_product.pc_idfk')->get();

        //dd($records->toArray());
        return view('quotes.lists')->with(['records'=>$records]);
    }

    public function delete(Request $request) {  
        $output = [];      
        if( $request->input('id') && $request->input('_token') ) {        

            // Remove Product Category
            $pcat = MdlRequestQuote::whereIn('id', $request->input('id'));
            $pcat->delete();                    
            
            $output['success'] = true;
            $output['msg'] = 'Quote has been remove!';
        } else {
            $output['success'] = false;
            $output['msg'] = 'Invalid request';
        }        
        echo json_encode($output);
    }

}
