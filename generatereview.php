<?php

session_start();

require_once('connectvars.php');

$user_id = $_SESSION['user_id'];
$album_title = $_SESSION['album_title'];
$album_artist = $_SESSION['album_artist'];
$album_cover = $_SESSION['album_artwork'];
$review = $_POST['review'];
$score = $_POST['score'];

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "SELECT * FROM jalbum where title = '$album_title' and artist = '$album_artist'";

$data = mysqli_query($dbc,$query);

if (mysqli_num_rows($data) >= 1) {

  }
  else {
    $query = "INSERT INTO jalbum(title, artist, artwork_link) VALUES ('$album_title', '$album_artist', '$album_cover')";
    $data = mysqli_query($dbc,$query);
  }

$query = "SELECT album_id FROM jalbum where title = '$album_title' and artist = '$album_artist'";
$data = mysqli_query($dbc,$query);

$row = mysqli_fetch_assoc($data);
$albumid = $row['album_id'];
echo $albumid;
$query = "INSERT INTO jreview(album_id, user_id, score, review) VALUES ('$albumid', '$user_id', '$score', '$review')";
$data = mysqli_query($dbc,$query);

if($data){
    $home_url = 'http://' . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . '/profile.php';
    header('Location: ' . $home_url);
}
else{
    echo "Error: " .$query."<br/>".mysqli_error($dbc);
}


?>

