<?php
include("keselamatan.php");
     include("sambungan.php");
     include("penjual/penjual_menu.php");

     if(isset($_POST["submit"])) {
         $namajadual = $_POST["namajadual"];
         $namafail = $_POST["namafail"]["name"];
         $sementara = $_POST["namafail"]["tmp_name"];
         move_uploaded_file($sementara , $namafail);
                                         
         $fail = fopen ($namafail, "r");
         
         while (!feof($fail)) {
             $medan = explode(",", fgets($fail));
             $berjaya = false;
             
             if (strtolower($namajadual) === "pembeli"){
                 $idpembeli = $medan [0];
                 $namapembeli = $medan [1];
                 $password = $medan [2];
                 $sql = "insert into pembeli 
                 values ('$idpembeli' , '$password' , ' $namapembeli')";
                 if (mysqli_query($sambungan , $sql))
                     $berjaya = true;
                 else
                     echo "<br><center> Ralat : $sql <br>".mysqli_error($sambungan)."</center>";
             }
             
             if (strtolower($namajadual) === "penjual"){
                 $idpenjual = $medan [0];
                 $password = $medan [1];
                 $namapenjual = $medan [2];
                
                 $sql = "insert into penjual 
                 values ('$idpenjual' , '$password' , ' $namapenjual')";
                 if (mysqli_query($sambungan , $sql))
                     $berjaya = true;
                 else
                     echo "<br><center> Ralat : $sql <br>".mysqli_error($sambungan)."</center>";
             }
         }
          if ($berjaya == true) 
            echo"<script> alert('Rekod berjaya diimport '); </script>";
                else
            echo"<script> alert('Rekod Tidak berjaya diimport '); </script>";
            mysqli_close($sambungan);
            }
            ?>
<link rel="stylesheet" href="style/abutton.css">
<link rel="stylesheet" href="style/aborang.css">

<h3 class = "panjang"> IMPORT DATA </h3>
<form class = "panjang "action = "import.php" method = "post" enctype = "multipart/form-data" class = "import">
    <table>
        <tr>
            <td> Jadual </td>
            <td> 
                <select name = "namajadual">
                    <option> Pembeli </option>
                    <option> Penjual </option>
                
                </select>
            
            </td>
        </tr>
        
        <tr>
            <td> Nama Fail </td>
            <td> <input type = "file" name = "namafail" accept = ".txt"></td>
        </tr>
        
        
    
        
    </table>
    <button class = "tambah"type = "submit" name= "submit"> Import </button>
    
</form>