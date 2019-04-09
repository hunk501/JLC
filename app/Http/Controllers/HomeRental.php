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
        //dd($content);
        return view('shop.rental_product_view')->with(['product'=>$product,'content'=>$content]);
    }
}
