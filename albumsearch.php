<?php
$apikey = '6d0c7c2eba2c06b0253e876a6e8e47ea';

$albumtitle = 'Tired Boy';

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
$album_img = $album_0["image"];
$artwork = $album_img["3"];
$albumcover = $artwork["#text"];
echo $album_0["name"];
echo $album_0["artist"];
echo "<img src='$albumcover' alt='photo of me' />";

?>