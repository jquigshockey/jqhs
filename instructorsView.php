<?php include('include/database.php'); 
include('functions/user.func.php');
include('init.php');
?>
<script>
var mysql = require('mysql');
</script>

<!DOCTYPE html>
<html>
<head>
<title>Jim Quigley Hockey School</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Player Management Application" content="">
    <meta name="Jim Quigley" content="">
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#000099">
    <link rel="icon" href="logo.png">
    <!-- Bootstrap core CSS -->
    <link href="./css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/custom.css" rel="stylesheet">
</head>
<body onload="startTime()">
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
  <a class="navbar-brand" href="index.php" style="color:rgb(0, 0, 153); font-weight: bold;">JQHS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a class="nav-link" href="playersView.php" style="color:rgb(0, 0, 153);">Players</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="instructorsView.php" style="color:rgb(0, 0, 153);">Instrcutors</a>
      </li>
      <?php
      if(logged_in()){
        echo '
        <li class="nav-item">
        <a class="nav-link" href="manage.php" style="color:rgb(0, 0, 153);">Manage</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php" style="color:rgb(0, 0, 153);">Log Out</a>
        </li>
        ';
      }else{
        echo '
        <li>
        <a class="nav-link" href="login.php" style="color:rgb(0, 0, 153);">Login</a>
        </li>
        ';
      }
      ?>
      </ul>
  </div>
</nav>
