<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use  \SumUp\SumUp;

class creatSumUpLink extends Controller
{
    public function returnSumUp() {
        return view('create-sumup');
    }
    public function createSumupLink(Request $request)
    {

        $data2 = $request->all();

        $client_id = 'KIHFPj4L_MuziivYostwPvJAQG9f';
        $client_secret = '221af21af3e47d6ad98d0fd69b10ae9041b9199c78c0378e51de679c9762af93';

        $data = array(
            'checkout_reference' => uniqid(),
            'amount'  =>  2,
            'currency' => 'EUR',
            'pay_to_email'  =>  'briannowlan@ymail.com',
            'description' => 'Sample one-time payment',
            "return_url" => "http://localhost:8888/Geo.php"


        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,            'https://api.sumup.com/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_POST,           1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' );
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded','Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));

        $result = curl_exec($ch);

        $Code_result2 = json_decode($result);
        $ch2 = curl_init();

        $authorization = "Authorization: Bearer ".$Code_result2->access_token;


        curl_setopt($ch2, CURLOPT_URL,'https://api.sumup.com/v0.1/checkouts' );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch2, CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
        $result2 = curl_exec($ch2);
        curl_close($ch2);


        $Code_result = json_decode($result2);
        $student = User::find($data2['id']);

        if ($Code_result->id) {
            $student->sumUpId = $Code_result->id;
            $student->save();
        }


    }

}
