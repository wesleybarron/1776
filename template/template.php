<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php page_title(); ?> | <?php site_name(); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/template/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

  <nav class="navbar sticky-top navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#"><?php site_name(); ?></a>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><?php nav_menu(); ?></a>
      </li>
    </ul>
  </nav>


<div>
      <div class="mx-auto jumbotron jumbotron-fluid">
        <div class="container">
          <div class="media">
            <img src="/assets/filmbuff.png" class="align-self-center mr-3" width="100" height="100"alt="icon">
            <div class="media-body">
              <h1 class="mt-0"><?php site_name(); ?></h1>
            </div>
          </div>
        </div>
      </div>
  <div class ="row">
    <div class="mx-auto">
      <article>
        <h2><?php page_title(); ?></h2>
        <?php page_content(); ?>
      </article>
    </div>
  </div>
  <div class="row">
    <div class="mx-auto">
      <footer>
          <small>&copy;<?php echo date('Y'); ?> <?php site_name(); ?>.<br><?php site_version(); ?></small>
      </footer>
    </div>
  </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>