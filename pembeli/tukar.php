<?php

include( 'keselamatan.php' );
include( '../sambungan.php' );
include( 'pembeli_menu.php' );
$idpembeli = $_SESSION[ 'idpengguna' ];
$email = $_SESSION[ 'email' ];

if ( isset( $_POST[ 'submit' ] ) ) {
    $oldpass = sha1( $_POST[ 'oldpassword' ] );
    $newpass = sha1( $_POST[ 'newpassword' ] );
    if ( $oldpass != $newpass ) {
        $sql = "SELECT * FROM pembeli WHERE idpembeli = '$idpembeli' AND password = '$oldpass'";
        $result = mysqli_query( $sambungan, $sql );
        $num_rows = mysqli_num_rows( $result );
        if ( $num_rows > 0 ) {
            $sqlupdatepass = "UPDATE `pembeli` SET `password`= '$newpass' WHERE idpembeli = '$idpembeli'";
            $resultupdate = mysqli_query($sambungan , $sqlupdatepass);
            if ($resultupdate){
                echo "<script>alert('Operasi Berjaya');window.location='/kedai/pembeli/tukar.php';</script>";
            }
        }else{
            echo "<script>alert('Operasi Gagal');window.location='/kedai/pembeli/tukar.php';</script>";
        }
    }else{
        echo "<script>alert('Operasi Gagal');window.location='/kedai/pembeli/tukar.php';</script>";
    }

}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Tukar Katalaluan</title>
    <link rel='stylesheet' href='../style/asenarai.css'>
    <link rel='stylesheet' href='../style/abutton.css'>
    <link rel='stylesheet' href='../style/aborang.css'>
</head>

<body>
    <h3 class='panjang'> Tukar Katalaluan</h3>
    <form class='panjang' action='tukar.php' method='post' onsubmit="return confirm ('Anda pasti?')">
        <table>
            <tr>
                <td> Email </td>
                <td> <input required type='text' name='email' placeholder='Email' value=<?php echo $email?> readonly>
                </td>
            </tr>

            <tr>
                <td> Katalaluan lama</td>
                <td> <input type='password' name='oldpassword' required></td>
            </tr>
            <tr>
                <td> Katalaluan baru</td>
                <td> <input type='password' name='newpassword' required></td>
            </tr>
        </table>
        <button class='katalaluan' type='submit' name='submit'> Kemaskini </button>
    </form>
</body>

</html>