<?php
namespace App\Http\Controllers;

use Auth;
use Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailcheckout;
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
            $cart_session = $request->session()->get('cart');
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

            // Send Email
            $this->sendEmail($request);

            $tmp = $request->session()->pull('thankyou');
            return view('shop.thankyou');
        } else {
            return redirect('/cart');
        }        
    }

    private function sendEmail(Request $request) {
        $cart_session = $request->session()->pull('cart');
        
        $records = MdlCart::where("user_id", Auth::user()->id)
                    ->whereIn("rp_idfk", array_keys($cart_session))
                    ->get();

        $total = 0;
        $arrProducts = [];
        foreach($records as $record) {
            $product = $record->getProduct;            

            $qty = $record['qty'];
            $rental_rate = (int)$product['rental_rate'];
            $amount = ( $rental_rate * $qty);
            $total += $amount;
            $product->amount = $amount;
            $product->qty = $qty;   
            
            $arrProducts[] = $product;
        }

        //echo Auth::user()->id;
        //echo $total ."<br>";
        //dd($arrProducts);
        $output = [
            'total' => $total,
            'products' => $arrProducts
        ];
        Mail::to(Auth::user()->email)->send(new Mailcheckout($output));
    }
    
}