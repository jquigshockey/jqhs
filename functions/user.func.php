<?php 
function logged_in(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}
function login_check($username, $password){
    include('include/database.php');
    $query = ("SELECT * FROM admin_users WHERE username='$username'");
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    if($result->num_rows > 0){
        $query = ("SELECT password FROM admin_users WHERE username='$username'");
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $finalResult = $result->fetch_assoc();
        $dataPassword = ($finalResult['password']);
        if($dataPassword==$password){
            $query = ("SELECT id FROM admin_users WHERE username='$username'");
            $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
            $finalResult = $result->fetch_assoc();
            $id = ($finalResult['id']);
            $_SESSION['id'] = $id;
            return true;
        }else{
            return false;
        }
    }else{
       return false;
    }
}
function user_data(){

}
function user_register($firstName, $lastName, $username, $password){
    $msg=0;
    include('include/database.php');
    $query = "INSERT INTO `admin_users` (`id`, `userName`, `firstName`, `lastName`, `password`, `dateAdded`) VALUES ('','$username','$firstName','$lastName','$password','')";
    $mysqli->query($query) or $msg=1;
    header('Location: manage.php?s='.$msg.'');
    exit;
}
function user_exists($username){
    include('include/database.php');
   // $username = mysql_real_escape_string($username);
    $query = ("SELECT * FROM admin_users WHERE username='$username'");
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    if($result->num_rows > 0){
        return true;
    }else{
        return false;
    }
}
?>