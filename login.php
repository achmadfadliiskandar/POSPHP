<?php
include 'koneksi.php';
session_start();

if (isset($_POST['masuk'])) 
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' and password='$password'");

    $data = mysqli_fetch_assoc($query);

    $check = mysqli_num_rows($query);
    if (!$check) {
        $_SESSION['error'] = 'Username & password salah';
    } 
    else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];
        header('location:index.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <style>
        body{
            background-image:url("https://www.ilmubahasa.net/wp-content/uploads/2018/10/backgroundkeren1-630x380.jpg");
            background-size:cover;
            background-repeat:no repeat;
        }
        form{
            width:50%;
            color: #fff;
        }
        @media only screen and (max-width: 600px) {
            form{
            width:100%;
            margin-bottom: 20px;
            margin-top:20px;
            color: #fff;
        }
        }
        }
    </style>
<div class="container" style="margin-top:150px;">
<h1 class="text-center text-white">Login</h1>
<form method="post" class="form-signin ms-auto me-auto">
<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
<div class="alert alert-danger" role="alert">
    <?=$_SESSION['error']?>
</div>
<?php }
$_SESSION['error'] = '';
?>
<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
<label>Username</label>
<input type="text" class="form-control" name="username" placeholder="Username">
<label for="password">Password</label>
<input type="password" class="form-control" name="password" placeholder="Password">
<button type="submit" name="masuk" class="btn btn-primary my-3">Login</button>
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