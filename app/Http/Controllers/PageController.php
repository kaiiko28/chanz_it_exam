<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;



class PageController extends Controller
{
    public function convert(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->post(env('API_URL').'/api/v7/convert?q=USD_PHP,PHP_USD&compact=ultra&callback=sampleCallback&apiKey='.env('API_KEY') ,[
                'form_params' => $request->all()
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }


        // $apikey = env('FREE_CURRENCY_CONVERTER_API_KEY');

        // $from_Currency = urlencode($from_currency);
        // $to_Currency = urlencode($to_currency);
        // $query =  "{$from_Currency}_{$to_Currency}";

        // // change to the free URL if you're using the free version
        // $json = file_get_contents("https://api.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
        // $obj = json_decode($json, true);

        // $val = floatval($obj["$query"]);


        // $total = $val * $amount;
        // number_format($total, 2, '.', '');

        // echo convertCurrency(10, 'USD', 'PHP');

        
    }


    
    public function test() {

        return view('currency');
       }   
   
       public function exchangeCurrency(Request $request) {
   
         $amount = ($request->amount)?($request->amount):(1);
   
         $apikey = env('API_KEY');
         $apiurl = env('API_URL');
         $query = "PHP_USD";
   
         // change to the free URL if you're using the free version
         $json = file_get_contents("{$apiurl}convert?q={$query}&compact=ultra&apiKey={$apikey}");
   
         $obj = json_decode($json, true);
   
         $val = $obj["$query"];
   
         $total = $val * 1;
         $usd_convert =  number_format($total, 2, '.', '');
        
         $converted = $amount * $total;
         $peso_convert = number_format($amount, 2);

         $formatValue = number_format($converted, 2);
         $usd = "<small>1 Philippine peso equals</small><br>$usd_convert United States Dollar";
   
         $data = "$peso_convert PHP = USD $formatValue";
   
        //  echo  "value of PESO in USD is $formatValue";
        // dd($data);

        return redirect()->back()->with( ['converted' => $data, 'value' => $usd] );
      }
}
