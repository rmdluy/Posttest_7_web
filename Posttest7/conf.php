<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "eskrim";

$db = new mysqli($server, $username, $password, $db_name);

if (!$db){
    die("Gagal Terhubung :".$db->connection_status);
}