<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MdlRentalCategory;
use App\MdlRentalProduct;

class Index extends Controller
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
                    'class' => 'active'
                ]
            ],
            'title' => 'Home'
        ];

        $output = [];
        $output['content'] = $content;
        $output['page_name'] = 'home';
        
        return view('index')->with($output);
    }
}