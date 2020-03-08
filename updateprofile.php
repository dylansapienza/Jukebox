<?php

    session_start();

    require_once('connectvars.php');

    $user_id = $_SESSION['user_id'];

    $displayname = $_POST['displayname'];
    $bio = $_POST['bio'];
    $genres = $_POST['genres'];

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $query = "UPDATE jprofile SET displayname = '$displayname', bio = '$bio', genres = '$genres' where user_id = '$user_id' ";

    $result = mysqli_query($dbc,$query);

    if($result){
        $home_url = 'http://' . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . '/profile.php';
        header('Location: ' . $home_url);
	}
	else{
		echo "Error: " .$query."<br/>".mysqli_error($dbc);
	}
?>