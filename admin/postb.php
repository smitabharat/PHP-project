<?php
include_once 'dbConnection.php';
$file_name = $_FILES['fileToUpload']['name']; // get file name

//echo "".$file_name;

$name = $_POST['title'];

$name = str_replace("+"," plus",$name);

$l1 = $_POST['l1'];
$l2 = $_POST['l2'];
$l3 = $_POST['l3'];
$l4 = $_POST['l4'];
$l5 = $_POST['l5'];

$l1 = str_replace("'","\'",$l1);
$l2 = str_replace("'","\'",$l2);
$l3 = str_replace("'","\'",$l3);
$l4 = str_replace("'","\'",$l4);
$l5 = str_replace("'","\'",$l5);

//echo "".$file_name;

$file_name = $_FILES['fileToUpload']['name']; // get file name

$file_source_location = $_FILES['fileToUpload']['tmp_name']; // get source path
$file_size = $_FILES['fileToUpload']['size']; // get file size

//echo "".$file_source_location;


// save the file to target loacation
$file_target_location = "./image/$file_name"; // target location

// sava data in data base
$insert = "INSERT INTO `upload`(`file_name`,`title`,`l1`,`l2`,`l3`,`l4`,`l5`) VALUES ('$file_name','$name','$l1','$l2','$l3','$l4','$l5')";
$run = mysqli_query($con,$insert);

// move file to target location
$move = move_uploaded_file($file_source_location,$file_target_location); //(temp folder,"Path");

// check if sucessfully uploaded !
if($move == TRUE){
    header("location:./post?a=1");
}else{
    echo "ERROR: ".mysqli_error($con);
}

?>