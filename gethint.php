<?php
include('include/database.php');

$players ="SELECT id, firstName, lastName, presence FROM players ORDER by firstName";
  $playersResults = $mysqli->query($players) or die($mysqli->error.__LINE__);
  //$names[] = 'Jon Doe test';
  if($playersResults->num_rows > 0) {
    //Loop through results
    while($row = $playersResults->fetch_assoc()){
        $names[] = $row['firstName'];
    }
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($names as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no results" : $hint;
?>