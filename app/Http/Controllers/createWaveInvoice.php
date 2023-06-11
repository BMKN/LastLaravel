<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Subbe\WaveApp\WaveApp;

class createWaveInvoice extends Controller
{
    public function createInvoice (Request $request) {
        $waveapp = new \Subbe\WaveApp\WaveApp();

        $customer = [
            "input" => [
                "businessId" => "QnVzaW5lc3M6NTIzOTcwNDMtYjU1YS00ZjIzLWE0N2ItMzRkMmM0OGQ4ZDky",
                "customerId" => "25581107",
                "items" => [
                    ["productId"=>91672518]
                ]

            ],
        ];

        $ch2 = curl_init();

        $authorization = "Authorization: Bearer gEukpVz8IjiMmjt1vPctVWDeLkqe9j";


        curl_setopt($ch2, CURLOPT_URL,'https://gql.waveapps.com/graphql/public' );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch2, CURLOPT_POSTFIELDS,  ' "query": "query { businesses(page: 1, pageSize: 10) { pageInfo { currentPage totalPages totalCount } edges { node { id name isClassicAccounting isPersonal } } } }"
}');
        curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
        $result2 = curl_exec($ch2);
        curl_close($ch2);


        $Code_result = json_decode($result2);
        dd($Code_result);
    }
}


