<?php
include 'koneksi.php';
include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($connect,"SELECT * FROM barang WHERE id_barang = '$id'");
    $data = mysqli_fetch_assoc($data);
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($connect,"UPDATE barang SET nama='$nama',harga='$harga',stok='$stok' WHERE id_barang='$id'");
    header("Location:barang.php");
}
session_start();
$_SESSION['success'] = "barang berhasil di Ubah";
?>

<!-- html -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Form Edit Barang</title>
</head>
<body>
<div class="container">
<h1 class="text-center">Form Edit Barang</h1>
<form method="POST" action="">
<!-- <input type="hidden" name="id" value="<?=$id?> -->
<div class="mb-3">
<label for="nama" class="form-label">Nama Barang</label>
<input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama']?>">
</div>
<div class="mb-3">
<label for="harga" class="form-label">Harga Barang</label>
<input type="text" class="form-control" id="harga" name="harga" value="<?=$data['harga']?>">
</div>
<div class="mb-3">
<label for="stok" class="form-label">Stok Barang</label>
<input type="number" min="1" class="form-control" id="stok" name="stok" value="<?=$data['stok']?>">
</div>
<button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>
</html>