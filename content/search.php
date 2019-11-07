<div class="mx-auto">
      <article>
        <h2><?php page_title(); ?></h2>
      </article>
</div>
  <div class = "row">
  <div id = "search_form">
  <form id="contact" action="" method ="post">
  <div class="input-group mb-3">
    <input class="form-control" id="mov_search" name="name" type="text" placeholder="Movie Title" required>
    <button type="submit" name="submit" id= "dosearch" class="btn btn-success text-center">Search</button>
  </div>
</div>

<!-- The Modal -->
                    <div class="modal" id="myModal">
                    <div class="modal-dialog">
                    <div class="modal-content">

      <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 id="movie-title" class="modal-title">$movie["Title"]</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

      <!-- Modal body -->
                    <div class="modal-body">
                    <h6>Rating:</h6 &nbsp;><p id="movie-rating"></p>
                    <p data-id="getMovieId" id="movie-rating"></p>
                    <p id="movie-rating"></p>
                    <p id="movie-rating"></p>
                    <p id="movie-rating"></p>
                    </div>

      <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

<?php
function getMovie(){
$url = "http://www.omdbapi.com/?s=";
    $search_key = $_POST["name"];
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
    //echo($search_url);
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
        $output .= "<p id='movie-id'>" .$movie['imdbID']."</p>";
        $output .= "<br>";
        $output .= '<button formaction="" name="movie-id" method="get" data-movie-num="'.$movie['imdbID'].'" id="my-button" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Movie Details</button>';
        $output .= "<br><br>";
        }else {
            $output .= "<img class='movie-poster' src='" . $movie['Poster'] . "'>";
            $output .= "<br>";
            $output .= "<h4>".$movie['Title']."</h4>";
            $output .= "<h6>".$movie['Year']."</h6>";
            $output .= "<p id='movie-id'>" .$movie['imdbID']."</p>";
            $output .= '<button formaction="" name="movie-id" method="get" data-movie-num="'.$movie['imdbID'].'" id="my-button" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Movie Details</button>';
            $output .= "<br><br>";
        }
    $output .= "</div>";
    $output .= "</div>";
    $output .= "<br>";
    }
    $output .= "</div>";
    $output .= "</div>";
    $output .= "<br><br>";
    echo $output;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
getMovie();
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  $("#dosearch").click(function(e){
    var mSearch = $("#mov_search").val();
    $.ajax({
      type: 'post',
      url: '../includes/search_result.php',
      data: {"movie": mSearch},
      dataType: "HTML",
      success: function(data){
        $("#target_div").html(data);
      },
      error: function(data){
        alert("Failed to get data.");
      }
    });
    return false;
  });
</script>
