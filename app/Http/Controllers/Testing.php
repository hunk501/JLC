<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlProduct;
use App\MdlProductCategory;

class Testing extends Controller
{
    public function __construct() {        
        
    }


    public function index() {
        return view('testing');
    }

    public function upload() {

        if( $request->hasFile('myfile') ) {
            $image = $request->file('myfile');
            $name = 'myimage.'.$image->getClientOriginalExtension();
            // public/images
            $destinationPath = public_path('/images');

            echo "name: ". $name ."<br>";
            echo "name: ". $destinationPath ."<br>";
            $image->move($destinationPath, $name);
        }

    }
}