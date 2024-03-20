<?php

include( 'keselamatan.php' );
include( '../sambungan.php' );
include( 'penjual_menu.php' );
$idpenjual = $_SESSION[ 'idpengguna' ];

if ( isset( $_POST[ 'submit' ] ) ) {

    $namaproduk = $_POST[ 'namaproduk' ];
    $harga = $_POST[ 'harga' ];
    $keterangan = $_POST[ 'keterangan' ];
    $sql = "INSERT INTO `produk`(`namaproduk`, `keterangan`, `harga`, `idpenjual`) VALUES ('$namaproduk' , '$keterangan'  , $harga, '$idpenjual')";
    $result = mysqli_query( $sambungan, $sql );
    $last_id = mysqli_insert_id( $sambungan );
    $namafail = $last_id. '.jpg';
    $sementara = $_FILES[ 'namafail' ][ 'tmp_name' ];
    if ( $result ) {
        move_uploaded_file( $sementara, '../imej/'.basename( $namafail ) );
        echo "<script> alert('Item berjaya di tambah')</script>";
        echo " <script>window.location='produk_senarai.php'</script>";
    } else {
        echo "<br><center> Ralat: $sql<br>".mysqli_error( $sambungan ).'</center>';
    }

}

?>
<html>

<head>
    <title>Daftar Produk</title>
    <link rel='stylesheet' href='../style/aborang.css'>
    <link rel='stylesheet' href='../style/abutton.css'>
</head>
<h3 class='panjang'> TAMBAH KENDERAAN </h3>
<form class='panjang ' action='produk_insert.php' method='post' enctype='multipart/form-data'>
    <table>

        <tr>
            <td> Nama Produk </td>
            <td> <input required type='text' name='namaproduk' placeholder='cth : proton' required></td>
        </tr>

        <tr>
            <td> Gambar 500x500 </td>
            <td> <input type='file' name='namafail' accept='.jpg' required></td>
        </tr>

        <tr>
            <td> Harga </td>
            <td> <input type='text' name='harga' required></td>
        </tr>

        <tr>
            <td> Keterangan </td>
            <td> <textarea name='keterangan' cols='24' rows='5' required></textarea></td>
        </tr>

    </table>

    <button class='tambah' type='submit' name='submit' onclick="return confirm('Adakah anda pasti?')"> Tambah</button>

</form>

</html>