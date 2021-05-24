<?php
function get($url, $headers)
{
    $opts = array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_URL => $url,
        CURLOPT_POST => false,
        //CURLOPT_POSTFIELDS => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSLVERSION => '6',
        //the next two lines of code are to turn off certificate checking for testing //purposes
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE
    );

    $curl = curl_init();
    curl_setopt_array($curl, $opts); //set curl options
    $resultJson = null;

    while (!$resultJson) {
        $resultJson = curl_exec($curl);
        //var_dump($resultJson);
    }
    $result = json_decode($resultJson);
    //var_dump($result);
    curl_close($curl);
    return $result;
}

?>
