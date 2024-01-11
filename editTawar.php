<?php
require "fungsi.php";
$npp = mysqli_query($GLOBALS["koneksi"], "SELECT npp FROM dosen");
$kodemk = mysqli_query($GLOBALS["koneksi"], "SELECT idmatkul FROM matkul");
$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "head.html";
	$id=deskripsiurl($_GET['kode']);
	$sql="select * from kultawar where idkultawar='$id'";
	$sql=search("kultawar", "idkultawar = '$id'");
	$data=mysqli_fetch_assoc($sql);
	?>
	<div class="utama">
	<br><br><br>		
		<h3>EDIT DATA MATA KULIAH</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_editTawar.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="id">ID Kuliah Tawar</label>
			<div class="form-group input-group">
				<input class="form-control" type="text" name="id" id="id" value="<?=$data["idkultawar"]?>" readonly>
			</div>
		</div>
		<div class="form-group">
				<label for="kodemk">Kode Mata Kuliah</label>
				<div class="form-group input-group">
					<select name="kodemk" id="kodemk" class="custom-select">
						<?php while($row = mysqli_fetch_assoc($kodemk)) { ?>
							<option value="<?= $row["idmatkul"]; ?>" <?=($row["idmatkul"] == $data["idmatkul"]) ? "selected" : ""?>><?= $row["idmatkul"]; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="npp">NPP</label>
				<div class="form-group input-group">
					<select name="npp" id="npp" class="custom-select">
					<?php while($row = mysqli_fetch_assoc($npp)) { ?>
							<option value="<?= $row["npp"]; ?>" <?=($row["npp"] == $data["npp"]) ? "selected" : ""?>><?= $row["npp"]; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
				<div class="form-group">
					<label for="kodekelompok">Kode Kelompok:</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">A12</div>
						</div>
						<input type="text" class="form-control" id="kodekelompok" name="kodekelompok" placeholder="Masukkan Kode Kelompok . . ." maxlength="4" value="<?=substr($data["klp"], 4)?>">
					</div>
				</div>
				<div class="form-group">
					<label for="hari">Hari:</label>
					<div class="form-group input-group">
					<select name="hari" id="hari" class="custom-select">
						<?php foreach($hari as $h) { ?>
							<option value="<?= $h; ?>" <?=($h == $data["hari"]) ? "selected" : ""?>><?= $h; ?></option>
						<?php } ?>
					</select>
				</div>
				</div>
				<div class="form-group">
					<label for="jamkul">Jam Kuliah:</label>
					<input class="form-control" type="text" name="jamkul" id="jamkul" placeholder="Masukkan Jam Kuliah Perkuliahan . . ." value="<?=$data["jamkul"]?>">
				</div>
				<div class="form-group">
					<label for="ruang">Ruang:</label>
					<input class="form-control" type="text" name="ruang" id="ruang" placeholder="Masukkan Ruang Perkuliahan . . ." value="<?=$data["ruang"]?>">
				</div>
				<button type="submit" class="btn btn-primary" id="tombol" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
	<script>
		$('#submit').on('click',function(){
			var id 		= $('#id').val();
			var nama	= $('#nama').val();
			var email 	= $('#email').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editMatkul.php",
				data	: {id:id, nama:nama, email:email}
			});
		});
	</script>
</body>
</html>