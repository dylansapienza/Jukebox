
<?php

session_start();

require_once('connectvars.php');

$user_id = $_SESSION['user_id'];

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit Profile</title>
  </head>
  <body>
    <div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-md">
      <h1> Edit Profile for <?php echo $user_id ?></h1>
      <form method = "post" action = "updateprofile.php" >
      <div class="form-group">
                <label for="name">Display Name</label>
                <input type="text" class="form-control" id="name" name="displayname" required>
            </div>
      <div class="form-group">
                <label for="username">Bio</label>
                <input type="text" class="form-control" id="username" name="bio" required>
            </div>
            <div class="form-group">
                <label for="email">Genres</label>
                <input type="text" class="form-control" id="email" name="genres" required>
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    <div class="col-sm">
    </div>
  </div>
    </div>

    <form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>