<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "db_kedai";

    $sambungan = mysqli_connect ($host,$user,$password,$database)
    or die("Sambungan gagal");
    //echo"Sambungan berjaya";
?>