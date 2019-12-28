<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TestingController extends Controller
{
    public function index()
    {
      return view('profile');
    }
}
