<?php

    require 'conf.php';
    $t = date('Y/m/d');
    // Menangkap id dari url yang dikirimkan
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    // Tampilkan value inputan dari id
    $result = mysqli_query($db, 
        "SELECT * FROM data_menu WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    if(isset($_POST['kirim'])){
        $nama = $_POST['nama'];
        $rasa = $_POST['rasa'];
        $harga = $_POST['harga'];
        $filename = $_FILES["fileToUpload"]["name"];
        $temp = $_FILES["fileToUpload"]["tmp_name"];
        $folder = "./gambar/" . $filename;

        $result = mysqli_query($db, 
        "UPDATE data_menu SET 
            nama='$nama',
            rasa='$rasa',
            harga='$harga',
            tanggal='$t',
            gambar='$filename'
        WHERE id='$id'");

        if($result){
            move_uploaded_file($temp, $folder);
            echo "
                <script>
                    alert('Data Berhasil di Update');
                    document.location.href = 'tabel.php';
                </script>
            ";
        }else {
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
        <label for="">Nama</label><br>
        <input type="text" name="nama" value=<?=$row['nama']?>><br><br>
        <label for="">Rasa</label><br>
        <input type="text" name="rasa" value=<?=$row['rasa']?>><br><br>
        <label for="">Harga</label><br>
        <input type="text" name="harga" value=<?=$row['harga']?>><br><br>
        Ganti gambar <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="kirim">
    </form>
    </div>
    </div> 
</body>
</html>