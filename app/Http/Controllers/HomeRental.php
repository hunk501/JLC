<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MdlRentalCategory;
use App\MdlRentalProduct;

class HomeRental extends Controller
{
    private $breadcrumbs = [];

    public function __construct() {

    }

    public function index(Request $request) {
        
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
                    'class' => 'active'
                ]
            ],
            'title' => 'Rental'
        ];

        $output = [];
        $output['content'] = $content;
        
        $categories = MdlRentalCategory::all();
        $output['categories'] = $categories;

        $products = [];
        // Get products per category
        foreach($categories as $category) {
            $pds = $category->getProducts;
            foreach($pds as $pd) {
                $products[] = $pd->toArray();
            }
        }
        shuffle($products); // shuffle an array
        $output['products'] = $products;

        //dd($output);
        return view('shop.rental')->with($output);
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
        //dd($product);
        return view('shop.rental_product_view')->with(['product'=>$product,'content'=>$content]);
    }

    public function add_to_cart(Request $request) {

        $cart_products = [];
        $tmpValue = 1;

        // Check session exists
        if($request->session()->exists('cart')) {
            $cart_products = $request->session()->get('cart');            
        }
        
        // product exists
        if(array_key_exists($request->input('rp_id'), $cart_products)) {
            $product = MdlRentalProduct::find($request->input('rp_id'));
            if(!empty($product)) {
                $stock = $product->stock;
                $tmpValue = ((int)$cart_products[$request->input('rp_id')] + 1); // Session qty + 1
                if($tmpValue > $stock) {
                    $tmpValue = $stock;
                }
                $cart_products[$request->input('rp_id')] = $tmpValue; // Update session qty
            }                        
        } else {            
            $cart_products[ $request->input('rp_id') ] = $tmpValue;    
        }        

        $tt = 0;
        foreach($cart_products as $k => $v) {
            $tt += $v;
        }
        $request->session()->put('cart', $cart_products);
        $request->session()->put('total_qty', $tt);
        
        $output['input'] = $request->input();
        $output['session'] = $request->session()->get('cart');
        $output['cart_products'] = $cart_products;

        echo json_encode($output);
    }
}
