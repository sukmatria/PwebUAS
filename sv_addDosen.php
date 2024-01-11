
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp="0686.11." . $_POST["tahun_gabung"] . "." . $_POST["npp"];
$nama=$_POST["nama"];
$homebase=$_POST["homebase"];

$q = "SELECT * FROM dosen WHERE npp='".$npp."'";

$rs = mysqli_query($koneksi,$q);
if(mysqli_num_rows($rs) == 0)
{
        //jika npp tidak ditemukan,simpan data
        $sql = "INSERT INTO dosen VALUES ('".$npp."','".$nama."','".$homebase."')";
        mysqli_query($koneksi,$sql);
        header("location: updateDosen.php");
}
else
{
        //jika npp sudah ada, tampilkan peringatan
        echo '<script>
                     alert("NPP yang diinput sudah ada")
                      javascript:history.go(-1)
              </script>';
}

//Set lokasi dan nama file foto
// $folderupload ="foto/";
// $fileupload = $folderupload . basename($_FILES['foto']['name']); // foto/A12.2018.05555.jpg
// $filefoto = basename($_FILES['foto']['name']);                  // A12.2018.0555.jpg

//ambil jenis file
// $jenisfilefoto = strtolower(pathinfo($fileupload,PATHINFO_EXTENSION)); //jpg,png,gif

// Check jika file foto sudah ada
// if (file_exists($fileupload)) {
//     echo "Maaf, file foto sudah ada<br>";
//     $uploadOk = 0;
// }

// Check ukuran file
// if ($_FILES["foto"]["size"] > 1000000) {
//     echo "Maaf, ukuran file foto harus kurang dari 1 MB<br>";
//     $uploadOk = 0;
// }

// Hanya file tertentu yang dapat digunakan
// if($jenisfilefoto != "jpg" && $jenisfilefoto != "png" && $jenisfilefoto != "jpeg"
// && $jenisfilefoto != "gif" ) {
//     echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan<br>";
//     $uploadOk = 0;
// }

// Check jika terjadi kesalahan
// if ($uploadOk == 0) {
//     echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
// } else {
//     if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fileupload)) {        
        //membuat query
		//echo "File ". basename( $_FILES["foto"]["name"]). " berhasil diupload";
    // } else {
    //     echo "Data gagal tersimpan";
    // }
// }
?>