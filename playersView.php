<?php include('include/database.php'); 
include('functions/user.func.php');
include('init.php');
    $players ="SELECT id, firstName, lastName, presence FROM players ORDER by firstName";
  $playersResults = $mysqli->query($players) or die($mysqli->error.__LINE__);
?>
<?php
error_reporting(0);
$searchName = '';
$searchName = $_GET['search'];
if(isset($search)&&(!empty($search))){
    $players ="SELECT id, firstName, lastName, presence FROM players WHERE firstName='$searchName' ORDER by firstName";
    $playersResults = $mysqli->query($players) or die($mysqli->error.__LINE__);
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
    <link rel="icon" href="./logo.png">
    <!-- Bootstrap core CSS -->
    <link href="./css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/custom.css" rel="stylesheet">
</head>
<body onload="startTime()">
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
  <a class="navbar-brand" href="index.php" style="color:rgb(0, 0, 153); font-weight: bold;"><- Back</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a class="nav-link" href="" style="color:rgb(0, 0, 153);">Players</a>
      </li>
  </div>
</nav>
  <style>
  div {
  margin: 10px;
}
</style>
<html>
<head>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                <?php
                $dom = new DOMDocument();
                $dom->loadHTML("playersView.php");
                
                $div = $dom->getElementsByTagName('txtHint');
                ?>
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form class="form-group" style="margin:15px;"> 
Search By First name: <input type="text" onkeyup="showHint(this.value)">
Results: <a  href=''><span id="txtHint"></span></a>
</form>
</body>
</html>

<form id="markAttendance" role="form" method="get" action="add.php">
<table class="table-striped" style="width: 100%; border: 1px black solid;">
				<tr>
					<th style="margin:20px; padding: 10px;">Name</th>
                    <th>Presence</th>
                    <th>More</th>
				</tr>
			<?php 
				//Check if at least one row is found
				if($playersResults->num_rows > 0) {
				//Loop through results
				while($row = $playersResults->fetch_assoc()){
					//Display customer info
					$msg = "";
					if($row['presence']==0){
						$msg = "Present";
					}else{
						$msg = "Absent";
					}
					$output ='<tr>';
					$output .='<td style="padding-top:15px;padding-bottom:15px; padding-left:5px;">'.$row['firstName'].' '.$row['lastName'].'</td>';
          if($row['presence']==0){
            $output .='<td style="color:green;padding-left:20px;"><button type="submit" class="btn btn-success" name="id" value='.$row['id'].'>'.$msg.'</button>'.'</td>';
            $output .= '<td padding-left:10px;">'.'<a href="">Medical</a>'.'</td>';
					}else{
                        $output .='<td style="color:red;padding-left:20px;"><button type="submit" class="btn btn-outline-danger" name="id" value='.$row['id'].' style="color:red;">'.$msg.'</button>'.'</td>';
                        $output .= '<td padding-left:10px;">'.'Test'.'</td>';
                    }
					$output .='</tr>';
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, no records found";
			}
			?>
		</table>
</form>

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
