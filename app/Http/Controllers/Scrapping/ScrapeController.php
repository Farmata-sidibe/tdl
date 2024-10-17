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



    // public function fetchData()
    // {
    //     $client = new Client();
    //     try {

    //         $apiUrl = env('API_BASE_URL');
    //         $response = $client->get($apiUrl);
    //         $statusCode = $response->getStatusCode();
    //         $arrayData = json_decode($response->getBody(), true);

    //         if ($statusCode === 200 && !empty($arrayData)) {
    //             return view(
    //                 'product',
    //                 [
    //                     'modes' => $arrayData['data']['modes'],
    //                     'others' => $arrayData['data']['others'],
    //                     'poussettes' => $arrayData['data']['poussettes'],
    //                     'rooms' => $arrayData['data']['rooms'],
    //                     'eveils' => $arrayData['data']['eveils'],
    //                     'allaitements' => $arrayData['data']['allaitements'],
    //                     'toilettes' => $arrayData['data']['toilettes'],
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

    public function fetchData(Request $request)
{
    $client = new Client();

    // Récupérer les paramètres 'page' et 'limit' de la requête, avec des valeurs par défaut
    $page = $request->query('page', 1);
    $limit = $request->query('limit', 10);

    try {
        // Appel de l'API avec les paramètres de pagination
        $response = $client->get(env('API_BASE_URL'), [
            'query' => [
                'page' => $page,
                'limit' => $limit
            ]
        ]);

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
                    // Pagination data
                    'currentPage' => $arrayData['currentPage'],
                    'totalPagesMode' => $arrayData['totalPagesMode'],
                    'totalPagesOther' => $arrayData['totalPagesOther'],
                    'totalPagesPoussette' => $arrayData['totalPagesPoussette'],
                    'totalPagesRoom' => $arrayData['totalPagesRoom'],
                    'totalPagesEveil' => $arrayData['totalPagesEveil'],
                    'totalPagesAllaitement' => $arrayData['totalPagesAllaitement'],
                ]
            );
        } else {
            return view('product', ['message' => 'Failed to fetch data']);
        }
    } catch (RequestException $e) {
        Log::error('Error fetching data: ' . $e->getMessage());
        return view('product', ['message' => 'An error occurred while fetching the data']);
    }
}

// public function fetchData(Request $request)
// {
//     $client = new Client();
//     $page = $request->query('page', 1);
//     $limit = $request->query('limit', 10);

//     try {
//         $response = $client->get(env('API_URL'), [
//             'query' => [
//                 'page' => $page,
//                 'limit' => $limit
//             ]
//         ]);

//         $statusCode = $response->getStatusCode();
//         $arrayData = json_decode($response->getBody(), true);

//         if ($statusCode === 200 && !empty($arrayData)) {
//             $viewData = [
//                 'modes' => $arrayData['data']['modes'],
//                 'others' => $arrayData['data']['others'],
//                 'poussettes' => $arrayData['data']['poussettes'],
//                 'rooms' => $arrayData['data']['rooms'],
//                 'eveils' => $arrayData['data']['eveils'],
//                 'allaitements' => $arrayData['data']['allaitements'],
//                 'toilettes' => $arrayData['data']['toilettes'],
//                 // Pagination data
//                 'currentPage' => $arrayData['currentPage'],
//                 'totalPagesMode' => $arrayData['totalPagesMode'],
//                 'totalPagesOther' => $arrayData['totalPagesOther'],
//                 'totalPagesPoussette' => $arrayData['totalPagesPoussette'],
//                 'totalPagesRoom' => $arrayData['totalPagesRoom'],
//                 'totalPagesEveil' => $arrayData['totalPagesEveil'],
//                 'totalPagesAllaitement' => $arrayData['totalPagesAllaitement'],
//             ];

//             // Vérifier si la requête est AJAX
//             if ($request->ajax()) {
//                 // Retourner juste la portion HTML des produits pour être ajoutée à la page via AJAX
//                 return view('partials.products', $viewData);
//             }

//             // Retourner la vue complète pour les requêtes classiques
//             return view('product', $viewData);
//         } else {
//             return view('product', ['message' => 'Failed to fetch data']);
//         }
//     } catch (RequestException $e) {
//         Log::error('Error fetching data: ' . $e->getMessage());
//         return view('product', ['message' => 'An error occurred while fetching the data']);
//     }
// }





}
