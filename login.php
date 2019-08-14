<?php 
include('include/database.php'); 
include('functions/user.func.php'); 
include('init.php');
if(logged_in()){
  header('Location: manage.php?s=0');
  exit;
}
if(isset($_POST['username'])){
  $username = ($_POST['username']);
  $password = ($_POST['password']);
  $login = login_check($username, $password);
  if($login==true){
    session_start();
    $_SESSION['user_id'] = $username;
    header('Location: manage.php?s=0');
    exit;
  }else{
    echo '<h3>Username or Password is incorrect</h3>';
  }
}
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
</nav>
  <h2>Login</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;margin-left:15px;"id="timeClock"></p>
<div class="card" style="width: 90%; padding: 10px;">
<form method="post" action="login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="userName" name="username" aria-describedby="usernameHelp" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <button type="submit" style="margin-left:10px;" class="btn btn-primary">Submit</button>
</form>
<a class="navbar" href="createAccount.php" style="color:rgb(111, 21, 214); font-weight: bold;">Create Account</a>
</div>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
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
