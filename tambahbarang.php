<?php
include 'koneksi.php';
session_start();

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    // untuk menyimpan ke database
    mysqli_query($connect,"INSERT INTO barang VALUES ('','$nama','$harga','$stok')");

    $_SESSION['success'] = "barang berhasil di tambahkan";

    // menentukan arah url/link
    header("Location:barang.php");
}
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

    <title>Form Tambah Barang</title>
</head>
<body>
<div class="container">
<h1 class="text-center">Form Tambah Barang</h1>
<form method="POST" action="">
<div class="mb-3">
<label for="nama" class="form-label">Nama Barang</label>
<input type="text" class="form-control" id="nama" name="nama">
</div>
<div class="mb-3">
<label for="harga" class="form-label">Harga Barang</label>
<input type="text" class="form-control" id="harga" name="harga">
</div>
<div class="mb-3">
<label for="stok" class="form-label">Stok Barang</label>
<input type="number" min="1" class="form-control" id="stok" name="stok">
</div>
<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
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