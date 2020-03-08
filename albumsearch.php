<?php

session_start();

$user_id = $_SESSION['username'];
$searchfield = $_POST['searchdata'];

$apikey = '6d0c7c2eba2c06b0253e876a6e8e47ea';

$albumtitle = $searchfield;

$artist = '';

//header( "Location: https://ws.audioscrobbler.com/2.0/?method=album.search&album=$albumtitle&api_key=$apikey&format=json" );

$url = "https://ws.audioscrobbler.com/2.0/?method=album.search&album=$albumtitle&api_key=$apikey&format=json";
//  Initiate curl
$json = file_get_contents("https://ws.audioscrobbler.com/2.0/?method=album.search&album=$albumtitle&api_key=$apikey&format=json");
$arr = json_decode($json, true);
$results = $arr["results"];
$albummatches = $results["albummatches"];
$album = $albummatches["album"];
$album_0 = $album["0"];
$album_title = $album_0["name"];
$album_artist = $album_0["artist"];
$album_img = $album_0["image"];
$artwork = $album_img["3"];
$albumcover = $artwork["#text"];

//echo $album_0["name"];
//echo $album_0["artist"];
//echo "<img src='$albumcover' alt='photo of me' />";
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
    <h1>Hello, world!</h1>

    <div class="card" style="width: 18rem;">
  <img src="<?php echo $albumcover; ?>" class="card-img-top" alt="Album doesn't exist">
  <div class="card-body">
    <h5 class="card-title"><?php echo $album_title; ?></h5>
    <p class="card-text"><?php echo $album_artist; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>