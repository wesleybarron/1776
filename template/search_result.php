<html style="background-color: cornsilk;">

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

$upper_search_key = strtoupper($search_key);
echo "<h1 style='text-align:center;'>Movie Results For: " . $upper_search_key . "</h1>";

$output = "<ul>";
foreach ($response['Search'] as $movie) {
$output .= "<h3 style='text-align:center;'>".$movie['Title']."</h3>";
$output .= "<li style='text-align:center;text-decoration:none'>".$movie['Year']."</li>";
$output .= "<div style='margin:auto;text-align:center;'>";
$output .= "<img src='" . $movie['Poster'] . "' width='250px' height='300px' alt='Comming Soon!'>";
$output .= "</div>";
}
$output .= "</ul>";
echo $output;
?>

</html>