<?php
session_start();
    if(!isset($_SESSION['sessionid'])){
        echo"<script>alert('Tiada sesi. Sila login.');window.location='index.php'</script>";
    }
?>
