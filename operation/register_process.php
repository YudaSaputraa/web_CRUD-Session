<?php
include '../connect/connecting.php';
$username = $_POST['username-reg'];
$password = $_POST['password-reg'];

$myregis = "INSERT INTO user VALUES(id_user, '$username', '$password')";

$myquery = mysqli_query($connect, $myregis) or die (mysqli_error($connect));

if($myquery){
    header("location:../index.php");
}else{
    echo "Register Gagal";
}

?>