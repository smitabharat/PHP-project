<?php

// $username = $_POST['uname'];
// $password = $_POST['password'];
// echo "".$username."<br>".$password;

session_start();
ob_start();
include_once 'dbConnection.php';
$user = $_POST['uname'];
$pass = $_POST['password'];

$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;

if(!(isset($_SESSION['user']))){
    header("location:./admin.html");
}

else{
    $q = mysqli_query($con,"SELECT * FROM `admin` WHERE user = '$user' AND pass = '$pass' ");
    if($q == TRUE){
        header("location:./action");
    }
    else{
        echo "Please Enter Valid Credential";
    }
}
ob_end_flush();
?>