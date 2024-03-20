<?php
include("keselamatan.php");
include("../sambungan.php");
include("pembeli_menu.php");
$idpembeli = $_SESSION["idpengguna"];

?>
<html>

<head>
    <title>Senarai Produk</title>
    <link rel="stylesheet" href="../style/asenarai.css">
    <link rel="stylesheet" href="../style/abutton.css">
</head>

<body>
    <center>
        <h3>Profil Pembeli</h3>
    </center>
    <table class="produk">
        <?php
        $sql = "SELECT * FROM pembeli WHERE idpembeli = '$idpembeli'";
        $result = mysqli_query($sambungan, $sql);
        while ($pembeli = mysqli_fetch_array($result)) {
            $datereg = date_format(date_create($pembeli['tarikhdaftar']),"d/m/Y H:i a");
            echo "<tr><td>ID Pembeli</td><td>$pembeli[idpembeli]</td></tr>";
            echo "<tr><td>Email Pembeli</td><td>$pembeli[email]</td></tr>";
            echo "<tr><td>Nama Pembeli</td><td>$pembeli[namapembeli]</td></tr>";
            echo "<tr><td>Tarikh Daftar</td><td>$datereg</td></tr>";
        }
        ?>
    </table>
    <center> <a href='tukar.php'><button class='katalaluan' onclick="return confirm('Adakah anda ingin tukar?')"> Tukar
                Katalaluan </button></a></center>
</body>

</html>