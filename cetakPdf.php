<?php
require "fungsi.php";
$type = $_GET["type"];
if ($type == "krs") {
    $param = $_GET["nim"];
    $nama = $_GET["nama"];
    header("Location: http://localhost/weblanjut/krsMhs.php?nim=$param&nama=$nama");
} elseif ($type == "krm") {
    $param = $_GET["param"];
    header("Location: http://localhost/weblanjut/krm.php?npp=$param");
} else {
     echo "Salah";
}