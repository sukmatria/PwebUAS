<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=deskripsiurl($_GET["kode"]);

//membuat query hapus data
$sql="delete from kultawar where idkultawar='$id'";
mysqli_query($koneksi,$sql);
header("location:updateTawar.php");
?>