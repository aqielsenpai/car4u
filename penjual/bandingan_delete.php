<?php
include("../sambungan.php");
include("../keselamatan.php");

$idbandingan = $_GET["idbandingan"];

$sql = "delete from produk where idproduk = '$idbandingan'";
$result = mysqli_query($sambungan, $sql);

echo "<script>window.location='bandingan_senarai.php'</script>"
    
?>