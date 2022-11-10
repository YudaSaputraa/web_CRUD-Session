
<?php
        include '../connect/connecting.php';
        $mk = $_POST['input_mk'];
        $id_jadwal = $_POST['id_jadwal'];
        $jurusan = $_POST['input_jurusan'];
        $data_lab = $_POST['dropdown_lab'];
        $data_waktu = $_POST['dropdown_waktu'];


        $sqlku = "UPDATE jadwal SET mk = '$mk', jurusan = '$jurusan', id_lab = '$data_lab', id_waktu = '$data_waktu' WHERE id_jadwal = '$id_jadwal'";

        $queryku = mysqli_query($connect, $sqlku) or die (mysqli_error($connect));

        if($queryku){
            header("location:../pages/jadwal.php");

        }else{
            echo "Update data gagal, coba lagi dan terus coba lagi sampai bosan mencoba";
        }
    ?>