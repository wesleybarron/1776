<div class = "row">
  <div id = "search_form">
    <form id="contact" action="" method ="post">
      <div class="input-group mb-3">
        <input name="name" type="text" class="form-control" placeholder="Movie Title" required>
        <div class="input-group-append"><br>
          <button name="submit" id= "dosearch" class="btn btn-success" type="submit">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>



<?php
function getMovie(){
$url = "http://www.omdbapi.com/?s=";

    $search_key = $_POST["name"];
    if(!is_string($search_key)){
        echo "This is not a string<br>";
    }else{
        echo "This is a string<br>";
    }
    $search_key = ltrim($search_key, " ");
    $search_key = ltrim($search_key, "+");
    $search_key = ltrim($search_key, ".");
    $search_key = ltrim($search_key, "-");
    $search_key = ltrim($search_key, ",");
    $search_key = ltrim($search_key, "/");
    $search_key = ltrim($search_key, ";");
    $search_key = ltrim($search_key, "'");
    $search_key = ltrim($search_key, '"');
    $search_key = strtolower($search_key);

    $search_key = str_replace(" ", "+", $search_key);

    $api_key = "&apikey=d42aca4a";
    $search_url = $url . $search_key . $api_key;
    echo($search_url);
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
    //str_replace("+", " ", $upper_search_key);
    $output = "<h1 style='text-align:center;'>Movie Results For: " . str_ireplace("+", " ", $upper_search_key) . "</h1>";
    $output .= "<br>";

    $output .= "<div class='container'>";
    $output .= "<div class='row'>";

    foreach ($response['Search'] as $movie) {

    $output .= "<div class='col-md-3'>";
    $output .= "<div class='well text-center'>";

    if ($movie['Poster'] == "N/A") {
        $output .= "<img class='movie-poster' src='https://media2.giphy.com/media/d2ZhZTK55EA2yvTy/200.webp?cid=790b76115b079f19e6b19b7cc0a624173b4015791c3264c1&rid=200.webp'>";
        $output .= "<br>";
        $output .= "<h4>".$movie['Title']."</h4>";
        $output .= "<h6>".$movie['Year']."</h6>";
        $output .= "<br>";
        $output .= '<button type="button" class="btn btn-info">Movie Details</button>';
        $output .= "<br><br>";
        }else {
            $output .= "<img class='movie-poster' src='" . $movie['Poster'] . "'>";
            $output .= "<br>";
            $output .= "<h4>".$movie['Title']."</h4>";
            $output .= "<h6>".$movie['Year']."</h6>";
            $output .= "<br>";
            $output .= '<button type="button" class="btn btn-info">Movie Details</button>';
            $output .= "<br><br>";
        }

    $output .= "</div>";
    $output .= "</div>";

    }

    $output .= "</div>";
    $output .= "</div>";
    echo $output;
}

if($_SERVER['REQUEST_METHOD']=='POST'){
getMovie();
}
?>


