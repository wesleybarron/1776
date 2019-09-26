<?php

$url = "http://www.omdbapi.com/?s=";

$search_key = $_GET["name"];
strtolower($search_key);
$search_key = str_replace(" ", "+", $search_key);
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

$output = "<ul class='searchResult'>";
foreach ($response['Search'] as $movie) {
$output .= "<h3>".$movie['Title']."</h3>";
$output .= "<li>".$movie['Year']."</li>";
$output .= "<img src='" . $movie['Poster'] . "' width='250px' height='300px' alt='Comming Soon!'>";
}
$output .= "</ul>";
echo $output;
?>