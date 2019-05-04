<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MdlProductCategory;
use App\MdlProduct;

class HomeServices extends Controller
{
    public function index(Request $request) {

        $keepGoing = TRUE;
        $default = [];
        $default_link_id = 0;
        $output = [];
        
        $content = [
            'breadcrumb' => [
                [
                    'label' => "Home",
                    'href'  => url('/'),
                    'class' => ''
                ],
                [
                    'label' => "Services",
                    'href'  => url('services'),
                    'class' => 'active'
                ]
            ],
            'title' => 'Services'
        ];        
        $output['content'] = $content;
        $output['page_name'] = 'services';

        // Show where page_type = services only        
        $categories = MdlProductCategory::where('page_type', 'services')->first();    
        
        $animation = [
            'flyIn',
            'flyRight',
            'flyLeft'
        ];

        $arrProducts = [];
        $products = (!empty($categories->getProducts)) ? $categories->getProducts : [];
        foreach($products as $product) {
            $p = $product;
            $random = rand(1,3);
            $p['animation'] = $animation[($random-1)];

            $arrProducts[] = $p;
        }
        $output['products'] = $arrProducts;

        //dd($arrProducts);
        //die();
        return view('shop.services')->with($output);
    }

    public function view(Request $request, $id) {
        $output = [];
        $content = [
            'breadcrumb' => [
                [
                    'label' => "Home",
                    'href'  => url('/'),
                    'class' => ''
                ],
                [
                    'label' => "Services",
                    'href'  => url('services'),
                    'class' => ''
                ]
            ],
            'title' => 'Services'
        ];        
        $output['content'] = $content;
        $output['page_name'] = 'services';
        
        $product = MdlProduct::find($id);
        if(empty($product)) {
            return view('error.404');
        } else {
            $output['content']['breadcrumb'][] = [
                'label' => ucfirst($product->name),
                'href'  => '',
                'class' => 'active'
            ];
            $output['product'] = $product;
            return view('shop.services_view')->with($output);
        }
    }

}
