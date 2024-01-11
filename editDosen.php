<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	
	$npp=deskripsiurl($_GET['kode']);
	$sql="select * from dosen where npp='$npp'";
	$qry=mysqli_query($koneksi,$sql);
	if(mysqli_num_rows($qry) == 0)
	{
		echo "<script>
		alert('npp tidak ditemukan');
		javascript:history.go(-1);
		</script>";
		exit();
	}
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA DOSEN</h2>	
		<div class="row">
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editDosen.php">
				<div class="form-group">
					<label for="npp">NPP:</label>
					<input class="form-control" type="text" name="npp" id="npp" value="<?php echo $row['npp']?>" readonly>
				</div>
				<div class="form-group">
					<label for="nama">Nama:</label>
					<input class="form-control" type="text" name="nama" id="nama" value="<?php echo $row['namadosen']?>">
				</div>
				<div class="form-group">
					<label for="homebase">HomeBase:</label>
					<select name="homebase" id="homebase" class="custom-select custom-select-lg">
						<option value="A11" <?php echo $row['homebase'] == "A11" ? "selected":""?>> Teknik Informatika</option>
						<option value="A12" <?php echo $row['homebase'] == "A12"?"selected":""?>> Sistem Informasi</option>
						<option value="A14" <?php echo $row['homebase'] == "A14"?"selected":""?>> Desain Komunikasi Visual</option>
						<option value="A15" <?php echo $row['homebase'] == "A15"?"selected":""?>> Ilmu Komunikasi</option>
						<option value="A22" <?php echo $row['homebase'] == "A22"?"selected":""?>> Teknik Informatika (D3)</option>
                    </select>
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
		</div>
	</div>
	<script>
		$('#submit').on('click',function(){
			var id 		= $('#id').val();
			var nama	= $('#nama').val();
			var email 	= $('#email').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editMhs.php",
				data	: {id:id, nama:nama, email:email}
			});
		});
	</script>
</body>
</html>