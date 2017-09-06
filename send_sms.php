<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$num = $_GET['dst'];
//$con = $_GET['msg'];
//
//$url = "https://sms.orange.cm:5001/sms/send_sms.php?src=DEMOSABC&dst="+ $num +"&msg="+ $con +"&user=DEMOSABC&password=Orange17";
//
//$client = curl_init($url);
//curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//
//$reponse = curl_exec($client);
//
//echo "la reponse est :  ==>" .$reponse;

$headers = array('Accept' => 'application/json');
$options = array('auth' => array('user', 'pass'));
$request = Requests::get('https://api.github.com/gists', $headers, $options);

echo "héloo ". $request->body;