<?php
$id=$_GET["id"]; 
$bstrURL = "https://hichannel.hinet.net/radio/cp.do?id=$id";
$refer = 'https://hichannel.hinet.net';
$ip = $_SERVER["REMOTE_ADDR"];
$header=array('User-Agent:Mozilla/5.0','CLIENT-IP: '.$ip,'X-FORWARDED-FOR: '.$ip);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $bstrURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_REFERER, $refer);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$data = curl_exec($ch);
curl_close($ch);
$reArr = json_decode($data)->_adc;
header('location:'.$reArr);