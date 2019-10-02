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
$output .= "<li style='text-align:center;list-style-type:none;'>".$movie['Year']."</li>";
$output .= "<div style='margin:auto;text-align:center;'>";
$output .= "<img src='" . $movie['Poster'] . "' width='250px' height='300px' alt='Comming Soon!'>";
if (!$movie['Poster']) {
    $output .= "<img src='data:image/jpeg;base64,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' width='250px' height='300px'>;
}
$output .= "</div>";
}
$output .= "</ul>";
echo $output;
?>

</html>