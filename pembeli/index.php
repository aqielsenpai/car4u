<?php
session_start();
//mula sesi
include( '../sambungan.php' );
//sambungan ke pengkalan data

if ( isset( $_POST[ 'submit' ] ) ) {
    //periksa sekiranya butang name = 'submit' login dihantar
    $useremail = $_POST[ 'useremail' ];
    //dapatkan email dari borang
    $password = sha1( $_POST[ 'password' ] );
    //dapatkan password dari borang dan hash gunakan sha1 hasher
    //bina arahan sql untuk memilih email dan password
    $sql = "SELECT * FROM `pembeli` WHERE email = '$useremail' AND password = '$password'";
    //laksananakan arahan sql di atas dan simpan dalam objek result
    $result = mysqli_query( $sambungan, $sql );
    //dapatkan bilangan row
    $num_rows = mysqli_num_rows( $result );
    //sekiranya row lebih besar dari 0 ( pengguna ada dalam database )
    if ( $num_rows > 0 ) {
        //rentas database dan dapatkan data pembeli
        while ( $row = mysqli_fetch_assoc( $result ) ) {
            //simpan maklumat pembeli ke dalam sesi supaya boleh dicapai dalam setiap page
            $_SESSION[ 'sessionid' ] = session_id();
            $_SESSION[ 'idpengguna' ] = $row[ 'idpembeli' ];
            $_SESSION[ 'email' ] = $row[ 'email' ];
            $_SESSION[ 'nama' ] = $row[ 'namapembeli' ];
            $_SESSION[ 'status' ] = 'pembeli';
            //ubah hala page index ke page pembeli_home
            echo "<script>alert('Login Berjaya');window.location='/kedai/pembeli/pembeli_home.php';</script>";
        }
    } else {
        //sekiranya gagal papar alert gagal dan ubah hala ke page yg sama ( login )
        echo "<script>alert('Login Gagal');window.location='/kedai/pembeli/index.php';</script>";
    }
}
?>


<html>
<title>Login Pembeli</title>

<head>
    <link rel='stylesheet' href='../style/abutton.css'>
    <link rel='stylesheet' href='../style/aborang.css'>
</head>

<body>
    <center>
        <img class='tajuk' src='../imej/tajuk.png' width=500>
    </center>

    <h3 class='pendek'>LOG IN</h3>

    <!-- Form login pembeli-->
    <form class='pendek' action='index.php' method='post'>
        <table>
            <tr>
                <td><img src='../imej/userA.png'></td>
                <td><input type='text' name='useremail' placeholder='Email' required></td>
            </tr>
            <tr>
                <td><img src='../imej/lock.png'></td>
                <td><input type='password' name='password' placeholder='Kata-laluan' required></td>
            </tr>
        </table>
        <button class='login' type='submit' name='submit'>Login</button>
        <button class='signup' type='button' onclick="window.location='signup.php'">Sign up</button>
        <button class='signup' type='button' onclick="window.location='http://localhost/kedai/penjual/'">Login Penjual</button>
    </form>
    <!-- Form login pembeli tamat-->
</body>

</html>