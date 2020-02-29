<?php
    require_once('connectvars.php');

    $error_msg = "";

    $user_id = $_POST['username'];
    $password = $_POST['password'];
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $query = "SELECT user_id, password, name FROM juser WHERE user_id = '$user_id' AND password = '$password'";

    $data = mysqli_query($dbc,$query);

    if (mysqli_num_rows($data) == 1) {
          
        $row = mysqli_fetch_array($data);

        //TODO: so set the user ID and username session vars
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];

        //TODO: redirect to index.php 
        $home_url = 'http://' . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . '/index.php';
        header('Location: ' . $home_url);
      }
      else {
        // The username/password are incorrect so set an error message
        echo 'Sorry, you must enter a valid username and password to log in.';
      }

?>

    