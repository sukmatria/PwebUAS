<?php
require "fungsi.php";
$npp = mysqli_query($GLOBALS["koneksi"], "SELECT npp FROM dosen");
$kodemk = mysqli_query($GLOBALS["koneksi"], "SELECT idmatkul FROM matkul");
$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Kuliah Tawar</title>
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
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH DATA KULIAH Tawar</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addTawar.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="kodemk">Kode Mata Kuliah</label>
				<div class="form-group input-group">
					<select name="kodemk" id="kodemk" class="custom-select">
						<?php while($row = mysqli_fetch_assoc($kodemk)) { ?>
							<option value="<?= $row["idmatkul"]; ?>"><?= $row["idmatkul"]; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="npp">NPP</label>
				<div class="form-group input-group">
					<select name="npp" id="npp" class="custom-select">
						<?php while($row = mysqli_fetch_assoc($npp)) { ?>
							<option value="<?= $row["npp"]; ?>"><?= $row["npp"]; ?></option>
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
						<input type="text" class="form-control" id="kodekelompok" name="kodekelompok" maxlength="4" placeholder="Masukkan Kode Kelompok . . .">
					</div>
				</div>
				<div class="form-group">
					<label for="hari">Hari:</label>
					<div class="form-group input-group">
					<select name="hari" id="hari" class="custom-select">
						<?php foreach($hari as $h) { ?>
							<option value="<?= $h; ?>"><?= $h; ?></option>
						<?php } ?>
					</select>
				</div>
				</div>
				<div class="form-group">
					<label for="jamkul">Jam Kuliah:</label>
					<input class="form-control" type="text" name="jamkul" id="jamkul" placeholder="Masukkan Jam Kuliah Perkuliahan . . .">
				</div>
				<div class="form-group">
					<label for="ruang">Ruang:</label>
					<input class="form-control" type="text" name="ruang" id="ruang" placeholder="Masukkan Ruang Perkuliahan . . .">
				</div>
				<button type="submit" class="btn btn-primary" id="tombol" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
	<script>
	// <!--
	// 	$(document).ready(function(){
	// 		$('#butsave').on('click',function(){			
	// 			$('#butsave').attr('disabled', 'disabled');
	// 			var nim 	= $('#nim').val();
	// 			var nama	= $('#nama').val();
	// 			var email 	= $('#email').val();
				
	// 			$.ajax({
	// 				type	: "POST",
	// 				url		: "sv_addMhs.php",
	// 				data	: {
	// 							nim:nim,
	// 							nama:nama,
	// 							email:email
	// 						  },
	// 				contentType	:"undefined",					
	// 				success : function(dataResult){						
	// 					alert('success');
	// 					$("#butsave").removeAttr("disabled");
	// 					$('#fupForm').find('input:text').val('');
	// 					$("#success").show();
	// 					$('#success').html(dataResult);	
	// 				}	   
	// 			});
	// 		});
	// 	});
	// -->	

	// document.getElementById('kdmk').addEventListener('keyup', function(){
	// 	if (document.getElementById('kdmk').value.length !== 5) {
	// 		document.getElementById('info').style.display = "inline-block";
	// 		document.getElementById('tombol').setAttribute('disabled', '');
	// 	} else {
	// 		document.getElementById('info').style.display = "none";
	// 		document.getElementById('tombol').removeAttribute('disabled');
	// 	}
	// });
	</script>
</body>
</html>