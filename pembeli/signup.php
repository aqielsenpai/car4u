<?php
include( '../sambungan.php' );
//sambungan ke pengkalan data
//periksa sekiranya butang submit form ditekan
if ( isset( $_POST['submit'] ) ) {
    //dapatkan email, password dan nama dari form
    $email = $_POST[ 'email' ];
    //hash kata laluan pengguna supaya lebih selamat menggunakan sha1
    $password = sha1( $_POST[ 'password' ] );
    $namapembeli = $_POST[ 'namapembeli' ];
    //bina sql untuk insert data ke dalam table pembeli
    $sql = "INSERT INTO `pembeli`(`email`, `password`, `namapembeli`)  VALUES('$email', '$password' , '$namapembeli')";
    //laksanakan sql 
    $result = mysqli_query( $sambungan, $sql );
    //periksa sekiranya perlaksanaan berjaya
    if ( $result ) {
        //sekiranya berjaya insert data
        echo "<script>alert('Berjaya sign up')</script>";
        echo  "<script>window.location='index.php'</script>";
    } else {
        //sekiranya gagal insert data
        echo "<script>alert('Tidak berjaya sign up')</script>";
        echo  "<script>window.location='signup.php'</script>";
    }
}
?>

<!-- Bahagian user interface -->
<html>
<head>
    <title>Pendaftaran Akaun</title>
    <link rel='stylesheet' href='../style/abutton.css'>
    <link rel='stylesheet' href='../style/aborang.css'>
</head>

<body>
    <center><br>
        <img src='../imej/tajuk.png'>
    </center>

    <h3 class='panjang'> Daftar Akaun</h3>
    <!-- Bahagian form pendaftaran -->
    <form class='panjang ' action='signup.php' method='post'>
        <table>
            <tr>
                <td> Email </td>
                <td> <input required type='text' name='email' placeholder='Email'
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                        oninvalid="this.setCustomValidity('Sila masukkan email anda')"
                        oninput="this.setCustomValidity('')">
                </td>
            </tr>

            <tr>
                <td> Nama Pembeli </td>
                <td> <input type='text' name='namapembeli' required></td>
            </tr>

            <tr>
                <td> Password </td>
                <td> <input type='text' name='password' required></td>
            </tr>
        </table>

        <button class='tambah' type='submit' name='submit'> Daftar </button>
        <button class='batal' type='button' onclick="window.location = 'index.php'"> Batal </button>
    </form>
    <!-- Bahagian tutup form pendaftaran -->

</body>

</html>