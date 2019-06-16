<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MdlProductCategory;
use App\MdlProduct;
use App\MdlSettings;

class HomeProducts extends Controller
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
                    'label' => "Products",
                    'href'  => url('products'),
                    'class' => 'active'
                ]
            ],
            'title' => 'Products'
        ];        
        $output['content'] = $content;
        $output['page_name'] = 'products';

        // Show where page_type = NULL only
        $categories = MdlProductCategory::whereNull('page_type')->get();
        $output['categories'] = $categories;

        if($request->input('pcid')) { // Check if Categories exists
            // Set the default lists for products
            $pd = MdlProductCategory::findOrFail($request->input('pcid'));
            $default = $pd;
            $default_link_id = $pd->pc_id;                     
        } 
        else if($request->input('q')) { // Search
            $pd = MdlProduct::where('name', 'like', '%'.$request->input('q').'%' )->get();

            //dd(DB::getQueryLog());
            $output['search'] = $pd;
            //dd(count($pd));
        }
        else {
            // Set the default lists for products
            foreach($categories as $category) {
                if($keepGoing) {
                    $default = $category;
                    $default_link_id = $category->pc_id;
                    $keepGoing = FALSE;
                }
            }
        }
        $output['default'] = $default;
        $output['default_link_id'] = $default_link_id;  
        $output['settings'] = $this->getSettings();      
        //dd($output);
        return view('shop.products')->with($output);
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
