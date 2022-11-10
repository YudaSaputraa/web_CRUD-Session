<?php
session_start();
if(empty($_SESSION['username'])){
    header("location:../index.php?message=belum_login");
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    .main{
        padding:10%
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <a class="navbar-brand text-white" href="#">Praktikum IF | 123210181</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-text">
                <a class="nav-link text-white" href="../operation/logout.php">Logout</a>
            </span>
        </div>
        </div>
    </nav>

    <div class="main">

        <h5>Selamat Datang di</h5>
        <h2>Praktikum Informatika</h2>
        <div class="mt-3 w-100 container">
            <div class="row">
                <a class="text-white col" href="input_lab.php">
                    <button class="w-100 btn btn-outline-light">Lab</button>
                </a>
                <a class="text-white col" href="input_waktu.php">
                    <button class="w-100 btn btn-outline-light">Waktu Praktikum</button>
                </a>

            </div>
            <div class="mt-3 row">
                <a class="text-white col" href="#">
                    <button class="w-100 btn btn-outline-light">Jadwal Praktikum</button>
                </a>
            </div>
        </div>


    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>