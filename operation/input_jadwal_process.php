<?php
        include '../connect/connecting.php';
        $mk = $_POST['input_mk'];
        $jurusan = $_POST['input_jurusan'];
        $data_lab = $_POST['dropdown_lab'];
        $data_waktu = $_POST['dropdown_waktu'];


        $sqlku = "INSERT INTO jadwal VALUES (id_jadwal, '$mk', '$jurusan', '$data_lab', '$data_waktu')";

        $queryku = mysqli_query($connect, $sqlku) or die (mysqli_error($connect));

        if($queryku){
            header("location:../pages/jadwal.php");
           


        }else{
            echo "insert data gagal, coba lagi dan terus coba lagi sampai bosan mencoba";
        }
    ?>