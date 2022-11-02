<?php

    require 'conf.php';
    $tgl = date('Y/m/d');

    if(isset($_POST['kirim'])){
        $nama = $_POST['nama'];
        $rasa = $_POST['rasa'];
        $harga = $_POST['harga'];
        $filename = $_FILES["fileToUpload"]["name"];
        $temp = $_FILES["fileToUpload"]["tmp_name"];
        $folder = "./gambar/" . $filename;

        $result = mysqli_query($db, 
        "INSERT INTO data_menu (nama, rasa, harga, tanggal, gambar) 
        VALUES ('$nama', '$rasa', '$harga', '$tgl', '$filename')");

        if($result){
            move_uploaded_file($temp, $folder);
            echo "
                <script>
                    alert('Data Berhasil Dikirim');
                </script>
            ";
            header('Location: tabel.php');
        }  else {
            echo "
                <script>
                    alert('Data Gagal Dikirim');
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eskrim</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="login-page">
    <div class="form">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for=""><h3>DATA PESANAN</h3></label>
        <input type="text" name="nama" placeholder="Nama Menu"><br><br>
        <input type="text" name="rasa" placeholder=" Rasa "><br><br>
        <input type="text" name="harga" placeholder="Harga"><br><br>
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="kirim">
    </form>
    </div>
    </div> 
</body>
</html>