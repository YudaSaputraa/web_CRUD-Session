<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<style>
    .main {
        font-weight: bold;
    }

    .login {
        background-color: rgba(23, 23, 66, 0.932);
        width: 400px;
        text-align: center;
        padding: 40px;
        box-sizing: border-box;
        border-radius: 12px;
    }
</style>

<body>
    <div class="main-login">
        <form method="POST" action="operation/login_process.php">
            <div class="login">

                <center>

                    <iconify-icon class="icons" icon="carbon:user-profile" height="28"></iconify-icon>
                    <a style="font-size: 30px; font-weight: bold; font-family: 'roboto';">Login
                        <hr size="1px" width="100%" color="white" />
                    </a>
                    <div class="warning" style="font-size: 15px;">
                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == 'failed') {
                                echo "Login Gagal! Username atau Password salah.";
                            } elseif ($_GET['message'] == "logout") {
                                echo "Berhasil Logout!.";
                            } elseif ($_GET['message'] == "belum_login") {
                                echo "Anda Belum Login!";
                            }
                        }
                        ?>
                    </div>
                </center>

                <div class="inputan">
                    <input type="text" name="username" required="">
                    <span>Masukkan Username</span>
                </div>
                <div class="inputan">
                    <input type="password" name="password" required="">
                    <span>Masukkan Password</span>
                </div>
                <div class="inputan-button">
                    <input type="submit" value="login">
                </div>
                <div class="register">
                    <a class="no-account">Belum Punya Akun?</a>
                    <a class="no-account" href="pages/register.php">Daftar di sini</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>