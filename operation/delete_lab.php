<?php
    include '../connect/connecting.php';
    $idLab = $_GET['id_lab'];

    $sql = mysqli_query($connect, "DELETE FROM lab where id_lab = $idLab");


    if ($sql) {
        header("location:../pages/input_lab.php");
        die();
    } else {
        echo "proses hapus gagal";
    }

?>

<?php
    include '../connect/connecting.php';
    $id_waktu = $_GET['id_waktu'];

    $sql = mysqli_query($connect, "DELETE FROM waktu where id_waktu = $id_waktu");


    if ($sql) {
        header("location:../pages/input_waktu.php");
        die();
    } else {
        echo "proses hapus gagal";
    }

?>

<?php
    include '../connect/connecting.php';
    $id_jadwal = $_GET['id_jadwal'];

    $sql = mysqli_query($connect, "DELETE FROM jadwal where id_jadwal = $id_jadwal");


    if ($sql) {
        header("location:../pages/jadwal.php");
        die();
    } else {
        echo "proses hapus gagal";
    }

?>