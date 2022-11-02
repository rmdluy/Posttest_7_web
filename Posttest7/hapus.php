<?php 

require 'conf.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $result = mysqli_query($db, 
        "DELETE FROM data_menu WHERE id='$id'");

    if($result){
        header("Location: tabel.php");
    }
}