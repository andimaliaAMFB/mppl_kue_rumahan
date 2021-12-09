<?php 
	include 'config.php';
	$db = new database();

	session_start();

	error_reporting(0);

	if ( (isset($_SESSION['username'])) && (isset($_SESSION['password'])) ) {
	    header("Location:index.php");
	}

	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = substr(md5($_POST['password']),0,20);
		$db->cekAkun($username,$password,"login");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kue Rumahan</title>
	<link rel="stylesheet" type="text/css" href="Style/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="content daftar justify-content-between px-5" style="--bs-gutter-x: 0;">
		<div class="row">
			<div class="deskripsi col-sm-5 my-auto">
				<a href="index.php" style="text-decoration: none;"><h3 class="header">Kue Rumahan</h3></a>
				
				<p class="subtitle">Gabung dan nikmati kemudahan Jual Beli Kue di Kue Rumahan</p>
			</div>
			
			<div class="kotak col-sm-5">
				<div class="kotak-header mb-3 justify-content-between px-3 py-3 pb-0 align-items-end">
					<div class="col-sm-4 nav nav-tabs align-items-end">
						<h3 class="pb-0 mb-0 pe-2">Daftar</h3>
						<p class="pb-0 mb-0">Belum Memiliki akun? <a href="signup.php">Daftar</a></p>
					</div>
					
				</div>
				<form class="form-content row justify-content-center" action="" method="POST">
					
					<div class="form-input mb-3">
						<label class="form-label" for="username">Username*</label>
						<input class="form form-control" type="text" name="username" id="username" placeholder="Masukan Username" required>
					</div>
					<div class="form-input mb-3">
						<label class="form-label" for="password">Password*</label>
						<input class="form form-control" type="password" name="password" id="password" placeholder="Minimal 6 Karakter" required>
					</div>
					<div class="form-input form-check mb-3">
					  	<input class="form-check-input mx-0 me-2" type="checkbox" value="" id="flexCheckDefault" required>
					  	<label class="form-check-label" for="flexCheckDefault" style="font-size: 9px;">
					    	Dengan ini saya setuju dengan Syarat & Ketentuan Penggunaan dan Kebijakan Privasi.
					  	</label>
					</div>
					<div class="submit text-center mb-5">
						<button class="tombolsubmit btn w-100 mb-3 bg-col2 black-text" type="submit" name="submit" id="submit"><b>Log In</b></button>
						<p>Atau</p>
						<button class="btn btn-outline-dark w-100 mb-3 justify-content-between" type="submit" name="submit" id="submit">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
							  	<path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
							</svg>
							Google
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>