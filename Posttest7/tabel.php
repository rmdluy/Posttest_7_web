<?php
    require 'conf.php';

    $result = mysqli_query($db, "SELECT * FROM data_menu");
?>

<!DOCTYPE html>

<body>
    
<h3>Data Pemesanan menu</h3>
    <form action="" method="GET">
        <table>
            <tr>
                <td>
                    <div class="form-outline">
                        <input type="text" name="keyword" id="keyword" placeholder="Cari Nama & Rasa" class="form-control"> 
                    </div>
                </td>
                <td>
                    <button type="submit" class="btn btn-secondary" name="search">
                        <i class="fas fa-search"></i>
                    </button>
                </td>
            </tr>
        </table>

    </form>
    <table width="100%" border="1">
        <tr>
            <td>
                nama
            </td>
            <td>
                rasa
            </td>
            <td>
                harga
            </td>
            <td>
                tanggal
            </td>
            <td>
                gambar
            </td>
            <td></td>
            <td></td>
        </tr>

        <?php 
            if(isset($_GET['search'])){
                $keyword = $_GET['keyword'];
                $result = mysqli_query($db, "SELECT * FROM data_menu WHERE nama LIKE '%$keyword%' OR rasa LIKE '%$keyword%'");				
            }else{
                $result = mysqli_query($db, "SELECT * FROM data_menu");		
            }
            $i = 1;
            while($row = mysqli_fetch_array($result)){
        ?>

        <tr>
            <td>
            <?=$row['nama']?>
            </td>
            <td>
            <?=$row['rasa']?>
            </td>
            <td>
            <?=$row['harga']?>
            </td>
            <td>
            <?=$row['tanggal']?>
            </td>
            <td>
            <img src="gambar/<?=$row['gambar']?>" width="150px">
            </td>            
            <td><a href="edit.php?id=<?=$row['id']?>"> edit </a></+td>
            <td><a href="hapus.php?id=<?=$row['id']?>">hapus</a></td>
        </tr>
    
            <?php
            
            $i++;
                }
            ?>
    
    </table>

    <table width="100%" border="1">
        <tr>
            <td>
                nama
            </td>
            <td>
                rasa
            </td>
            <td>
                harga
            </td>
            <td>
                tanggal
            </td>
            <td>
                gambar
            </td>
            <td></td>
            <td></td>
        </tr>

        <?php 
            
            $result = mysqli_query($db, "SELECT * FROM data_menu");
            $i = 1;
            while($row = mysqli_fetch_array($result)){
        ?>

        <tr>
            <td>
            <?=$row['nama']?>
            </td>
            <td>
            <?=$row['rasa']?>
            </td>
            <td>
            <?=$row['harga']?>
            </td>
            <td>
            <?=$row['tanggal']?>
            </td>
            <td>
            <img src="gambar/<?=$row['gambar']?>" width="150px">
            </td>            
            <td><a href="edit.php?id=<?=$row['id']?>"> edit </a></+td>
            <td><a href="hapus.php?id=<?=$row['id']?>">hapus</a></td>
        </tr>
    
            <?php
            
            $i++;
                }
            ?>
    
    </table>
    <a href="form.php"> tambah data </a>
</body>
</html>