<div class = "row">
  <div id = "search_form">
    <form id="contact" action="" method ="POST">
      <div class="input-group mb-3">
        <input name="name" type="text" class="form-control" placeholder="Movie Title">
        <div class="input-group-append"><br>
          <button id= "dosearch" type= "button" class="btn btn-success" type="submit">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div id = "target_div">
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

    if ($movie['Poster'] == "N/A") {
        $output .= "<img src='https://media2.giphy.com/media/d2ZhZTK55EA2yvTy/200.webp?cid=790b76115b079f19e6b19b7cc0a624173b4015791c3264c1&rid=200.webp' width='250px' height='300px'>";
        }else {
            $output .= "<img src='" . $movie['Poster'] . "' width='250px' height='300px'>";
        }

    $output .= "</div>";
    }
    $output .= "</ul>";
    echo $output;

  ?>
  </div>
</div>