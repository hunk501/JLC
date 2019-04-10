<?php
namespace App\Http\Controllers;

use Auth;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\MdlRentalCategory;
use App\MdlRentalProduct;
use App\MdlCart;

class Checkout extends Controller 
{
    private $breadcrumbs = [];

    public function __construct() {
        
    }

    public function confirm(Request $request) {
        
        // Cart
        if(!$request->session()->has('cart')) {
            return redirect('/cart');
        }

        // Check if user logged in
        if( Auth::user() ) {            
            echo "Loggin";
            $tmp = $request->session()->pull('from_checkout');
            $tmp1 = $request->session()->pull('total_qty');

            // Save Cart products
            $cart_session = $request->session()->pull('cart');
            foreach($cart_session as $rp_id => $qty) {
                MdlCart::create([
                    'rp_idfk' => $rp_id,
                    'user_id' => Auth::user()->id,
                    'qty' => $qty,
                    'status' => 0
                ]);
            } 
            
            $request->session()->put('thankyou', TRUE);

            return redirect('/checkout/thankyou');
        } else {
            $request->session()->put('from_checkout', TRUE);
            return redirect('/register');
        }

    }


    public function thankyou(Request $request) {
        
        if($request->session()->has('thankyou')) {
            $tmp = $request->session()->pull('thankyou');
            return view('shop.thankyou');
        } else {
            return redirect('/cart');
        }        
    }
    
}