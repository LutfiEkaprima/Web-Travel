<?php

$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_sikm";
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

if($koneksi -> connect_error){
    die("Connection failed: " . $koneksi -> connect_error);
}

?>