<?php
  include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>login | Data Penduduk</title>
	<link rel="icon" href="dist/img/izin.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- Custom CSS -->
	<style>
		body {
			background-image: url('dist/img/balaraja2.jpeg');
			background-size: cover;
			background-position: center;
			height: 100vh;
			margin: 0;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.login-box {
			background: rgba(0, 0, 0, 0.5);
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
			color: #fff;
		}
		.input-group-text {
			background: rgba(255, 255, 255, 0.1);
			color: #fff;
			border: none;
		}
		.form-control {
			background: rgba(255, 255, 255, 0.1);
			color: #fff;
			border: none;
		}
		.btn {
			background: rgba(255, 0, 0, 0.8);
			border: none;
		}
	</style>
</head>

<body class="hold-transition login-page" style="background-image: url('dist/img/balaraja2.jpeg');background-size: cover;background-position: center;" >
	<div class="login-box">
		<center>
			<img src="dist/img/izin.png" width="170px" />
			<br>
			<br>
			<h5>
				<b>Sistem Data Kependudukan</b>
			</h5>
			<br>
		</center>

		<form action="" method="post">
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="username" placeholder="Username" required>
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
			</div>
			<div class="input-group mb-3">
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-danger btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
						<b>Login System</b>
					</button>
				</div>
			</div>
		</form>
	</div>

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- Alert -->
	<script src="plugins/alert.js"></script>

</body>

</html>

<?php
if (isset($_POST['btnLogin'])) {  
	//anti inject sql
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);

	if ($jumlah_login == 1) {
		session_start();
		$_SESSION["ses_id"] = $data_login["id_pengguna"];
		$_SESSION["ses_nama"] = $data_login["nama_pengguna"];
		$_SESSION["ses_username"] = $data_login["username"];
		$_SESSION["ses_password"] = $data_login["password"];
		$_SESSION["ses_level"] = $data_login["level"];
	
		echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'index.php';}
			})</script>";
	} else {
		echo "<script>
			Swal.fire({title: 'Login Gagal, Anda Siapa?',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login.php';}
			})</script>";
	}
}
