<?php

  session_start();

  require_once('connectvars.php');

  $user_id = $_SESSION['user_id'];

?>

<?php 

echo $user_id;

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Jukebox</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</break>
<?php 

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $query = "SELECT * FROM jprofile WHERE user_id = '$user_id'";

    $data = mysqli_query($dbc,$query);
    $userdata = mysqli_fetch_assoc($data)   

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="profile_picture">
  <div class="card-body">
    <h5 class="card-title"><?php echo $userdata['displayname'] ?></h5>
    <p class="card-text"><?php echo $userdata['bio'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $userdata['genres'] ?></li>
    <li class="list-group-item">Occupation</li>
    <li class="list-group-item">Location</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Social Media</a>
    <a href="#" class="card-link">External Source</a>
  </div>
  <ul class="list-group list-group-flush">
  <a class="btn btn-primary" href="editprofile.php" role="button">Edit Profile</a>
  </ul>
  <?php
    $query = "SELECT * from jreview join jalbum on jreview.album_id = jalbum.album_id where user_id = '$user_id'";
    $data = mysqli_query($dbc,$query);
  ?>
</div>
		</div>
		<div class="col-md-10">

<?php while($review = mysqli_fetch_assoc($data)){
   echo"
   <div class=\"card\" style=\"width: 18rem;\">
  <img src=\"{$review['artwork_link']}\" class=\"card-img-top\" alt=\"Album doesn't exist\">
  <div class=\"card-body\">
    <h5 class=\"card-title\"> {$review['title']}</h5>
    <p class=\"card-text\">{$review['artist']}</p>
  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\">{$review['review']}</li>
  </ul>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\">Score: {$review['score']}</li>
</div>";
  }
  ?>
  </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>