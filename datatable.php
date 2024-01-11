<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Akademik::Tambah Data Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/DataTables/datatables.min.css">
    <script src="assets/DataTables/datatables.min.js"></script>
</head>

<body>
    <?php
    require "head.html";
    require "fungsi.php";

    $sql = "SELECT * from mhs";
    $hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    ?>
    <div class="utama">
        <table id="myTable" class="display table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row["nim"] ?></td>
                        <td><?php echo $row["nama"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><img src="<?php echo "foto/" . $row["foto"] ?>" height="50"></td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="editMhs.php?kode=<?php echo $row['id'] ?>">Edit</a>
                            <a class="btn btn-outline-danger btn-sm" href="hpsMhs.php?kode=<?php echo $row["id"] ?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
                            <a class="btn btn-outline-primary btn-sm" href="inputKRS.php?kode=<?php echo $row["nim"] ?>">Input KRS</a>
                            <a class="btn btn-outline-primary btn-sm" href="cetakPdf.php?type=krs&nim=<?php echo $row["nim"] ?>&nama=<?php echo $row["nama"] ?>">Cetak KRS</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>