<?php
session_start();

include( '../sambungan.php' );

if ( isset( $_POST[ 'submit' ] ) ) {
    $email = $_POST[ 'email' ];
    $password = sha1( $_POST[ 'password' ] );

    $sql = "SELECT * FROM `penjual` WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query( $sambungan, $sql );
    if ( mysqli_num_rows( $result ) > 0 ) {
        while ( $row = mysqli_fetch_assoc( $result ) ) {
            $_SESSION[ 'sessionid' ] = session_id();
            $_SESSION[ 'idpengguna' ] = $row[ 'idpenjual' ];
            $_SESSION[ 'email' ] = $row[ 'email' ];
            $_SESSION[ 'nama' ] = $row[ 'namapenjual' ];
            $_SESSION[ 'status' ] = 'penjual';
            echo "<script>alert('Login Berjaya');window.location='/kedai/penjual/penjual_home.php';</script>";
        }
    } else {
        echo "<script>alert('Login Gagal');window.location='index.php';</script>";
    }
}
?>
<html>

<head>
    <title>Login Penjual</title>
    <link rel='stylesheet' href='../style/abutton.css'>
    <link rel='stylesheet' href='../style/aborang.css'>
</head>

<body>

    <center>
        <img class='tajuk' src='../imej/tajuk.png' width=500>
    </center>

    <h3 class='pendek'>LOG IN</h3>
    <form class='pendek' action='index.php' method='post'>
        <table>
            <tr>
                <td><img src='../imej/userA.png'></td>
                <td><input type='text' name='email' placeholder='Email Penjual' required></td>
            </tr>
            <tr>
                <td><img src='../imej/lock.png'></td>
                <td><input type='password' name='password' placeholder='Katalaluan' required></td>
            </tr>
        </table>
        <button class='login' type='submit' name='submit'>Login</button>
    </form>
</body>

</html>