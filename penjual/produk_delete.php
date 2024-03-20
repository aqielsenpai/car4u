<?php
include("../sambungan.php");
include("penjual_menu.php");

$idproduk = $_GET["idproduk"];

$sql = "delete from produk where idproduk = '$idproduk'";
$result = mysqli_query($sambungan, $sql);
if ($result == true){
    echo"<br><center> Berjaya delete  </center>";
}else{
    echo"<br><center> Ralat: $sql<br>".mysqli_error($sambungan)."</center>";
    echo "<script>window.location='produk_senarai.php'</script>";
}
?>


