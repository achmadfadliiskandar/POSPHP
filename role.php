<?php
include 'koneksi.php';
session_start();
$view = $connect->query("SELECT * FROM role");
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

    <title>Role</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
    <a class="navbar-brand" href="#">Starbhak Mart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="barang.php">Barang</a>
        <a class="nav-link" href="role.php">role</a>
        <a class="nav-link" href="user.php">User</a>
    </div>
    </div>
</div>
</nav>

<div class="container">
<?php
if (isset($_SESSION['success'])&& $_SESSION['success']!="") {?>
    <div class="alert alert-success" role="alert">
    <?=$_SESSION['success']?>
    </div>
<?php
}
$_SESSION['success']='';
?>
    <h1 class="text-center">Role</h1>
    <a href="roletambah.php" class="btn btn-primary my-3">Tambah Barang  </a>
    <table class="table table-bordered">
<thead>
    <tr>
    <th scope="col">Nama</th>
    <th scope="col">Aksi</th>
    </tr>
</thead>
<tbody>
<?php
while ($row = $view->fetch_array()) {?>
    <tr>
    <td><?= $row['nama']?></td>
    <td>
    <a class="btn btn-success" href="roleedit.php?id=<?= $row['nama'] ?>">Edit</a> 
    <a class="btn btn-danger" href="rolehapus.php?id=<?= $row['nama'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
	</td>
    </tr>
<?php } ?>
</tbody>
</table>
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