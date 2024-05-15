<?php

namespace App\Http\Controllers\Scrapping;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Pool;


class ScrapeController extends Controller
{

    // private $client;
    // private $endpoints = [
    //     'modes' => 'http://localhost:3000/modes',
    //     // 'poussettes' => 'http://localhost:3000/poussettes',
    //     'rooms' => 'http://localhost:3000/rooms',
    //     'eveils' => 'http://localhost:3000/eveils',
    //     'others' => 'http://localhost:3000/others',
    //     'allaitements' => 'http://localhost:3000/allaitements',
    // ];

    // public function __construct()
    // {
    //     $this->client = new Client();
    // }

    // public function fetchData()
    // {
    //     $data = [];

    //     try {
    //         foreach ($this->endpoints as $key => $endpoint) {
    //             $response = $this->client->get($endpoint);
    //             $statusCode = $response->getStatusCode();

    //             if ($statusCode === 200) {
    //                 $data[$key] = json_decode($response->getBody(), true);
    //             } else {
    //                 Log::error("Failed to fetch data from $key. Status code: $statusCode");
    //                 return view('product', ['message' => "Failed to fetch data from $key. Status code: $statusCode"]);
    //             }
    //         }

    //         return view('product', $data);
    //     } catch (RequestException $e) {
    //         Log::error('Error fetching data: ' . $e->getMessage());
    //         $response = $e->getResponse();
    //         $statusCode = $response ? $response->getStatusCode() : 'unknown';
    //         return view('product', ['message' => "An error occurred while fetching the data. Status code: $statusCode"]);
    //     }
    // }



public function fetchData()
    {
        $client = new Client();
        try {

            $response = $client->get('http://localhost:3000/all');
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
                        'biberons' => $arrayData['data']['biberons'],
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



    // public function fetchData()
    // {
    //     $client = new Client();
    //     try {
    //         $responseMode = $client->get('http://localhost:3000/modes');
    //         $statusCode = $responseMode->getStatusCode();
    //         $modes = json_decode($responseMode->getBody(), true);

    //         $responsePoussette = $client->get('http://localhost:3000/poussettes');
    //         $statusCode = $responsePoussette->getStatusCode();
    //         $poussettes = json_decode($responsePoussette->getBody(), true);

    //         $responseRoom = $client->get('http://localhost:3000/rooms');
    //         $statusCode = $responseRoom->getStatusCode();
    //         $rooms = json_decode($responseRoom->getBody(), true);

    //         $responseEveil = $client->get('http://localhost:3000/eveils');
    //         $statusCode = $responseEveil->getStatusCode();
    //         $eveils = json_decode($responseEveil->getBody(), true);

    //         $responseOther = $client->get('http://localhost:3000/others');
    //         $statusCode = $responseOther->getStatusCode();
    //         $others = json_decode($responseOther->getBody(), true);

    //         $responseAllaitement = $client->get('http://localhost:3000/allaitements');
    //         $statusCode = $responseAllaitement->getStatusCode();
    //         $allaitements = json_decode($responseAllaitement->getBody(), true);

    //         if ($statusCode === 200 && !empty($modes)) {
    //             return view(
    //                 'product',
    //                 [
    //                     'modes' => $modes,
    //                     'poussettes' => $poussettes,
    //                     'rooms' => $rooms,
    //                     'eveils' => $eveils,
    //                     'others' => $others,
    //                     'allaitements' => $allaitements
    //                 ]
    //             );
    //         } else {
    //             return view('product', ['message' => 'Failed to fetch data']);
    //         }
    //     } catch (RequestException $e) {
    //         // Log the exception message for debugging
    //         Log::error('Error fetching data: ' . $e->getMessage());

    //         return view('product', ['message' => 'An error occurred while fetching the data']);
    //     }
    // }
}
