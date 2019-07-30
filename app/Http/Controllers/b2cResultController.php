<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class b2cResultController extends Controller
{
    public static function b2cResult()
    {

    	

	$callbackResponse = file_get_contents('php://input');
	$logFile = "B2CResultResponse.json";
	$log = fopen($logFile, "a");
	fwrite($log, $callbackResponse);
	fclose($log);

    }
}
