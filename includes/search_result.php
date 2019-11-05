<?php


    $url = "http://www.omdbapi.com/?i=";

    $search_key = $_GET["more-info"];
    //strtolower($search_key);
    //$search_key = str_replace(" ", "+", $search_key);
    $api_key = "&apikey=d42aca4a";
    $search_url = $url . $search_key . $api_key;

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $search_url);
    curl_setopt_array($handle,
    array(
        CURLOPT_URL => $search_url,
        CURLOPT_RETURNTRANSFER => true
    )
    );
    $output = curl_exec($handle);
    $response = json_decode($output, true);
    curl_close($handle);

    echo $output;

?>