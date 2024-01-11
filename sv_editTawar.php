<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id = $_POST["id"];
$kodemk = $_POST["kodemk"];
$npp = $_POST["npp"];
$klp = $_POST["kodekelompok"];
$hari = $_POST["hari"];
$jamkul = $_POST["jamkul"];
$ruang = $_POST["ruang"];
$uploadOk=1;

//membuat query
$sql="update kultawar set idmatkul='$kodemk',
					 npp='$npp',
					 klp='A12.$klp',
					 hari='$hari',
					 jamkul='$jamkul',
					 ruang='$ruang'
					 where idkultawar='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateTawar.php");
?>