<?php
     include("../keselamatan.php");
     include("../sambungan.php");
   
     $idpembeli = $_POST["idpembeli"];
     $idproduk = $_POST["idproduk"];
     

    $result = mysqli_query( $sambungan, "SELECT * FROM bandingan ");
    $bil_rekod = mysqli_num_rows($result);

    if(isset($_GET["idproduk"])) {
        if ($bil_rekod < 3 ) {
            $sql = "insert into bandingan values ( NULL, '$idpembeli' , '$idproduk')";
            $result = mysqli_query($sambungan , $sql);
            if($result == true)
                 echo"<script> alert('Item berjaya ditambah dalam senarai bandingan')</script>";
            else
                echo"<br><center> Ralat: $sql<br>".mysqli_error($sambungan)."</center>";
            
        }
        else
            echo "<script> alert('Maksima 4 item sahaja dibenarkan... sila delete ') </script>";  
    }
echo " <script>window.location='../pembeli_produk.php'</script>";

?>

