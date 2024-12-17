<?php
require_once ('config.php');
session_start();
// Get the pidx from the URL
$pidx = $_GET['pidx'] ?? null;

if ($pidx) {
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/lookup/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(['pidx' => $pidx]),
            CURLOPT_HTTPHEADER => array(
                'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
                'Content-Type: application/json',
            ),
        )
    );


    $response = curl_exec($curl);
    curl_close($curl);

    if ($response) {
        $responseArray = json_decode($response, true);
        switch ($responseArray['status']) {
            case 'Completed':
                //here you can write your logic to update the database
                
                header("Location: cart.php?order_success=3");

                exit();
            case 'Expired':
                header("Location: cart.php?order_cancel=1");
                exit();
            case 'User canceled':
                //here you can write your logic to update the database
                header("Location: cart.php?order_cancel=2");
                exit();
            default:
                //here you can write your logic to update the database
                header("Location: cart.php");
                exit();
        }
    }
}