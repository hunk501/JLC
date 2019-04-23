<?php
namespace App\Http\Controllers;

use Auth;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\MdlRentalCategory;
use App\MdlRentalProduct;
use App\MdlCart;

class Orders extends Controller 
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function lists(Request $request) {

        $cart_products = MdlCart::all();
        //dd($cart_products);
        foreach($cart_products as $k => $p) {
            //echo"<pre>";print_r($p->getUser->toArray());
            //echo"<pre>";print_r($p->getProduct->toArray());
        }
        return view('orders.order_lists')->with(['records'=>$cart_products]);
    }
}