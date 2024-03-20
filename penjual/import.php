<?php
include( 'keselamatan.php' );
include( '../sambungan.php' );
include( 'penjual_menu.php' );

if ( isset( $_POST[ 'submit' ] ) ) {
    $namajadual = $_POST[ 'namajadual' ];
    $namafail = $_FILES[ 'namafail' ][ 'name' ];
    $sementara = $_FILES[ 'namafail' ][ 'tmp_name' ];
    move_uploaded_file( $sementara, $namafail );

    $fail = fopen ( $namafail, 'r' );

    while ( !feof( $fail ) ) {
        $medan = explode( ',', fgets( $fail ) );
        $berjaya = false;

        if ( strtolower( $namajadual ) === 'pembeli' ) {
            $emailpembeli = $medan[ 0 ];
            $namapembeli = $medan[ 1 ];
            $password = sha1( $medan[ 2 ] );
            $sql = "INSERT INTO `pembeli`(`email`, `password`, `namapembeli`) VALUES ('$emailpembeli' , '$password' , ' $namapembeli')";
            if ( mysqli_query( $sambungan, $sql ) )
            $berjaya = true;
            else
            echo "<br><center> Ralat : $sql <br>".mysqli_error( $sambungan ).'</center>';
        }

        if ( strtolower( $namajadual ) === 'penjual' ) {
            $emailpenjual = $medan[ 0 ];
            $namapenjual = $medan[ 1 ];
            $password = sha1( $medan[ 2 ] );
            $sql = "INSERT INTO `penjual`( `email`, `password`, `namapenjual`) VALUES ('$emailpenjual' , '$password' , ' $namapenjual')";
            if ( mysqli_query( $sambungan, $sql ) )
            $berjaya = true;
            else
            echo "<br><center> Ralat : $sql <br>".mysqli_error( $sambungan ).'</center>';
        }
    }
    if ( $berjaya == true )
    echo"<script> alert('Rekod berjaya diimport '); </script>";
    else
    echo"<script> alert('Rekod Tidak berjaya diimport '); </script>";
    mysqli_close( $sambungan );
}
?>

<html>

<head>
    <title>Import Data</title>
    <link rel='stylesheet' href='../style/abutton.css'>
    <link rel='stylesheet' href='../style/aborang.css'>
</head>

</html>

<body>

    <h3 class='panjang'> IMPORT DATA </h3>

    <form class='panjang' action='import.php' method='post' enctype='multipart/form-data' class='import'>
        <table>
            <tr>
                <td> Jadual </td>
                <td>
                    <select name='namajadual'>
                        <option> Pembeli </option>
                        <option> Penjual </option>

                    </select>

                </td>
            </tr>

            <tr>
                <td> Nama Fail </td>
                <td> <input type='file' name='namafail' accept='.txt'></td>
            </tr>
        </table>
        <button class='tambah' type='submit' name='submit'> Import </button>

    </form>
</body>