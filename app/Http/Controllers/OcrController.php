<?php

namespace App\Http\Controllers;

use JFuentesTgn\OcrSpace\OcrAPI;
use Yk\LaravelOcr\Ocr;
use Illuminate\Http\Request;

class OcrController extends Controller
{
    public function index()
    {
    	return view('ocr');
    }
    public function store(Request $request)
    {
    	$path = request()->file('image')->getRealPath();
        $response = Ocr::recognize('/home/voidmain/Desktop/phone.png');
        print_r($response);
    }
}
