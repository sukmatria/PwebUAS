<?php
$kodemk = ["A11", "A12", "A14", "A15"];
$sks = [2,3,4,6];
$jns = ["T", "P", "T/P"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Mata Kuliah</title>
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
		<h3>TAMBAH DATA MATA KULIAH</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addMatkul.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="npp">Kode Mata Kuliah</label>
				<div class="form-group input-group row d-flex justify-content-around">
					<select name="hb-kdmk" id="hb-kdmk" class="custom-select col-3">
						<?php foreach($kodemk as $i) { ?>
							<option value="<?= $i; ?>"><?= $i; ?></option>
							<?php } ?>
						</select>
						<div class="col-8">
							<input class="form-control" type="text" name="kdmk" id="kdmk" maxlength="5" placeholder="Masukkan 5 digit kode mata kuliah . . .">
						</div>
					</div>
					<label class="text-danger" style="display:none; margin-bottom: 0" id="info">Diharapkan memasukkan 5 Karakter</label>
				</div>
				<div class="form-group">
					<label for="nama">Nama Mata Kuliah:</label>
					<input class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan nama mata kuliah . . .">
				</div>
				<div class="form-group">
					<label for="nama">SKS:</label>
					<div class="form-group">
						<select name="sks" id="sks" class="custom-select">
							<?php foreach($sks as $i) { ?>
								<option value="<?= $i; ?>"><?= $i; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="nama">Jenis:</label>
					<div class="form-group">
						<select name="jns" id="jns" class="custom-select">
							<?php foreach($jns as $i) { ?>
								<option value="<?= $i; ?>"><?= $i; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="nama">Semester:</label>
					<div class="form-group">
						<select name="smt" id="smt" class="custom-select">
						<?php for($i = 1; $i <= 8; $i++) { ?>
							<option value="<?= $i; ?>"><?= $i; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			<div>		
				<button type="submit" class="btn btn-primary" id="tombol" value="Simpan" disabled>Simpan</button>
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

	document.getElementById('kdmk').addEventListener('keyup', function(){
		if (document.getElementById('kdmk').value.length !== 5) {
			document.getElementById('info').style.display = "inline-block";
			document.getElementById('tombol').setAttribute('disabled', '');
		} else {
			document.getElementById('info').style.display = "none";
			document.getElementById('tombol').removeAttribute('disabled');
		}
	});
	</script>
</body>
</html>