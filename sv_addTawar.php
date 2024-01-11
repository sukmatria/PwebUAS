
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
// $hb_kdmk=$_POST["hb-kdmk"];
// $kdmk=$hb_kdmk . "." . $_POST["kdmk"];
// $nama=$_POST["nama"];
// $sks=$_POST["sks"];
// $jns=$_POST["jns"];
// $smt=$_POST["smt"];

$kodemk = $_POST["kodemk"];
$npp = $_POST["npp"];
$klp = $_POST["kodekelompok"];
$hari = $_POST["hari"];
$jamkul = $_POST["jamkul"];
$ruang = $_POST["ruang"];
$uploadOk=1;

        //jika npp tidak ditemukan,simpan data
        $sql = "INSERT INTO kultawar VALUES ('', '" . $kodemk . "', '" . $npp . "','A12." . $klp . "','" . $hari . "','" . $jamkul . "','" . $ruang . "')";
        mysqli_query($koneksi,$sql);
        header("location: updateTawar.php");
?>