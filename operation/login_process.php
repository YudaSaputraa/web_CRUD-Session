<?php
session_start();
include '../connect/connecting.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sqlku = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
$data = mysqli_query($connect, $sqlku);

$check = mysqli_num_rows($data);

if($check > 0 ){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:../pages/dashboard.php");
}else{
    header("location:../index.php?message=failed");
}

?>