<?php

// echo "<pre>";
$url = "https://reqres.in/api/user?page=1";

// initialized cURL handler
$curl = curl_init();

// OR 
// we can add url using CURLOPT_URL in cURL set option
curl_setopt($curl, CURLOPT_URL, $url);

// here CURLOPT_RETURNTRANSFER is used to return output as a string
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// execute the cURL handler
$res = curl_exec($curl);

// copy the curl handler with all preferences
$curl1 = curl_copy_handle($curl);

// execute the cURL handler
// $res = curl_exec($curl1);

$fp = fopen("./temp.txt", "w+");
curl_setopt($curl, CURLOPT_FILE, $fp);
curl_setopt($curl, CURLOPT_HEADER, 0);

fwrite($fp, $res);

// if error occur then it will write inside the file like error log
if (curl_error($curl)) {
    echo curl_error($curl);
    echo curl_errno($curl);
    fwrite($fp, curl_error($curl));
}


// close file pointer
fclose($fp);

// close cURL handler(resource)
curl_close($curl);
