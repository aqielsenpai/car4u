<?php
include( '../sambungan.php' );
include( 'keselamatan.php' );

$idbandingan = $_GET[ 'idbandingan' ];

$sql = "delete from bandingan where idbandingan = '$idbandingan'";
$result = mysqli_query( $sambungan, $sql );
if (!$result){
    echo "<script>alert('Error');window.location='bandingan_senarai.php'</script>";    
}else{
    echo "<script>window.location='bandingan_senarai.php'</script>";
}

?>