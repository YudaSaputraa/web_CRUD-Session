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
  <title>Input Jadwal</title>

</head>

<style>
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

  <div class="main mt-3">
    <div class="mt-5 w-100 container">
      <div class="row">

        <div class="col-7">
          <table class="table text-white fs-6 text-center ">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">MK Praktikum</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Lab</th>
                <th scope="col">Waktu</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../connect/connecting.php';
              $no = 1;
              $mysql = "SELECT jadwal.id_jadwal, jadwal.mk, jadwal.jurusan, lab.lab, waktu.waktu_mulai, waktu.waktu_selesai
                            FROM jadwal
                            INNER JOIN lab ON jadwal.id_lab = lab.id_lab
                            INNER JOIN waktu ON jadwal.id_waktu = waktu.id_waktu;";
              $myquery = mysqli_query($connect, $mysql);
              while ($data = mysqli_fetch_array($myquery)) {
              ?>
                <tr>
                  <th scope="row "><?= $no ?></th>
                  <td><?= $data['mk']; ?></td>
                  <td><?= $data['jurusan']; ?></td>
                  <td><?= $data['lab']; ?></td>
                  <td><?= $data['waktu_mulai'] ?>-<?= $data['waktu_selesai']; ?></td>
                  <td>
                    <a class="btn btn-outline-light" href="edit_jadwal.php?id_jadwal=<?=$data['id_jadwal']; ?>">Edit</a>
                    <a type="submit" class="btn btn-outline-danger" href="../operation/delete_lab.php? id_jadwal= <?= $data['id_jadwal']; ?>">Delete</a>
                  </td>

                </tr>
            </tbody>
          <?php $no++;
              } ?>
          </table>
        </div>

        <div class="col-5">
          <form method="POST" action="../operation/input_jadwal_process.php">
            <center>
              <a>Input Jadwal Praktikum
                <hr size="1px" width="80%" color="white" />

              </a>
              <p class="fs-6">Buat jadwal praktikum sesuai dengan yang diinginkan</p>

              <div class="main-right row">
                <div class="col-8">
                  <input type="text" class="form-control bg-transparent text-white font-weight-normal" placeholder="Masukan MK Praktikum" name="input_mk">
                </div>
                <div class="col-4 fs-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="input_jurusan" value="IF" id="input_jurusan1" checked>
                    <label class="form-check-label" for="input_jurusan1">
                      IF
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="input_jurusan" value="SI" id="input_jurusan2">
                    <label class="form-check-label" for="input_jurusan2">
                      SI
                    </label>
                  </div>
                </div>
                <br>

                <div class="mb-3 mt-3">
                  <select class="dropdown-input form-select text-white font-weight-normal" name="dropdown_lab" aria-label="Default select example">

                    <option selected>Lab</option>
                    <?php
                    include '../connect/connecting.php';

                    $mysql = "SELECT * FROM lab";
                    $myquery = mysqli_query($connect, $mysql);
                    while ($data = mysqli_fetch_array($myquery)) {
                    ?>
                      <option value="<?= $data['id_lab'] ?>"><?= $data['lab'] ?></option>
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
                    while ($data = mysqli_fetch_array($myquery)) {

                    ?>
                      <option value="<?= $data['id_waktu'] ?>"><?= $data['waktu_mulai'] ?> - <?= $data['waktu_selesai'] ?></option>
                    <?php
                    } ?>
                  </select>
                </div>

                <div class="row align-items-center">

                  <div class="col-6">
                    <a class="text-white col" href="#">
                      <button class="w-100 btn btn-outline-light bg-transparent text-white font-weight-normal">Submit</button>
                    </a>

                  </div>

                  <div class="col-6">
                    <input type="reset" class="form-control bg-transparent text-white font-weight-normal" value="Reset">
                  </div>
                </div>
              </div>
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>