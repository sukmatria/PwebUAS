<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp=deskripsiurl($_GET["kode"]);

$q = "SELECT * FROM dosen WHERE npp='".$npp."'";

$rs = mysqli_query($koneksi,$q);
if(mysqli_num_rows($rs)==1)
{
    //membuat query hapus data
    $sql="delete from dosen where npp='$npp'";
    mysqli_query($koneksi,$sql);
    header("location:updateDosen.php");
}
else
{
    echo "<script>
    alert('Hapus dosen gagal : npp ".$npp." tidak ditemukan')
    javascript:history.go(-1)
    </script>";
}

?>