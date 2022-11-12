<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:../index.php?message=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Input Waktu</title>

</head>
<style>
    .main {
        height: 80vh;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <a class="navbar-brand text-white" href="#">Praktikum IF | 123210181</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" href="input_lab.php">Lab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="input_waktu.php">Waktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="jadwal.php">Jadwal</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="nav-link text-secondary" href="../operation/logout.php">Logout</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="main mt-3">
        <div class="w-100 container">
            <div class="row">
                <div class="col">
                    <table class="table text-white fs-4 text-center ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connect/connecting.php';
                            $no = 1;
                            $mysql = "SELECT * FROM waktu";
                            $myquery = mysqli_query($connect, $mysql);
                            while ($data = mysqli_fetch_array($myquery)) {
                            ?>
                                <tr>
                                    <th scope="row "><?= $no ?></th>
                                    <td><?= $data['waktu_mulai']; ?> - <?= $data['waktu_selesai']; ?></td>
                                    <td>
                                        <a type="submit" href="../operation/delete_lab.php? id_waktu= <?= $data['id_waktu'] ?>" name="delete_button" class="btn btn-outline-danger" value="submit">Delete</a>
                                    </td>
                                </tr>
                        </tbody>

                    <?php $no++;
                            } ?>
                    </table>
                    <div class="warning text-center" style="font-size: 15px;">
                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == 'hapus_gagal') {
                                echo "proses hapus data waktu gagal karena data waktu digunakan di jadwal";
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="col">
                    <form method="POST" action="../operation/input_waktu_process.php">
                        <center>
                            <a>Input Data Lab
                                <hr size="1px" width="80%" color="white" />
                                <h5>Input Waktu Pelaksanaan Praktikum</h5>
                            </a>
                            <div class="login row">
                                <div class="inputan col w-100">
                                    <h6>Mulai</h6>
                                    <input type="time" name="waktu_mulai" required="">

                                </div>
                                <div class="inputan col w-100">
                                    <H6>Selesai</H6>
                                    <input type="time" name="waktu_selesai" required="">

                                </div>
                                <div class="mt-3 row">
                                    <a class="text-white col" href="#">
                                        <button class="w-100 btn btn-outline-light">Submit</button>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>