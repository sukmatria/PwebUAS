<?php
//membuat koneksi ke database mysql
// $koneksi=mysqli_connect('192.168.10.253','a122106652','polke001','a122106652');
// $GLOBALS['koneksi']=mysqli_connect('192.168.10.253','a122106568','polke001','a122106568');
// $GLOBALS['koneksi']=mysqli_connect('localhost','root','','pwlgenap2019-akademik');
$GLOBALS['koneksi'] = mysqli_connect('192.168.10.253', 'a122106652', 'polke001', 'a122106652');

// mengakses file yang dibutuhkan
require __DIR__ . '/vendor/autoload.php';
// require_once 'dompdf/autoload.inc.php';
// mengakses class Dompdf
use Dompdf\Dompdf;




function enkripsiurl($id)
{
    $enc = base64_encode(rand() * strtotime(date("H:i:s")) . "-" . $id);
    return $enc;
}

function deskripsiurl($string)
{
    $kode = base64_decode($string);
    $id = explode("-", $kode);
    return count($id) > 1 ? $id[1] : 0;
}

function search($tipe, $key = null)
{
    $sql = "SELECT * FROM " . $tipe;
    if (!is_null($key)) {
        $sql .= " WHERE " . $key;
    }
    $hasil = mysqli_query($GLOBALS['koneksi'], $sql) or die(mysqli_error($GLOBALS['koneksi']));
    return $hasil;
}

function result($data)
{
    return mysqli_query($GLOBALS['koneksi'], $data) or die(mysqli_error($GLOBALS['koneksi']));
}

// function generatepdf($size = "A4", $orientation = "Potrait", $file, $fileoutput){
//     // instantiate and use the dompdf class
//     $dompdf = new Dompdf();
//     $isi = $file;
//     echo $isi;
//     // die();
//     $dompdf->loadHtml("COBA");

//     // (Optional) Setup the paper size and orientation
//     $dompdf->setPaper('A4', 'Potrait');

//     // $option = $dompdf->getOptions();
//     // $option->setIsPhpEnabled("true");


//     // Render the HTML as PDF
//     $dompdf->render();

//     // ob_end_clean();
//     // flush();
//     // Output the generated PDF to Browser
//     $dompdf->stream("hai".".pdf");

//     // $output = $dompdf->output();
//     // file_put_contents('output.pdf', $output);
// }
function generatepdf($size = "A4", $orientation = "Portrait", $html = null, $filename = "doc")
{

    $pdf = new Dompdf();
    $pdf->loadHtml($html);
    $pdf->setPaper($size, $orientation); //ukuran dan erientation
    $pdf->render();
    $pdf->stream($filename . ".pdf", array("Attacment" => FALSE));
}
