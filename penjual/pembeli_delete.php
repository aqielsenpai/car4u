<?php
include("../sambungan.php");
include("../keselamatan.php");

$idpembeli = $_GET["idpembeli"];

$sql = "delete from pembeli where idpembeli = '$idpembeli'";
$result = mysqli_query($sambungan, $sql);

echo "<script>window.location='pembeli_senarai.php'</script>"
    
?>