<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Session;
use App\MdlInsurance;
use App\MdlInsuranceType;

class Insurance extends Controller
{
    public function __construct() {        
        if(!session('insurance_lists')) {
            $lists = MdlInsurance::all();
            //$request->session()->put('insurance', $lists->toArray());
            session(['insurance_lists'=>$lists->toArray()]);            
        }
    }

    public function listing(Request $request, $id) {
        $output = [];

        if(!$request->session()->exists('insurance')) {
            $lists = MdlInsurance::all();
            //$request->session()->put('insurance', $lists->toArray());
            session(['insurance'=>$lists->toArray()]);            
        }     

        $records = MdlInsuranceType::where('insurance_id_fk', $id)->get();    
        //dd($records);
        //echo"<pre>";print_r($records);echo"</pre>";
        return view('template.insurance_list')->with(['records'=>$records, 'id'=>$id]); //response()->json( $all );
    }

    public function addNew(Request $request) {
        if($request->isMethod('post')) {
            
            Validator::make($request->all(), 
                $this->getRules(), 
                $this->messages() )->validate();
            
            /*
            if($validator->fails()) {
                return redirect('/insurance/add')
                    ->withErrors($validator)
                    ->withInput();
            }
            */           

            // Create Insurance
            $insurance = MdlInsurance::create([
                'name' => $request->input('name'),
                'email' =>  $request->input('email'),
                'image_url' => ''
            ]);
            
            //echo"<pre>";print_r($insurance->id);echo"</pre>";die();

            // Create Insurance Type
            MdlInsuranceType::create([
                'insurance_id_fk' => $insurance->id,
                'insurance_type' =>  $request->input('type'),                
                'net_rate' => $request->input('net_rate'),
                'bipd' => $request->input('bipd'),
                'tax' => $request->input('tax'),
                'other' => $request->input('other')
            ]);
            
            $name = $request->input('name');
            $msg = $name . " Insurance has been created!";
            $request->session()->flush();
            Session::flash('success', $msg);
            return redirect('insurance/'. $insurance->id);
        }
        return view('template.insurance_addnew');
    }

    public function add(Request $request, $id) {

        if($request->isMethod('post')) {
            //dd($request->input());

            $rules = $this->getRules();
            // Update rules
            $rules['name'] = 'required';
            $rules['email'] = 'required';

            // Validate
            Validator::make($request->all(), $rules, $this->messages())->validate();
            
            // Update Insurance
            $insurance = MdlInsurance::find($request->input('id'));
            $insurance->name = $request->input('name');
            $insurance->email = $request->input('email');
            $insurance->save();

            // Create Insurance type
            MdlInsuranceType::create([
                'insurance_id_fk' => $request->input('id'),
                'insurance_type' =>  $request->input('type'),                
                'net_rate' => $request->input('net_rate'),
                'bipd' => $request->input('bipd'),
                'tax' => $request->input('tax'),
                'other' => $request->input('other')
            ]);
            
            $request->session()->flush();
            Session::flash('success', "Insurance has been updated!");
            return redirect('insurance/'.$request->input('id'));
        } else {
            $output = [];
            $record = MdlInsurance::find($id);                        
            return view('template.insurance_add')->with($record->toArray());
        }                
    }

    public function edit(Request $request, $id) {        
        $record = MdlInsuranceType::find($id)->first();
        if($request->isMethod('post')) {
            $rules = $this->getRules();
            // Update rules
            $rules['name'] = 'required';
            $rules['email'] = 'required';

            // Validate
            Validator::make($request->all(), $rules, $this->messages())->validate();
            
            $insurance = MdlInsurance::find($request->input('insurance_id'));
            $insurance->name = $request->input('name');
            $insurance->email = $request->input('email');
            $insurance->save();

            $insurance_type = MdlInsuranceType::find($id);
            $insurance_type->insurance_type = $request->input('type');
            $insurance_type->net_rate = $request->input('net_rate');
            $insurance_type->bipd = $request->input('bipd');
            $insurance_type->tax = $request->input('tax');
            $insurance_type->other = $request->input('other');
            $insurance_type->save();
            
            $request->session()->flush();
            Session::flash('success', "Insurance has been updated!");
            return redirect('insurance/'.$request->input('insurance_id'));
        }
        return view('template.insurance_edit')->with($record);
    }
    
    public function type(Request $request, $id) {
        $output = [];
        $record = MdlInsuranceType::find($id);
        // echo"<pre>";print_r($record->toArray());echo"</pre>";
        // echo"<pre>";print_r($record->getInsurance->id);echo"</pre>";
        // echo"<pre>";print_r($record->getInsurance->name);echo"</pre>";
        // echo"<pre>";print_r($record->getInsurance->email);echo"</pre>";
        if($record) {
            $output = $record->toArray();
            $output['name'] = $record->getInsurance->name;
            $output['email'] = $record->getInsurance->email;

            //echo"<pre>";print_r($output);echo"</pre>";
            return view('template.insurance_edit')->with($output);
        }
    }

    protected function messages() {
        return [       
            'net_rate.required' => 'The net rate field is required.'
        ];
    }

    protected function getRules() {
        return [
            'name' => 'required|unique:tbl_insurance',
            'email' =>  'required|unique:tbl_insurance',
            'type' => 'required',
            'net_rate' => 'required',
            'bipd' => 'required',
            'tax' => 'required',
            'other' => 'required'
        ];        
    }

}
