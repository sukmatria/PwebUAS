<?php

require_once "fungsi.php";
$nim = $_GET["nim"];
$nama = $_GET["nama"];
// $nim = "A12.2016.02900";

$krs = "select jadwal.idMatkul, jadwal.namaMatkul, krs.sks, concat(jadwal.hari1, ' ', jadwal.mulai1, '-', jadwal.selesai1) as jadwal, dosen.namadosen from jadwal, krs, matkul, dosen where krs.id_jadwal = jadwal.idJadwal and jadwal.idMatkul = matkul.idmatkul and jadwal.npp = dosen.npp and krs.nim='$nim'";
$hasil = mysqli_query($GLOBALS["koneksi"], $krs);
$totKRS = mysqli_query($GLOBALS["koneksi"], "select sum(sks) as hasil from krs where nim = '$nim'");
$total = mysqli_fetch_object($totKRS);
$no = 1;

$isi = "<h2 style='text-align:center'>KRS Mahasiswa</h2>";

$isi .= "<p>NIM : $nim</p>";
$isi .= "<p>Nama : $nama</p>";

$isi .= "<table cellspacing=0 cellpadding=4 border=1>
    <tr>
        <th>No</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>SKS</th>
        <th>Jadwal</th>
        <th>Dosen Pengampu</th>
    </tr>";
        while ($rs = mysqli_fetch_object($hasil)) {
        
            $isi .= "
            <tr>
            <td>$no</td>
            <td>$rs->idMatkul</td>
            <td>$rs->namaMatkul</td>
            <td style='text-align:center'>$rs->sks</td>
            <td>$rs->jadwal</td>
            <td>$rs->namadosen</td>
            </tr>";
            $no++;
        }
    $isi .= "
    <tr>
        <td colspan='3'>Total SKS</td>
        <td style='text-align:center'>$total->hasil</td>
        <td colspan='2'></td>
    </tr>
</table>
";

generatepdf("A4", "Potrait", $isi, "krs_$nim");