<?php include('include/database.php'); 
include('functions/user.func.php');
include('init.php');
?>
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
  <style>
  div {
  margin: 10px;
}
</style>

		<div class="footer"style="margin-top:15px;">
			<p style="color:darkBlue;">&copy; Jim Quigley Hockey School 2019</p>
      <p id="timeClock"></p>
      </div>
</body>
</html>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('timeClock').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
