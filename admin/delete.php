<?php
include_once 'dbConnection.php';
$title = $_GET['title'];
$result = mysqli_query($con,"DELETE FROM upload WHERE title='$title' ") or die('Error');
if($result == TRUE){
    header("location:./action");
}
?>