<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MdlProductCategory;
use App\MdlProduct;

class HomeProjects extends Controller
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
                    'label' => "Projects",
                    'href'  => url('projects'),
                    'class' => 'active'
                ]
            ],
            'title' => 'Projects'
        ];        
        $output['content'] = $content;
        $output['page_name'] = 'Projects';

        // Show where page_type = projects only        
        $categories = MdlProductCategory::where('page_type', 'projects')->first();    
        
        $animation = [
            'flyIn',
            'flyRight',
            'flyLeft'
        ];

        $arrProducts = [];
        $products = $categories->getProducts;
        foreach($products as $product) {
            $p = $product;
            $random = rand(1,3);
            $p['animation'] = $animation[($random-1)];

            $arrProducts[] = $p;
        }
        $output['products'] = $arrProducts;

        //dd($arrProducts);
        //die();
        return view('shop.projects')->with($output);
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
                    'label' => "Projects",
                    'href'  => url('projects'),
                    'class' => ''
                ]
            ],
            'title' => 'Projects'
        ];        
        $output['content'] = $content;
        $output['page_name'] = 'projects';
        
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
            return view('shop.projects_view')->with($output);
        }
    }
}
