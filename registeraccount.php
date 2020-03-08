<?php
    require_once('connectvars.php');

    $error_msg = "";

    $user_id = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $query = "INSERT INTO juser (user_id, name, password, email) VALUES ('$user_id', '$name', '$password','$email')";

    $result = mysqli_query($dbc,$query);

    $query = "INSERT INTO jprofile (user_id, displayname) VALUES ('$user_id', '$name')";

    $result = mysqli_query($dbc,$query);

    if($result){
        $home_url = 'http://' . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . '/index.php';
        header('Location: ' . $home_url);
	}
	else{
		echo "Error: " .$query."<br/>".mysqli_error($dbc);
	}

?>

    