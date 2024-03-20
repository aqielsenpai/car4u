<?php
include( 'keselamatan.php' );
include( '../sambungan.php' );
include( 'penjual_menu.php' );

if ( isset( $_POST[ 'submit' ] ) ) {

    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];
    $namapembeli = $_POST[ 'namapembeli' ];

    $sql = "INSERT INTO `pembeli`(`email`, `password`, `namapembeli`) VALUES ('$email' , '$password' , '$namapembeli' )";
    $result = mysqli_query( $sambungan, $sql );
    if ( $result == true ) {
        echo "<script> alert('Pembeli berjaya ditambah dalam senarai pembeli')</script>";
        echo " <script>window.location='pembeli_senarai.php'</script>";
    } else {
        echo"<br><center> Ralat: $sql<br>".mysqli_error( $sambungan ).'</center>';
    }

}

?>
<html>

<head>
    <title>Daftar Pembeli</title>

    <link rel='stylesheet' href='../style/aborang.css'>
    <link rel='stylesheet' href='../style/abutton.css'>
</head>

<body>

    <h3 class='panjang'> TAMBAH PEMBELI </h3>
    <form class='panjang ' action='pembeli_insert.php' method='post'>
        <table>
            <tr>
                <td class='warna'> Email </td>
                <td> <input required type='text' name='email' placeholder='Email' required></td>
            </tr>

            <tr>
                <td class='warna'> Nama Pembeli </td>
                <td> <input required type='text' name='namapembeli' placeholder='cth : Evelyn' required></td>
            </tr>

            <tr>
                <td> Katalaluan </td>
                <td> <input required type='password' name='password' placeholder='max : 8 char ' required></td>
            </tr>

        </table>

        <button class='tambah' type='submit' name='submit' onclick="return confirm('Adakah anda pasti?')"> Tambah</button>

    </form>
    <br>
    <center>
        <button class='biru' onclick='tukar_warna(0)'> Biru </button>
        <button class='hijau' onclick='tukar_warna(1)'> Hijau </button>
        <button class='merah' onclick='tukar_warna(2)'> Merah </button>
        <button class='hitam' onclick='tukar_warna(3)'> Hitam </button>
    </center>

</body>
<script>
function tukar_warna(n) {
    var warna = ['Blue', 'Green', 'Red', 'Black'];
    var teks = document.getElementsByClassName('warna');
    for (var i = 0; i < teks.length; i++)
        teks[i].style.color = warna[n];

}
</script>

</html>