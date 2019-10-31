<div class="mx-auto">
      <article>
        <h2><?php page_title(); ?></h2>
      </article>
</div>
<div class = "row">
  <div class="input-group mb-3">
    <input class="form-control" id="mov_search" name="name" type="text" placeholder="Movie Title">
    <button type="button" name="submit" id= "dosearch" class="btn btn-success">Search</button>
  </div>
</div>

<div id="target_div" class ="container-fluid">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  $("#dosearch").click(function(e){
    var mSearch = $("#mov_search");
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