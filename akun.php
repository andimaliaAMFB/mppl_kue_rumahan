<?php
	include 'config.php';
	$db = new database();

	session_start();
	if ((!isset($_SESSION['username'])) && (!isset($_SESSION['password'])) && (!isset($_SESSION['kode_akun']))  ) {
	    header("Location:login.php");
	}
	else
	{
		$username = $_SESSION['username'];
	    $kode_akun = $_SESSION['kode_akun'];
	    $password = $_SESSION['password'];
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
			<ul id="produk">
				<li>
					<a href="akun.php#setting" class="btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
						  	<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
						  	<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
						</svg>
					</a>
				</li>
				<li>
					<a href="akun.php#order" class="btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
						  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</svg>
					</a>
					
				</li>
				<li>
					<button class="btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
						  	<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
						  	<path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
						</svg>
					</button>
				</li>
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

	<div class="content produk">
		<div class="deskripsi utama bg-col1 p-3 card mb-3" style="background-color:#E2D1BF; border: none;">
		  <div class="row g-0">
		    <div class="col-md-3 white-border-r">
		      	<div class="white-border-r p-0">
		      		<div class="card-header d-flex align-items-center kotak-header white-border-b px-4" style="background-color:transparent; border-top: 0px;">
		      			<div class="me-3 my-auto">
		      				<svg xmlns="http://www.w3.org/2000/svg" width="72" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
		      				  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
		      				  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
		      				</svg>
		      			</div>
		      			<h3 class="header2">Akun Saya</h3>
		      		</div>
		      		<div id="list-example" class="list-group">
		      		  <a class="list-group-item list-group-item-action" href="#akun" onclick="akunOpen()">Akun Saya</a>
		      		  <a class="list-group-item list-group-item-action" href="#favorit" onclick="favoritOpen()">Favorit Saya</a>
		      		  <a class="list-group-item list-group-item-action" href="#order" onclick="orderOpen()">Pesanan Saya</a>
		      		  <a class="list-group-item list-group-item-action" href="#bayar" onclick="bayarOpen()">Konfirmasi Pembayaran</a>
		      		  <a class="list-group-item list-group-item-action" href="#setting" onclick="settingOpen()">Pengaturan Akun</a>
		      		  <a class="list-group-item list-group-item-action" href="#help" onclick="helpOpen()">Bantuan</a>
		      		</div>
		      	</div>
		    </div>
		    <div class="col-md-9" id="akun" style="display:none;">
			    <div>
			     	<div class="card-header bg-col2" style="background-color:#9B785C;">
			     		<h3 class="header2 text-start">Akun Saya</h3>
			     	</div>
			    </div>
		  	</div>

		    <div class="col-md-9" id="favorit" style="display:none;">
			    <div>
			     	<div class="card-header bg-col2" style="background-color:#9B785C;">
			     		<h3 class="header2 text-start">Favorit Saya</h3>
			     	</div>
			    </div>
		  	</div>

		    <div class="col-md-9" id="pesanan"=>
			    <div>
			     	<div class="card-header bg-col2" style="background-color:#9B785C;">
			     		<h3 class="header2 text-start">Pesanan Saya</h3>
			     	</div>
			     	<div class="card-body">
			     		<div class="deskripsi-produk white-border-b">
			     			<div class="m-3 d-flex justify-content-between align-items-center">
			     				<button class="btn d-flex align-items-center">
			     					<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-shop me-3" viewBox="0 0 16 16">
			     					  	<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
			     					</svg>
			     					<p style="font-size: 48px; margin: 0;"><?php echo $Nama_Toko?></p>
			     				</button>
			     				<p class="text-end card-text text-muted" style="font-size:24px;"><?php echo $kode_produk."-".$kode_order ?></p>
			     				
			     			</div>
			     			<div class="normal-card card mb-3 px-3 " style="border: 0; border-radius: 10px;">

			     			  	<div class="row g-0">
			     				    <div class="col-md-4">
			     				      	<img src="Asset/<?php echo $kode_produk ?>.jpg" class="img-fluid rounded-start imgProduk" alt="...">
			     				    </div>
			     				    <div class="col-md-8">
			     				      	<div class="card-body justify-content-between align-items-center ">
			     				      		<div class="d-flex justify-content-between align-items-center mb-3">
			     				      			<h3 class="card-title judulProduk"><?php echo $Nama_Produk?></h3>
			     				      		</div>
			     					        
			     					        <p class="card-text">
			     					        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFC700" class="bi bi-star-fill" viewBox="0 0 16 16">
			     					        	  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
			     					        	</svg>
			     					        	<?php echo $bykdibeli?> Terjual
			     				        	</p>
			     					        <p class="card-text">
			     					        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
			     					        	  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
			     					        	</svg>
			     					        	Pengiriman dari <?php echo $alamat ?>
			     				        	</p>
			     					        <p class="card-text">
			     					        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
			     					        	  <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			     					        	</svg>
			     				        		<b>Rp. <?php echo $harga?></b>
			     				        	</p>
			     				      	</div>
			     				    </div>
			     			  	</div>
			     			</div>
			     		</div>


			     		<div class="white-border-b">
			     			<div class="col-md-10 mx-auto">
			     				<table class="table table-borderless">
				     				<tr>
				     					<td>No Pesanan</td>
				     					<td class="text-end">No Pesanan</td>
				     				</tr>
				     				<tr>
				     					<td>Waktu Pemesanan</td>
				     					<td class="text-end">Waktu Pemesanan</td>
				     				</tr>
				     				<tr>
				     					<td>Waktu Pembayaran</td>
				     					<td class="text-end">Waktu Pembayaran</td>
				     				</tr>
				     			</table>
			     			</div>
			     			
			     		</div>

			     		<div class="p-3 px-5">
			     			<b></b>
			     			<p class="text-muted">Update terakhir </p>
			     			<div class="my-3 d-flex justify-content-center">
			     				<button class="btn bg-col2 me-3 rounded-pill">Lacak Pesanan</button>
			     				<button class="btn bg-col2 rounded-pill">Batalkan Pesanan</button>
			     			</div>
			     		</div>
			     	</div>
			    </div>
		  	</div>

		    <div class="col-md-9" id="bayar" style="display:none;">
			    <div>
			     	<div class="card-header bg-col2" style="background-color:#9B785C;">
			     		<h3 class="header2 text-start">Konfirmasi Pembayaran</h3>
			     	</div>
			    </div>
		  	</div>

		    <div class="col-md-9" id="setting" style="display:none;">
			    <div>
			     	<div class="card-header bg-col2" style="background-color:#9B785C;">
			     		<h3 class="header2 text-start">Pengaturan Akun</h3>
			     	</div>
			    </div>
		  	</div>

		    <div class="col-md-9" id="help" style="display:none;">
			    <div>
			     	<div class="card-header bg-col2" style="background-color:#9B785C;">
			     		<h3 class="header2 text-start">Bantuan</h3>
			     	</div>
			    </div>
		  </div>
		</div>
	</div>

	
</body>
</html>
<script>
	function akunOpen(){
		document.getElementById("akun").style.display = "block";
		document.getElementById("favorit").style.display = "none";
		document.getElementById("pesanan").style.display = "none";
		document.getElementById("bayar").style.display = "none";
		document.getElementById("setting").style.display = "none";
		document.getElementById("help").style.display = "none";
	}
	function orderOpen(){
		document.getElementById("akun").style.display = "none";
		document.getElementById("favorit").style.display = "none";
		document.getElementById("pesanan").style.display = "block";
		document.getElementById("bayar").style.display = "none";
		document.getElementById("setting").style.display = "none";
		document.getElementById("help").style.display = "none";
	}
</script>