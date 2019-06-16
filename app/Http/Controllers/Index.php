<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MdlRentalCategory;
use App\MdlRentalProduct;
use App\MdlSettings;

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
        $output['settings'] = $this->getSettings();
        
        return view('index')->with($output);
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