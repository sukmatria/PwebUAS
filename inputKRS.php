<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Daftar Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script>
		/*function cetak(hal) {
		  var xhttp;
		  var dtcetak;	
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  dtcetak= this.responseText;
			}
		  };
		  xhttp.open("GET", "ajaxUpdateMhs.php?hal="+hal, true);
		  xhttp.send();
		}*/
	</script>
</head>

<body>
	<?php

	//memanggil file berisi fungsi2 yang sering dipakai
	require "fungsi.php";
	require "head.html";

	$progdi = substr($_GET['kode'], 0, 3);
	$rs = search('matkul', "substr(idmatkul,1,3)='" . $progdi . "'");

	?>
	<div class="utama">
		<h3>Input KRS <?php echo $_GET['kode'] ?></h3>
		<form action="sv_krs.php" method="post">
			<input type="hidden" name="nim" value="<?php echo $_GET['kode']?>"/>
			<div class="form-group">
			<label for="matakuliah">Mata Kuliah</label>
			<select name="matakuliah" id="matkul" class="form-control">
				<option selected disabled>-Pilih Mata Kuliah -</option>
				<?php
				while ($data = mysqli_fetch_object($rs)) {
				?>
					<option value="<?php echo $data->id ?>"><?php echo $data->idmatkul, "-", $data->namamatkul ?></option>
				<?php
				}
				?>
			</select>
	</div>
	<div id="tabelmatkul"></div>
	<?php
	$kultawar = mysqli_query($GLOBALS["koneksi"], "select krs.idKrs, matkul.idmatkul, matkul.namamatkul, dosen.namadosen, concat(kultawar.hari, ' ', kultawar.jamkul) as jamkuliah, matkul.sks from kultawar, matkul, dosen, krs where kultawar.idmatkul = matkul.id and kultawar.npp = dosen.npp and kultawar.idkultawar = krs.id_jadwal and krs.nim='" . $_GET["kode"] . "'");
	if(mysqli_affected_rows($GLOBALS["koneksi"])){
	?>
	<h2 class="text-center my-3">Mata Kuliah Yang Dipilih</h2>
	<table class="table table-hover table-bordered">
	<tr>
            <th>No</th>
            <th>Kode Mata Kuliah</th>
            <th>Nama Mata Kuliah</th>
            <th>Dosen</th>
            <th>Jam Kuliah</th>
            <th>SKS</th>
            <th>aksi</th>
        </tr>
	<?php
		$i = 1;
			while($data = mysqli_fetch_object($kultawar)){
	?>
			<tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data->idmatkul ?></td>
                <td><?php echo $data->namamatkul ?></td>
                <td><?php echo $data->namadosen ?></td>
                <td><?php echo $data->jamkuliah ?></td>
                <td><?php echo $data->sks ?></td>
				<td>
				<a class="btn btn-outline-danger btn-sm" href="hps_krs.php?kode=<?php echo $data->idKrs ?>&nim=<?php echo $_GET['kode']?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
				</td>
            </tr>
			<?php
			$i++;
			}
			?>
	</table>
	<?php } ?>
	</form>

	</div>
	<script>
		$(document).ready(function() {
			$("#matkul").change(function() {
				var mk = $(this).val()
				console.info(mk);
				$.post('ajaxKrs.php', {
					mk: mk
				}, function(data) {
					$("#tabelmatkul").html(data)
				})
			})
		})
	</script>
</body>

</html>