<?php
session_start();
if(empty($_SESSION['username-reg'])){
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
    <title>Edit Jadwal</title>
</head>

<style>
    .main{
        height: 80vh;
    }
  .main-right {
    padding-left: 10%;
    padding-right: 10%;
    padding-top: 5%;
  }

  .dropdown-input {
    background-color: rgba(31, 31, 44, 255)
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
            <a class="nav-link text-secondary" href="input_lab.php">Lab</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary" href="input_waktu.php">Waktu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active " href="jadwal.php">Jadwal</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="nav-link text-secondary" href="../operation/logout.php">Logout</a>
        </span>
      </div>
    </div>
  </nav>
    <div class="main">
    <div class="col-5">
          <form method="POST" action="../operation/update_jadwal.php">
          <?php
        include '../connect/connecting.php';
        $id_jadwal = $_GET['id_jadwal'];
        $mysql = "SELECT * FROM jadwal
        WHERE id_jadwal = $id_jadwal";
        $myquery = mysqli_query($connect, $mysql);
        $data = mysqli_fetch_array($myquery);
        ?>
                        <input type="hidden" name="id_jadwal" value="<?=$data['id_jadwal']?>">
            <center>
              <a>Ubah Jadwal Praktikum
                <hr size="1px" width="80%" color="white" />
              </a>
              <p class="fs-6">Buat jadwal praktikum sesuai dengan yang diinginkan</p>

              <div class="main-right row">
                <div class="col-8">
                  <input type="text" class="form-control bg-transparent text-white font-weight-normal" placeholder="Masukan MK Praktikum" name="input_mk" value="<?=$data['mk']?>">
              
                </div>
                <div class="col-4 fs-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="input_jurusan" value="IF" id="input_jurusan1" <?= $data['jurusan'] == "IF" ? "checked" : "" ?>>
                    <label class="form-check-label" for="input_jurusan1">
                      IF
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="input_jurusan" value="SI" id="input_jurusan2" <?= $data['jurusan'] == "SI" ? "checked" : "" ?>>
                    <label class="form-check-label" for="input_jurusan2">
                      SI
                    </label>
                  </div>
                </div>
                <br>

                <div class="mb-3 mt-3">
                  <select class="dropdown-input form-select text-white font-weight-normal" name="dropdown_lab" aria-label="Default select example">

                    <option >Lab</option>
                    <?php
                    include '../connect/connecting.php';

                    $mysql = "SELECT * FROM lab";
                    $myquery = mysqli_query($connect, $mysql);
                    while ($data_lab = mysqli_fetch_array($myquery)) {
                    ?>
                      <option value="<?= $data_lab['id_lab'] ?>" <?= $data["id_lab"] == $data_lab['id_lab'] ? "selected" : "" ?>><?= $data_lab['lab'] ?></option>
                    <?php
                    } ?>
                  </select>
                </div>


                <div class="mb-3">
                  <select class="dropdown-input form-select text-white font-weight-normal " name="dropdown_waktu" aria-label="Default select example">

                    <option selected>Waktu</option>
                    <?php
                    include '../connect/connecting.php';

                    $mysql = "SELECT * FROM waktu";
                    $myquery = mysqli_query($connect, $mysql);
                    while ($data_waktu = mysqli_fetch_array($myquery)) {
                    ?>
                      <option value="<?= $data['id_waktu'] ?>" <?= $data["id_waktu"] == $data_waktu['id_waktu'] ? "selected" : "" ?>><?= $data_waktu['waktu_mulai'] ?> - <?= $data_waktu['waktu_selesai'] ?></option>
                    <?php
                    } ?>
                  </select>
                </div>

                <div class="row-12 align-items-center">

                
                    <a class="text-white" href="#">
                      <button type="submit" class="w-100 btn btn-outline-light bg-transparent text-white font-weight-normal">Submit</button>
                    </a>


                
                    <input type="reset" class="form-control bg-transparent text-white font-weight-normal" value="Reset">
              
                </div>
              </div>
            </center>
          </form>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>