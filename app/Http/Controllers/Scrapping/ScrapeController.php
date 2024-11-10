<?php

namespace App\Http\Controllers\Scrapping;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;



class ScrapeController extends Controller
{



    public function fetchData()
    {
        $client = new Client();
        try {

            $apiUrl = env('API_BASE_URL');
            $response = $client->get($apiUrl);
            $statusCode = $response->getStatusCode();
            $arrayData = json_decode($response->getBody(), true);

            if ($statusCode === 200 && !empty($arrayData)) {
                return view(
                    'product',
                    [
                        'modes' => $arrayData['data']['modes'],
                        'others' => $arrayData['data']['others'],
                        'poussettes' => $arrayData['data']['poussettes'],
                        'rooms' => $arrayData['data']['rooms'],
                        'eveils' => $arrayData['data']['eveils'],
                        'allaitements' => $arrayData['data']['allaitements'],
                        'toilettes' => $arrayData['data']['toilettes'],
                    ]
                );
            } else {
                return view('product', ['message' => 'Failed to fetch data']);
            }
        } catch (RequestException $e) {
            // Log the exception message for debugging
            Log::error('Error fetching data: ' . $e->getMessage());

            return view('product', ['message' => 'An error occurred while fetching the data']);
        }


    }

}
