<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c2bcallbackController extends Controller
{
    public static function c2bcallback()
    {

    
    $mpesaResponse = file_get_contents('php://input');

date_default_timezone_set("Africa/Nairobi");
    $logFile = "mpesaResponse.json";
    $log = fopen($logFile, "a");
    fwrite($log, $mpesaResponse);
    fclose($log);

    $jsonMpesaResponse = json_decode($mpesaResponse, true);


$CheckoutRequestID = $jsonMpesaResponse['Body']['stkCallback']['CheckoutRequestID'];

$ResultCode = $jsonMpesaResponse['Body']['stkCallback']['ResultCode'];

$MpesaReceiptNumber= 0;

$Amount=0;

$TransactionDate=0;

$PhoneNumber=0;

$MerchantRequestID = $jsonMpesaResponse['Body']['stkCallback']['MerchantRequestID'];
$ResultDesc = $jsonMpesaResponse['Body']['stkCallback']['ResultDesc'];

foreach($jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item'] as $index => $item_array_element){

    if( $item_array_element['Name'] == 'Amount' ){
      $Amount= $item_array_element['Value'];
    }
    else if( $item_array_element['Name'] == 'TransactionDate' ){
       $TransactionDate= $item_array_element['Value'];
    }
else if( $item_array_element['Name'] == 'PhoneNumber' ){
       $PhoneNumber= $item_array_element['Value'];
    }
else if( $item_array_element['Name'] == 'MpesaReceiptNumber' ){
       $MpesaReceiptNumber= $item_array_element['Value'];
    }

}

$con = new mysqli("localhost", "root", '', "assign_db");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO mpesa_payments

(MpesaReceiptNumber, Amount, TransactionDate, PhoneNumber, MerchantRequestID, CheckoutRequestID, ResultCode, ResultDesc) VALUES 

('$MpesaReceiptNumber','$Amount','$TransactionDate','$PhoneNumber','$MerchantRequestID','$CheckoutRequestID','$ResultCode','$ResultDesc')";

if ($con->query($sql) === TRUE) {

}

if($resultcode==0)
{
$sql = "UPDATE listings SET status='approved', pickup_status='new' WHERE checkout_id='$CheckoutRequestID'";

if ($con->query($sql) === TRUE) {
   

}


}



    }
}
