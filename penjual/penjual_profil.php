<?php
include("keselamatan.php");
include("../sambungan.php");
include("penjual_menu.php");
$idpenjual = $_SESSION["idpengguna"];

?>
<html>

<head>
    <title>Profil Penjual</title>
    <link rel="stylesheet" href="../style/asenarai.css">
    <link rel="stylesheet" href="../style/abutton.css">
</head>

<body>
    <center>
        <h3>Profil Penjual</h3>
    </center>
    <table class="produk">
        <?php
        $sql = "SELECT * FROM penjual WHERE idpenjual = '$idpenjual'";
        $result = mysqli_query($sambungan, $sql);
        while ($penjual = mysqli_fetch_array($result)) {
            $datereg = date_format(date_create($penjual['tarikhdaftar']),"d/m/Y H:i a");
            echo "<tr><td>ID Penjual</td><td>$penjual[idpenjual]</td></tr>";
            echo "<tr><td>Email Penjual</td><td>$penjual[email]</td></tr>";
            echo "<tr><td>Nama Penjual</td><td>$penjual[namapenjual]</td></tr>";
            echo "<tr><td>Tarikh Daftar</td><td>$datereg</td></tr>";
        }
        ?>
    </table>
    <center> <a href="tukar.php"> <button class='katalaluan' onclick="return confirm('Adakah anda ingin tukar?')"> Tukar Katalaluan </button></a></center>
</body>
</html>