<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class b2cController extends Controller
{
    public static function b2c()
    {



  /* Urls */
  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  $b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';


  /* Required Variables */
  $consumerKey = '6yQj6Un12bhNNAEOY15oJEkMA98DTkR3';        # Fill with your app Consumer Key
  $consumerSecret = 'j9pSVrFjPmCb0Ch7';     # Fill with your app Secret
  $headers = ['Content-Type:application/json; charset=utf8'];
  
  /* from the test credentials provided on you developers account */
  $InitiatorName = 'testapi';      # Initiator
  $SecurityCredential = 'VgdqXfWOAdS1B8v6PBrHrt85qa3idpw49Sy0ztBeOdlH3Mu2WzE7atVbkOkprJrC30U7gtlf6griFQ+v1giNpISoy9vNg5w/ph7aI8fi6oV2FDfDdjW3BV/9ghekEGMNh/4O5y3RTuSOrggS4daOsaQ6gxwMGh6I9WW5f0vr1cDO5TwXflctSJ+7w8Dt/H79GJzGfZIC92Jv/vL2WqFVTxoRzOI1ggztFO2mrT+IpOIsTZFuvsadRqcifl3mXZb4S7ejPmyjWCROYXYm8MstQ+MW3//RxXZbLX7uxZMh0Tg0kgimuL0uwxVi6AmCGxDLLvbw43i9cr/ue72+O64ifQ=='; 
  $CommandID = 'BusinessPayment';          # choose between SalaryPayment, BusinessPayment, PromotionPayment 
  $Amount = '5000';
  $PartyA = '600180';             # shortcode 1
  $PartyB = '254708374149';             # Phone number you're sending money to
  $Remarks = 'Salary';      # Remarks ** can not be empty
  $QueueTimeOutURL = 'http://mpesa.volt.co.ke/b2c/B2CResultURL.php';   # your QueueTimeOutURL
  $ResultURL = 'http://mpesa.volt.co.ke/b2c/B2CResultURL.php';          # your ResultURL
  $Occasion = 'none';           # Occasion

  /* Obtain Access Token */
  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $result = json_decode($result);
  $access_token = $result->access_token;
  curl_close($curl);

  /* Main B2C Request to the API */
  $b2cHeader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $b2c_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $b2cHeader); //setting custom header

  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
  );

  $data_string = json_encode($curl_post_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  echo $curl_response;


    }
}
