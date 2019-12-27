<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TestingController extends Controller
{
  public function index()
  {
    $client = new \GuzzleHttp\Client();
    $request = $client->get('https://randomuser.me/api/');
    $response = $request->getBody();
    $data_json = json_decode($response,TRUE);

    $data_api = [];
    foreach ($data_json['results'] as $res) {
      $data_api[] = [
        'gender' => $res['gender'],
        'name' => $res['name']['title'].' '.$res['name']['first'].' '.$res['name']['last'],
        'image' => $res['picture']['large'],
        'address' => $res['location']['street']['name'],
        'no_address' => $res['location']['street']['number'],
        'city' => $res['location']['city'],
        'state' => $res['location']['state'],
        'country' => $res['location']['country'],
        'postal_code' => $res['location']['postcode'],
        'email' => $res['email'],
        'phone' => $res['phone'],
        'cell' => $res['cell'],
        'dob_date' => date('Y-m-d',strtotime($res['dob']['date'])),
        'dob_age' => $res['dob']['age']
      ];
    }
    return response()->json([
        'data_api' =>  $data_api,
        'code' => '200',
        'status' => 'ok'
    ]);
  }
}
