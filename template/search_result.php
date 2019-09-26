

<?php

echo "<div id='search-result-div'><h1 style='text-align:center;'>Movie Results For: " . $search_key . "</h1></div>";

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

$output = "<ul>";
foreach ($response['Search'] as $movie) {
$output .= "<h3 style='text-align:center;'>".$movie['Title']."</h3>";
$output .= "<li style='text-align:center;'>".$movie['Year']."</li>";
$output .= "<img style='text-align:center;' src='" . $movie['Poster'] . "' width='250px' height='300px' alt='Comming Soon!'>";
}
$output .= "</ul>";
echo $output;
?>
