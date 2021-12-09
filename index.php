<?php
	include 'config.php';
	$db = new database();

	session_start();

	if ((!isset($_SESSION['username'])) && (!isset($_SESSION['password'])) && (!isset($_SESSION['kode_akun']))  ) {
	    $username = "";
	    $password = "";
	    $kode_akun = "";
	}
	else
	{
		$username = $_SESSION['username'];
	    $kode_akun = $_SESSION['kode_akun'];
	    $i = substr($kode_akun, 0,1);
	    if($i == "A"){
	    	$type_akun = "ADMIN";
	    }
	    elseif($i == "M"){
	    	$type_akun = "MEMBER";
	    }
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
	<nav class="navbar p-0">
		<div class="navigation container-fluid justify-content-between py-3 px-5">
			<div>
				<form class="d-flex kotaksearch">
					<button class="btn" type="submit">
						<img src="Asset/search icon.png">
					</button>
			      	<input class="form-control" type="search" placeholder="Cari Kue" aria-label="Search" style="border:0">
			    </form>
				
			</div>
			<div class="header navbar-brand mb-0 h1"><a href="index.php">Kue Rumahan</a></div>
			<ul>
				<li>
					<?php
					if ($username == "") {
						?>
						<a href="login.php" class="btn">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
							  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
							</svg>
						</a>
						<?php
					}
					else{
						if ($type_akun == "ADMIN") {
							?>
							<a href="akun.php?akun_menu=sell" class="btn">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
								  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
								</svg>
							</a>
							<?php
						}
						elseif ($type_akun == "MEMBER") 
						{
							?>
							<a href="akun.php?akun_menu=order" class="btn">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
								  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
								</svg>
							</a>
							<?php
						}
					}
					?>
					
				</li>

				<!-- LOG Button -->
					<?php
					if ($username == "") {
						?>
						
						<li class="py-1">
							<!-- <button class="loginbtn btn bg-col4">Daftar</button> -->
							<a href="signup.php" class="loginbtn btn bg-col4">Daftar</a>
						</li>
						<li class="py-1">
							<!-- <button class="loginbtn btn bg-col4">Log In</button> -->
							<a href="login.php" class="loginbtn btn bg-col4">Login</a>
						</li>
						<?php
					}
					else
					{
						?><a href="logout.php" class="loginbtn btn bg-col3">Logout</a><?php
					}
					?>
			</ul>
		</div>
		
		<div class="helper col-sm-12 m-0 py-1 px-5">
			<ul>
				<li>
					<a href="">
						<svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 13 16" fill="none">
							<path d="M6.1875 1.48419C5.48981 1.48424 4.79896 1.65347 4.1544 1.98223C3.50983 2.31098 2.92418 2.79282 2.43087 3.40022C1.93755 4.00763 1.54625 4.72872 1.27929 5.52231C1.01234 6.3159 0.874959 7.16645 0.875 8.02541C0.875041 8.88436 1.0125 9.73489 1.27953 10.5284C1.54657 11.322 1.93794 12.043 2.43131 12.6504C2.92468 13.2577 3.51038 13.7395 4.15498 14.0681C4.79957 14.3968 5.49044 14.5659 6.18813 14.5659C7.59717 14.5658 8.94847 13.8765 9.94476 12.6498C10.941 11.4231 11.5007 9.75937 11.5006 8.02464C11.5005 6.2899 10.9407 4.62625 9.94432 3.39968C8.94791 2.17311 7.59655 1.48408 6.1875 1.48419ZM6.1875 0.714722C7.76222 0.714722 9.27245 1.48487 10.3859 2.85575C11.4994 4.22662 12.125 6.08593 12.125 8.02464C12.125 9.96335 11.4994 11.8227 10.3859 13.1935C9.27245 14.5644 7.76222 15.3346 6.1875 15.3346C4.61278 15.3346 3.10255 14.5644 1.98905 13.1935C0.875556 11.8227 0.25 9.96335 0.25 8.02464C0.25 6.08593 0.875556 4.22662 1.98905 2.85575C3.10255 1.48487 4.61278 0.714722 6.1875 0.714722ZM5.875 11.4872H6.5V13.0262H5.875V11.4872ZM6.1875 3.02312C6.76766 3.02312 7.32406 3.30686 7.7343 3.81191C8.14453 4.31697 8.375 5.00198 8.375 5.71624C8.375 6.40645 7.93813 6.88506 7.47563 7.3906L6.89125 8.08542C6.52375 8.60404 6.48375 9.58973 6.49938 9.92598V9.9483H5.875C5.8725 9.90829 5.81125 8.43707 6.42125 7.57912L7.06 6.81581C7.43 6.41107 7.75 6.06096 7.75 5.71624C7.75 5.20606 7.58538 4.71676 7.29236 4.35601C6.99933 3.99525 6.6019 3.79258 6.1875 3.79258C5.7731 3.79258 5.37567 3.99525 5.08265 4.35601C4.78962 4.71676 4.625 5.20606 4.625 5.71624H4C4 5.00198 4.23047 4.31697 4.6407 3.81191C5.05094 3.30686 5.60734 3.02312 6.1875 3.02312Z" fill="#FAF8FD"/>
						</svg> Bantuan
					</a>
				<li>
					<a href="">Mulai Berjualan</a></li>
				<li>
					<a href="">Kategori</a></li>
			</ul>
		</div>
	</nav>

	
	<div class="content">
		<div class="gambarutama utama">
			<div class="card-group">
				<?php
				$i = 0;
				foreach ($db->getProduk("all")  as $produkFull) {
					if ($i>=3) {
						break;
					}
					?>
					<div class="card" style="cursor:pointer;" onclick="location.href='produk.php?kode_produk=<?php echo $produkFull['Kode_Produk'] ?>'">
					  	<img src="Asset/<?php echo $produkFull['Kode_Produk'] ?>.jpg" class="card-img-top" alt="<?php echo $produkFull['Nama_Produk'] ?>" style="height: 450px;">
					</div>
					<?php
					$i++;
				}
				?>
			</div>
		</div>
		<div class="populer pb-3">
			<div class="card-panel card-title"><b>Kue Populer</b></div>
			<hr>
			<!-- card populer -->
			
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3 px-2">
					<?php
					foreach ($db->getProduk("popular") as $produk) {
						?>
					<div class="card col px-0" style="cursor:pointer" onclick="location.href='produk.php?kode_produk=<?php echo $produk['kode_produk'] ?>'">
					  	<img src="Asset/<?php echo $produk['kode_produk']; ?>.jpg" class="card-img-top  cardImg" alt="...">
					  	<div class="card-body p-2 mb-3 align-items-center">
						    <p class="card-text text-center"><?php echo $produk['nama']; ?></p>
					  	</div>
					</div>
						<?php
					}
					?>
				</div>
				


			<!-- card populer -->
		</div>
		<div class="rekomendasi last">
			<div class="card-panel card-title"><b>Rekomendasi</b></div>
			<hr>
			<!-- card rekomendasi -->
			<div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 g-3 px-2">

				<?php
				$i = 0;
				foreach ($db->getProduk("all")  as $produkFull) {
					if ($i>=5) {
						break;
					}
					?>
					<div class="card mb-3 col px-0" style="cursor:pointer" onclick="location.href='produk.php?kode_produk=<?php echo $produkFull['Kode_Produk'] ?>'">
					  	<img src="Asset/<?php echo $produkFull['Kode_Produk']; ?>.jpg" class="card-img-top" alt="<?php echo $produkFull['Nama_Produk'] ?>">
					  	<div class="card-body p-2">
						    <h5 class="mini-card card-title text-center"><b><?php echo $produkFull['Nama_Produk'] ?></b></h5>
						    <hr>
					        <p class="card-text"><b>Rp. <?php echo $produkFull['hargasatuan'] ?></b></p>
					        <p class="card-text">
					        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
					        	  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
					        	</svg><?php echo $produkFull['alamat'] ?>
					        </p>
						    <p class="card-text">
					        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFC700" class="bi bi-star-fill" viewBox="0 0 16 16">
					        	  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
					        	</svg><?php echo $produkFull['Nama_Produk'] ?>
					        </p>
					  	</div>
					</div>
					<?php
					$i++;
				}
				?>
				
			</div>

			<!-- card rekomendasi -->
		</div>
	</div>

	
</body>
</html>