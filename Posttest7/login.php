<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style3.css">
    
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="Foto almamater.png" alt="Foto" width="70%">
        </div>
        <div class="form-login">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="user" placeholder="email atau username" class="input">
                <input type="password" name="password" placeholder="password" class="input">

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>

            <p>Belum punya akun?
                <a href="register.php">Register</a>
            </p>
        </div>
    </div>
</body>
</html>

<?php
    session_start();

    require 'conf.php';

    if (isset($_POST['login'])){
        $user = $_POST ['user'];
        $password = $_POST ['password'];

        $sql = "SELECT * FROM akun WHERE username='$user' OR email = '$user'";
        $result = $db->query($sql);

        if (mysqli_num_rows($result)> 0){
            $row = mysqli_fetch_array($result);
            $username = $row['username'];

            //valid or not
            if (password_verify($password, $row ['psw'])){

                $_SESSION['login'] = $username;

                echo "<script>
                        alert ('selamat datang $username');
                        document.location.href='index.php';
                    </script>";
            } else {
                echo "<script>
                        alert ('username dan password salah');
                    </script>";
            }
        }echo "<script>
                alert ('username tidak terdaftar, silahkan registrasi');
            </script>";
    }
    