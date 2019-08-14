<?php 
include('include/database.php');
include('functions/user.func.php');
include('init.php');
?>
<?php
if(logged_in()==false){
  header('Location: index.php');
  exit;
}
$msg="";
	if($_GET){
		$msg = ($_GET['s']);
	}
  if($_POST){
    $firstName = ($_POST['firstName']);
    $lastName = ($_POST['lastName']);
    $uid = ($_POST['uid']);
    
    $query = "INSERT INTO members (uid, firstName, lastName, dateAdded) VALUES ('$uid','$firstName','$lastName',null)";
    $mysqli->query($query); 
    header('Location: index.php?s=0');
		exit;
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
</nav>
  <h2>Manage</h2>
  <?php 
	if(strlen($msg) > 0){
		if($msg == 0){
			echo '<h4 style="color:green;">'."Success".'</h4>';
		}else{
			echo '<h4 style="color:red;">'."Failed".'</h4>';
		}
	}
	?>
  <table>
  <ul style="list-style: none;">
  <li>
      <a href="addPlayer.html"><button type="button" style="margin-left:20px;margin-top:20px;" class="btn btn-primary btn-lg" >Add Player</button></a>
  </li>
  <li>
      <a href="addInstructor.html"><button type="button" style="margin-left:20px;margin-top:20px;" class="btn btn-primary btn-lg" >Add Instructor</button></a>
  </li>
  <li>
    <a href="selectMember.php?choice=0"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-warning btn-lg">Edit Player</button></a>
  </li>
  <li>
    <a href="editInstructor.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-warning btn-lg">Edit Instructor</button></a>
  </li>
  <li>
    <a href="archiveInstructor.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-warning btn-lg">Archive Instructor</button></a>
  </li>
  <li>
    <a href="archivePlayer.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-warning btn-lg">Archive Player</button></a>
  </li>
  <li>
    <a href="deletePlayer.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-danger btn-lg">Delete Player</button></a>
  </li>
  <li>
    <a href="deleteInstructor.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-danger btn-lg">Delete Instructor</button></a>
  </li>
</ul>
</table>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>