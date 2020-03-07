<?php
$apikey = '';

$albumtitle = 'Abbey Road';

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
echo $album_0["artist"];
?>