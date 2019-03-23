<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MdlInsurance;
use App\MdlInsuranceType;

class Compute extends Controller
{
    public function index($insurance_id) {
        $output = [];
        $insurance = MdlInsurance::find($insurance_id);    
        if($insurance) {
            $output = $insurance->toArray();
            $output['insurance_type'] = $insurance->getInsuranceType->toArray();
            // foreach($insurance->toArray() as $key => $list) {                
            //     $output[$key] = $list;
            //     //echo"<pre>";print_r($list->getInsuranceType);echo"</pre>";
            // }

            //dd($output);
            return view('template.compute')->with($output);
        } else {
            //abort(500);
        }
    }

    public function process(Request $request) {
        // Formula: (NetRate / 100) x Coverage + BIPD x tax + Others
        $coverage = $request->input('coverage');
        $net_rate = $request->input('net_rate');
        $bipd = $request->input('bipd');
        $tax = $request->input('tax');
        $other = $request->input('other');

        $x = ($net_rate / 100);
        $y = ($x * $coverage);
        $z = ($y + $bipd);
        $w = ($z * $tax);
        $net_premium = ($w + $other);

        $w_aog = (($coverage * 0.002) * $tax);
        $net_without_aog = $net_premium;
        $net_with_aog = ($net_premium + $w_aog);

        $output = [
            'success' => true,
            'coverage' => $coverage,
            'net_rate' => $net_rate,
            'bipd' => $bipd,
            'tax' => $tax,
            'other' => $other,
            'formula' => [
                'x' => number_format($x, 2),
                'y' => number_format($y, 2),
                'z' => number_format($z, 2),
                'w' => number_format($w, 2),
                'net_premium' => number_format($net_premium,2),
                'w_aog' => number_format($w_aog,2),
                'net_without_aog' => number_format($net_without_aog, 2),
                'net_with_aog' => number_format($net_with_aog, 2)
            ]
        ];
        echo json_encode($output);
    }
}
