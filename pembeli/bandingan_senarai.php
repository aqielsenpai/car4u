<?php
include( 'keselamatan.php' );
include( '../sambungan.php' );
include( 'pembeli_menu.php' );

?>
<html>

<head>
    <title>Banding</title>
    <link rel='stylesheet' href='../style/asenarai.css'>
    <link rel='stylesheet' href='../style/abutton.css'>
</head>

<body>

    <table>
        <caption> PERBANDINGAN PRODUK </caption>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th> Tindakan </th>

        </tr>

        <?php

$sql = 'select * from bandingan join produk on bandingan.idproduk = produk.idproduk' ;

$result = mysqli_query( $sambungan, $sql );
while( $produk = mysqli_fetch_array( $result ) ) {

    echo " <tr> <td> $produk[idproduk]</td> 
         <td class = 'nama' > $produk[namaproduk]</td>
         <td> <img width = 150 src = '../imej/$produk[idproduk].jpg'> </td> 
         <td> $produk[keterangan]</td>
         <td> RM $produk[harga]</td>
         <td>
         <a href = 'bandingan_delete.php?idbandingan=$produk[idbandingan]' onclick=\"return confirm( 'Adakah anda ingin padam?' )\">
         <img src = '../imej/delete2.png'> </a></td>
         </tr>";
}
?>
    </table>
    <center> <button class='cetak ' onclick='window.print()'>Cetak </button></center>
</body>
</html>