<?php
include( 'keselamatan.php' );
include( '../sambungan.php' );

$idpembeli = $_GET[ 'idpembeli' ];
$idproduk = $_GET[ 'idproduk' ];
if ( !isset( $_GET[ 'idproduk' ] ) ) {
    echo " <script>window.location='pembeli_produk.php'</script>";
}

$sqlcheck = "SELECT *  FROM bandingan WHERE idpembeli = '$idpembeli' AND idproduk = '$idproduk'";
$result = mysqli_query( $sambungan, $sqlcheck );
$bil_rekod = mysqli_num_rows( $result );
if ( $bil_rekod == 0 ) {
    $sql = "SELECT * FROM bandingan WHERE idpembeli = '$idpembeli' ";
    $resulta = mysqli_query( $sambungan, $sql );
    $bil_rekoda = mysqli_num_rows( $resulta );
    if ( $bil_rekoda < 3 ) {
        $sqlinsert = "insert into bandingan values ( NULL, '$idpembeli' , '$idproduk')";
        $result = mysqli_query( $sambungan, $sqlinsert );
        if ( $result == true ) {
            echo "<script> alert('Item berjaya ditambah dalam senarai bandingan')</script>";
            echo " <script>window.location='pembeli_produk.php'</script>";
        } else
        echo "<br><center> Ralat: $sql<br>" . mysqli_error( $sambungan ) . '</center>';
    } else {
        echo "<script> alert('Maksima 4 item sahaja dibenarkan... sila delete ') </script>";
        echo " <script>window.location='pembeli_produk.php'</script>";
    }
} else {
    echo "<script> alert('rekod telah ada ') </script>";
    echo " <script>window.location='pembeli_produk.php'</script>";
}
