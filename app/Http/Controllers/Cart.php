<?php
namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\MdlRentalCategory;
use App\MdlRentalProduct;
use App\MdlSettings;

class Cart extends Controller 
{
    private $breadcrumbs = [];

    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        //echo"<prE>guest:"; print_r( Auth::guest() );echo"</pre>";
        // if(session('cart')) {
        //     echo"<prE>user: "; print_r( count(session('cart')) );echo"</pre>";
        // }        
        // if( Auth::user() ) {
        //     echo "Loggin";
        // }
        //die();
        $content = [
            'breadcrumb' => [
                [
                    'label' => "Home",
                    'href'  => url('/'),
                    'class' => ''
                ],
                [
                    'label' => "Rental",
                    'href'  => url('rental'),
                    'class' => ''
                ],
                [
                    'label' => "Cart",
                    'href'  => url('cart'),
                    'class' => 'active'
                ]
            ],
            'title' => 'Cart'
        ];

        //echo"<pre>";print_r( $request->session()->all() );echo"</pre>";
        //echo"<pre>";print_r( session('cart_products') );echo"</pre>";
                
        //$request->session()->flush();        

        $output = [];
        $output['content'] = $content;
        $output['settings'] = $this->getSettings();
        $total = 0;

        if($request->session()->has('cart')) {
            $cart_session = $request->session()->get('cart');
            $cart_products = MdlRentalProduct::whereIn('rp_id', array_keys($cart_session))->get()->toArray();
            
            foreach($cart_products as $key => $product) {
                $qty = $cart_session[$product['rp_id']];
                $rental_rate = (int)$product['rental_rate'];
                $amount = ( $rental_rate * $qty);
                $total += $amount;                
                $cart_products[$key]['qty'] = $qty;
                $cart_products[$key]['amount'] = $amount;
            }

            $output['cart_products'] = $cart_products;
            $output['total'] = $total;

            if($request->session()->has('cart_update')) {
                $output['cart_update'] = $request->session()->get('cart_update');
            }
            //dd($output);
            //echo"<pre>";print_r($request->session()->all());echo"</pre>";
            return view('shop.cart')->with($output);
        } else {
            return view('error.cart')->with($output);
        }       
    }

    public function update(Request $request) {
        $output = [];
        if( $request->session()->has('cart') 
            && array_key_exists($request->input('rp_id'), $request->session()->get('cart')) ) {

                // Check action
                $output['status'] = TRUE;
                $output['msg'] = "Success";

                switch ($request->input('action')) {
                    case 'add_qty':
                        $cart_session = $request->session()->get('cart');
                        $cart_session[$request->input('rp_id')] = $request->input('qty');
                        // update session
                        $request->session()->put('cart', $cart_session);                                
                        break;
                    
                    case 'remove':
                        $cart_session = $request->session()->pull('cart');
                        unset($cart_session[$request->input('rp_id')]);
                        if(!empty($cart_session)) {
                            $request->session()->put('cart', $cart_session);
                        }                 
                        break;
                    
                    default:
                        $output['status'] = FALSE;
                        $output['msg'] = "Invalid Action!";
                        break;
                }                

                // Get Total qty
                $tt = 0;
                if(!empty($request->session()->get('cart'))) {
                    foreach($request->session()->get('cart') as $k => $v) {
                        $tt += $v;
                    }
                }
                $request->session()->put('total_qty', $tt);
                $request->session()->flash('cart_update', 'Cart product has been updated!');
        } else {
            $output['status'] = FALSE;
            $output['msg'] = "Invalid request!";
        }        
        
        echo  json_encode($output);
    }

    public function view(Request $request, $rp_id) {                

        $product = MdlRentalProduct::find($rp_id);
        if(empty($product)) { die('WALA'); }

        $content = [
            'breadcrumb' => [
                [
                    'label' => "Home",
                    'href'  => url('/'),
                    'class' => ''
                ],
                [
                    'label' => "Rental",
                    'href'  => url('rental'),
                    'class' => ''
                ],
                [
                    'label' => ucfirst($product->name),
                    'href'  => '',
                    'class' => 'active'
                ]
            ],
            'title' => ucfirst($product->name)
        ];
        //echo url('rent_prod/view');
        //die();
        //dd($content);
        return view('shop.rental_product_view')->with(['product'=>$product,'content'=>$content]);
    }

    private function getSettings() {
        $output = [];
        $records = MdlSettings::all();
        foreach($records as $k => $record) {
            $output[ $record->key ] = $record->value;
        }
        return $output;
    }
}