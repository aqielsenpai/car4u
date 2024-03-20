<?php
     include("keselamatan.php");
     include("../sambungan.php");
     include("penjual_menu.php");


?>
<html>

<head>

    <title>Senarai Penjual</title>
    <link rel="stylesheet" href="../style/asenarai.css">
</head>

<table class="penjual">
    <caption> SENARAI NAMA PENJUAL</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Tarikh Daftar</th>
        <th colspan="2"> Tindakan </th>
    </tr>

    <?php
    
    $sql = "select * from penjual " ;
    $result = mysqli_query($sambungan , $sql);
    while($penjual = mysqli_fetch_array($result)){
        $idpenjual = $penjual["idpenjual"];
        $datereg = date_format(date_create($penjual['tarikhdaftar']),"d/m/Y H:i a");
        echo " <tr> <td> $penjual[idpenjual]</td> 
         <td class = 'nama' > $penjual[namapenjual]</td>
         <td> $penjual[email] </td> 
         <td> $datereg </td> 
         <td> 
         <a href = 'penjual_update.php?idpenjual=$penjual[idpenjual]'>
         <img src = '../imej/update1.png'> </a> 
         </td>
         <td> 
         <a href = 'penjual_delete.php?idpenjual=$idpenjual' onclick=\"return confirm('Adakah anda ingin padam?')\">
         <img src = '../imej/delete1.png'> </a> 
         </td>
         </tr>";
         
    }
    ?>
</table>

<script>
function padam(id)
if (confirm("Adakah anda ingin padam") == true) {
    window.location = "penjual_delete.php?idpenjual =" + id;
}
</script>

</html>