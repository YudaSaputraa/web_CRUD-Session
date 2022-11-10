<?php
        include '../connect/connecting.php';
        $waktu_mulai = $_POST['waktu_mulai'];
        $waktu_selesai = $_POST['waktu_selesai'];

        $sqlku = "INSERT INTO waktu VALUES (id_waktu, '$waktu_mulai', '$waktu_selesai')";

        $queryku = mysqli_query($connect, $sqlku) or die (mysqli_error($connect));

        if($queryku){
            header("location:../pages/input_waktu.php");
           


        }else{
            echo "insert data gagal, coba lagi dan terus coba lagi sampai bosan mencoba";
        }
        ?>