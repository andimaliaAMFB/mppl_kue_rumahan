<?php 
	include 'config.try.php';
	$db = new database();

	session_start();

	error_reporting(0);

	if ( (isset($_SESSION['username'])) && (isset($_SESSION['password'])) ) {
	    header("Location:try.php");
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
	<title></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<h1>Kue Rumahan</h1>
	<div>
		<form action="" method="POST">
			<table>
				<tr>
					<td>
						<input type="text" name="username" id="username" placeholder="Username">
					</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="password" id="password" placeholder="Password">
					</td>
				</tr>
				<tr>
					<td>
						<button class="btn btn-primary"type="submit" name="submit" id="submit">Submit</button>
						<input type="submit" name="submit" id="submit">
					</td>
				</tr>
				<tr>
					<td>Buat Akun Baru <a href="signup.try.php">Disini</a></td>
				</tr>
			</table>
		</form>
	</div>
	
</body>
</html>