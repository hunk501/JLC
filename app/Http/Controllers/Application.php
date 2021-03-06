<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\MdlInsurance;

class Application extends Controller
{
    public function __construct() {        
        if(!session('insurance_lists')) {
            $lists = MdlInsurance::all();
            //$request->session()->put('insurance', $lists->toArray());
            session(['insurance_lists'=>$lists->toArray()]);            
        }
    }

    public function index() {
        $output = [];
        $colors = ['panel-primary','panel-green','panel-yellow','panel-red'];

        $insurance_lists = MdlInsurance::all()->toArray();
        foreach($insurance_lists as $key => $record) {
            $record['panel_heading'] = $colors[$key];
            $output[] = $record;
        }

        //dd($output);
        return view('template.application')->with(['insurance_lists'=>$output]);
    }

    public function compute(Request $request) {
        $coverage = $request->input('coverage');
        $net_rate = $request->input('net_rate');
        $bipd = $request->input('bipd');
        $tax = $request->input('tax');
        
        
        return response()->json($request->input());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //return view("ir.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        //dd(Input::all());
        /*
        $input = Input::all();
        
        $validator = Validator::make($input, $this->getRules());
        if($validator->fails()) {
            return redirect('ir/create')->withErrors($validator)->withInput();
        } else {
            unset($input['_token']);
            unset($input['submit']);


            //$input['inception_date_from'] = date('Y-m-d', strtotime($input['inception_date']));
            //$input['inception_date_to'] = date('Y-m-d', strtotime("+1 year", strtotime($input['inception_date'])));

            //unset($input['inception_date']);
            //dd($input);       

            MdlIR::create($input);

            Session::flash("success", "Success Message");
            return redirect("ir");
        }  
        */     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        /*
        $result = MdlIR::where("ir_id", $id)->firstOrFail()->toArray();
        
        if(!empty($result)) {
            $TP = (( (int)$result['assured_value'] * 0.025) + 1000) * 1.2461;
            $result['total_premium'] = number_format($TP, 2);
            
            $result['bodily_injured_1'] = number_format(50000,2);
            $result['bodily_injured_2'] = number_format(75,2);
            $result['od_theft_1'] = number_format((int)$result['assured_value'],2);
            
            $tmp = ((625 * 1.2461) - $TP);
            $od2 = $tmp / 1.2461; 
            $result['od_theft_2'] = number_format(abs($od2), 2);
            
            $result['property_damage_1'] = number_format(50000,2);
            $result['property_damage_2'] = number_format(450,2);
            
            $result['pa_1'] = number_format(50000,2);
            $result['pa_2'] = number_format(100,2);
            
            //dd($result);
        }        
        return view("ir.show")->with(['record'=>$result]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // $result = MdlIR::where('ir_id', $id)->first();
        // if(!empty($result)) {                                    
        //     return view('ir.edit')->with(['record'=>$result->toArray(),'ir_id'=>$id]);
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        /*
        $inputs = Input::all();
        $rules = $this->getRules();
        unset($rules['policy_no']);
        
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return redirect('ir/'.$id.'/edit')->withErrors($validator)->withInput();
        } else {
            unset($inputs['_method']);
            unset($inputs['_token']);
            unset($inputs['submit']);
            
            //$inputs['inception_date_from'] = date('Y-m-d', strtotime($inputs['inception_date']));
            //$inputs['inception_date_to'] = date('Y-m-d', strtotime("+1 year", strtotime($inputs['inception_date'])));
            //unset($inputs['inception_date']);
            
            MdlIR::where('ir_id', $id)->update($inputs);
            
            Session::flash('success', 'Records has been updated');
            return redirect('ir');            
        }
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
}
