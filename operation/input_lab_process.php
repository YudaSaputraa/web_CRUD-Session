<?php
        include '../connect/connecting.php';
        $labName = $_POST['lab-name'];

        $sqlku = "INSERT INTO lab VALUES (id_lab, '$labName')";

        $queryku = mysqli_query($connect, $sqlku) or die (mysqli_error($connect));

        if($queryku){
            header("location:../pages/input_lab.php");
           


        }else{
            echo "insert data gagal, coba lagi dan terus coba lagi sampai bosan mencoba";
        }
        ?>