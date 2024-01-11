<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_GET["kode"];
$nim=$_GET["nim"];

//membuat query hapus data
$sql="delete from krs where idKrs='$id'";
mysqli_query($koneksi,$sql);
header("location:inputKrs.php?kode=" . $nim);
?>