<?php
include( 'keselamatan.php' );
include( '../sambungan.php' );
include( 'penjual_menu.php' );

if ( isset( $_POST[ 'submit' ] ) ) {

    $email = $_POST[ 'email' ];
    $password = sha1( $_POST[ 'password' ] );
    $namapenjual = $_POST[ 'namapenjual' ];

     $sql = "INSERT INTO `penjual`( `email`, `password`, `namapenjual`) VALUES ('$email' , '$password' , '$namapenjual' )";
    $result = mysqli_query( $sambungan, $sql );
    if ( $result ) {
        echo "<script> alert('Penjual berjaya ditambah dalam senarai penjual')</script>";
        echo " <script>window.location='penjual_senarai.php'</script>";

    } else {
        echo"<br><center> Ralat: $sql<br>".mysqli_error( $sambungan ).'</center>';
    }
}

?>
<html>

<head>
    <title>Daftar Penjual</title>
    <link rel='stylesheet' href='../style/aborang.css'>
    <link rel='stylesheet' href='../style/abutton.css'>
</head>

<body>
    <h3 class='panjang'> TAMBAH PENJUAL </h3>
    <form class='panjang ' action='penjual_insert.php' method='post'>
        <table>
            <tr>
                <td> Email Penjual </td>
                <td> <input required type='text' name='email' placeholder='Masukkan email'  required></td>
            </tr>

            <tr>
                <td> Nama Penjual </td>
                <td> <input required type='text' name='namapenjual' placeholder='Masukkan nama'  required></td>
            </tr>

            <tr>
                <td> Katalaluan </td>
                <td> <input required type='password' name='password' placeholder='Katalaluan' required></td>
            </tr>

        </table>
        <button class='tambah' type='submit' name='submit' onclick="return confirm('Adakah anda pasti?')"> Tambah</button>

    </form>
</body>

</html>