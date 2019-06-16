<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\MdlSettings;

class Settings extends Controller
{
    public function __construct() {        
        $this->middleware('auth');        
    }

    public function index(Request $request) {
        
        $records = MdlSettings::all();
        
        $output = [];
        foreach($records as $key => $record) {
            $output[$record->key] = $record->value;
        }
        //dd($output);
        return view('settings.form')->with([
            'records'=>$output,
            'ckeditor'=>TRUE]);
    }

    public function update(Request $request) {
        $inputs = $request->input();
        unset($inputs['_token']); // Remove token key
        
        $keys = array_keys($inputs);
        foreach($keys as $key => $index) {

            // Check index is existing
            $result = MdlSettings::where('key', '=', $index)->get();
            if($result->count()) { // Existing, Update records                
                foreach($result as $k => $res) {                    
                    $record = MdlSettings::find($res->id);
                    $record->value = htmlspecialchars($inputs[$index]);
                    $record->save();
                }                
            } 
            else { // Not Existing, Insert records
                $record = new MdlSettings;
                $record->key = $index;
                $record->value = htmlspecialchars($inputs[$index]);
                $record->save();
            }            
        }

        Session::flash('success', 'Settings has been updated!');
        return redirect('settings');        
    }

}
