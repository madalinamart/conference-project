<?php
include_once 'includes/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />
    <title>Attendance - <?php  echo $title ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">IT Conference</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
      <a class="nav-item nav-link" href="index.php">Home</a>
      <a class="nav-item nav-link" href="viewrecords.php">View Attendees</a>
    </div>
    <div class="navbar-nav ml-auto">
      <!-- CHECK IF SESSION EXISTS -> IF USER IS LOGGED IN SHOW LOGOUT BUTTON IF NOT SHOW LOGIN-->
      <?php 
      if(!isset($_SESSION['userid'])){
      ?>
      <a class="nav-item nav-link active" href="login.php">Login</a>
      <?php }else { ?>
      <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username']?>!</span></a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
      <?php
      }
      ?>
    </div>
  </div>
</nav>
      <div class='container'>
</br>