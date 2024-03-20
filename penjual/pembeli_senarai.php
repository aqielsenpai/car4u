<?php
include( 'keselamatan.php' );
include( '../sambungan.php' );
include( 'penjual_menu.php' );

?>
<html>

<head>
    <title>Senarai Pembeli</title>
    <link rel='stylesheet' href='../style/asenarai.css'>
</head>

<body>

    <table class='pembeli'>
        <caption> SENARAI NAMA PEMBELI</caption>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Daftar</th>
            <th colspan='2'> Tindakan </th>

        </tr>

        <?php

$sql = 'select * from pembeli ' ;
$result = mysqli_query( $sambungan, $sql );
while( $pembeli = mysqli_fetch_array( $result ) ) {
    $idpembeli = $pembeli[ 'idpembeli' ];
    $datereg = date_format( date_create( $pembeli[ 'tarikhdaftar' ] ), 'd/m/Y H:i a' );
    echo " <tr> <td> $pembeli[idpembeli]</td> 
         <td class = 'nama' > $pembeli[namapembeli]</td>
         <td> $pembeli[email] </td> 
         <td> $datereg </td> 
         <td> 
         <a href = 'pembeli_update.php?idpembeli=$pembeli[idpembeli]'>
         <img src = '../imej/update1.png'> </a> 
         </td>
         <td> 
         <a href = 'pembeli_delete.php?idpembeli=$idpembeli' onclick=\"return confirm( 'Adakah anda ingin padam?' )\"'>
         <img src = '../imej/delete1.png'> </a> 
         </td>
         </tr>";

}
?>
    </table>
</body>
<script>
function padam(id)
if (confirm('Adakah anda ingin padam') == true) {
    window.location = 'pembeli_delete.php?idpembeli =' + id;
}
</script>

</html>