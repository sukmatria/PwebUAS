<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Dosen</title>
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
		<h3>TAMBAH DATA DOSEN</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addDosen.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="npp">NPP:0686.11.</label>
				<div class="form-group">
					<label for="tahun-gabung">Tahun Bergabung:</label>
					<select name="tahun_gabung" id="tahun-gabung">
						<?php for($i = 1960; $i <= 2050; $i++) { ?>
							<option value="<?= $i; ?>"><?= $i; ?></option>
						<?php } ?>
					</select>
				</div>
				<input class="form-control" type="text" name="npp" id="npp" required>
				<label class="text-danger" style="display:none;" id="info">Masukkan 3 Karakter</label>
			</div>
			<div class="form-group">
				<label for="nama">Nama:</label>
				<input class="form-control" type="text" name="nama" id="nama">
			</div>
			<div class="form-group">
				<label for="homebase">HomeBase:</label>
				<select name="homebase" id="homebase" class="custom-select custom-select-lg">
						<option value="A11">A11 - Teknik Informatika</option>
						<option value="A12">A12 - Sistem Informasi</option>
						<option value="A14">A14 - Desain Komunikasi Visual</option>
						<option value="A15">A15 - Ilmu Komunikasi</option>
						<option value="A22">A22 - Teknik Informatika (D3)</option>
				</select>
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

	document.getElementById('npp').addEventListener('keyup', function(){
		if (document.getElementById('npp').value.length !== 3) {
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