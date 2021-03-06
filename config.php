<?php
	class Database
	{
		var $host = "localhost";
		var $username = "root";
		var $password = "";
		var $database = "kue_rumahan";
		var $koneksi = "";

		function __construct()
		{
			$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
			if (mysqli_connect_errno()){
				echo "Koneksi database gagal : " . mysqli_connect_error();
				echo "<script>alert('Koneksi database gagal : ')</script>" . mysqli_connect_error();
			}
		}

		// akun
			function cekAkun($username,$password,$typecek){
				$sql = "SELECT * FROM member WHERE username='$username' AND password='$password'";
				$result = mysqli_query($this->koneksi, $sql);
				
				//echo "<script>alert('CEK ".$username." dan ".$password."')</script>";
				echo mysqli_error($this->koneksi);
				//echo "<script>alert('CEK ".$typecek." AKUN MEMBER')</script>";
				
				if ($result->num_rows > 0) {
					$row = mysqli_fetch_assoc($result);
					switch ($typecek) {
						case "username":
							echo "<script>alert('Username Akun ini adalah".$row['username']." dari akun [`MEMBER`]')</script>";
							return $row['username'];
							break;
						case "password":
							return $row['password'];
							break;
						case "login":
							$_SESSION['username'] = $row['username'];
							$_SESSION['password'] = $row['password'];
							$_SESSION['kode_akun'] = $row['kode_member'];
							header("Location:index.php");
							break;
					}
				}
				else
				{
					echo "<script>alert('Woops! Username ini tidak ada di data [`MEMBER`].')</script>";
					//echo "<script>alert('CEK ".$typecek." AKUN ADMIN')</script>";
					

					$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
					$result = mysqli_query($this->koneksi, $sql);
					
					if ($result->num_rows > 0) {
						$row = mysqli_fetch_assoc($result);
						switch ($typecek) {
							case "username":
								echo "<script>alert('Username Akun ini adalah".$row['username']." dari akun [`ADMIN`]')</script>";
								return $row['username'];
								break;
							case "password":
								return $row['password'];
								break;
							case "login":
								$_SESSION['username'] = $row['username'];
								$_SESSION['password'] = $row['password'];
								$_SESSION['kode_akun'] = $row['kode_admin'];
								header("Location:index.php");
								break;
						}
					}
					else
						echo "<script>alert('Woops! Username ini tidak ada di data [`ADMIN`].')</script>";
				}
			}

			function getAkun($username,$password,$typecek){
				$sql = "SELECT * FROM member WHERE username='$username' AND password='$password'";
				$result = mysqli_query($this->koneksi, $sql);
				if ($result->num_rows > 0) {
					$row = mysqli_fetch_assoc($result);
					switch ($typecek) {
						case "kode_akun":
							return $row['kode_member'];
							break;
						case "nama":
							return $row['nama'];
							break;
						case "alamat":
							return $row['alamat'];
							break;
						case "ttl":
							return $row['ttl'];
							break;
						case "jeniskelamin":
							return $row['jeniskelamin'];
							break;
						case "username":
							return $row['username'];
							break;
						case "nama":
							return $row['password'];
							break;
					}
				}
				else
				{
					echo "<script>alert('Woops! Username ini tidak ada di data [`MEMBER`].')</script>";
					//echo "<script>alert('CEK ".$typecek." AKUN ADMIN')</script>";
					

					$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
					$result = mysqli_query($this->koneksi, $sql);
					
					if ($result->num_rows > 0) {
						$row = mysqli_fetch_assoc($result);
						switch ($typecek) {
							case "kode_akun":
								return $row['Kode_akun'];
								break;
							case "nama":
								return $row['nama'];
								break;
							case "alamat":
								return $row['alamat'];
								break;
							case "ttl":
								return $row['ttl'];
								break;
							case "jeniskelamin":
								return $row['jeniskelamin'];
								break;
							case "nama_toko":
								return $row['nama_toko'];
								break;
							case "username":
								return $row['username'];
								break;
							case "nama":
								return $row['password'];
								break;
						}
					}
					else
						echo "<script>alert('Woops! Username ini tidak ada di data [`ADMIN`].')</script>";
				}
			}

			function registrasiMember($nama,$alamat,$tl,$jeniskelamin,$username,$password){

				$sqlcek = "SELECT kode_member, 
								LENGTH(kode_member), 
								SUBSTRING(kode_member,3,10) as tanggalBuat, 
								CAST(SUBSTRING(kode_member,14,6) AS INT) as noUrut
							FROM member 
								WHERE SUBSTRING(kode_member,3,10) = CURRENT_DATE
								ORDER by tanggalbuat ASC, noUrut ASC, LENGTH(kode_member) DESC";

				$resultcek = mysqli_query($this->koneksi, $sqlcek);
				echo mysqli_error($this->koneksi);

				
				$kode_nourut = 0;
				while ($row = mysqli_fetch_array($resultcek)){
						$hasil[] = $row;
						$kode_nourut = (int)$row['noUrut'];//get biggest number from today
				}
				//echo $kode_nourut."<br>"; //cek nilai $kode_nourut
				$kode_nourut++;
				//echo $kode_nourut; //cek nilai $kode_nourut after +1
				
				
				$sql = "INSERT INTO member(kode_member, nama, alamat, ttl, jeniskelamin, username, password) 
						VALUES ('M-".date("Y-m-d")."-".$kode_nourut."','$nama','$alamat','$tl','$jeniskelamin','$username','$password');";
				$result = mysqli_query($this->koneksi, $sql);
				if ($result) {
					echo "<script>alert('Wow! User Registration for [`MEMBER`] Completed.')</script>";
				}
				else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
				
			}

			function registrasiAdmin($nama,$alamat,$tl,$jeniskelamin,$nama_toko,$username,$password){

				$sqlcek = "SELECT kode_admin, 
								LENGTH(kode_admin), 
								SUBSTRING(kode_admin,3,10) as tanggalBuat, 
								CAST(SUBSTRING(kode_admin,14,6) AS INT) as noUrut
							FROM admin 
								WHERE SUBSTRING(kode_admin,3,10) = CURRENT_DATE
								ORDER by tanggalbuat ASC, noUrut ASC, LENGTH(kode_admin) DESC";

				$resultcek = mysqli_query($this->koneksi, $sqlcek);
				echo mysqli_error($this->koneksi);

				
				$kode_nourut = 0;
				while ($row = mysqli_fetch_array($resultcek)){
						$hasil[] = $row;
						$kode_nourut = (int)$row['noUrut'];//get biggest number from today
				}
				//echo $kode_nourut."<br>"; //cek nilai $kode_nourut
				$kode_nourut++;
				//echo $kode_nourut; //cek nilai $kode_nourut after +1
				
				
				$sql = "INSERT INTO admin(kode_admin, nama, alamat, ttl, jeniskelamin, nama_toko, username, password) 
						VALUES ('A-".date("Y-m-d")."-".$kode_nourut."','$nama','$alamat','$tl','$jeniskelamin','$nama_toko','$username','$password');";
				$result = mysqli_query($this->koneksi, $sql);
				if ($result) {
					echo "<script>alert('Wow! User Registration for [`ADMIN`] Completed.')</script>";
				}
				else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
				
			}

		// produk
			// get
				function getProduk($typecek){
					switch ($typecek) {
						case 'all':
							$sql = "SELECT kategori.nama as Nama_Kategori,
											admin.kode_admin as Kode_akun,
											admin.alamat,
											produk.kode_produk as Kode_Produk, 
											produk.nama as Nama_Produk,
											produk.kode_kategori, 
											produk.stok,
											produk.hargasatuan,
				    						produk.kadaluarsa,
											admin.nama_toko 
									FROM ((kategori INNER JOIN produk) INNER JOIN admin)
									WHERE (produk.kode_kategori = kategori.kode_kategori)
									GROUP BY produk.kode_produk";
							$result = mysqli_query($this->koneksi, $sql);
							while ($row = mysqli_fetch_array($result)){
								$hasil[] = $row;
							}
							return $hasil;
							break;

						case 'popular':
							$sql = "SELECT produk.kode_produk, 
											kategori.nama as Nama_Kategori,
											produk.kode_kategori, 
											produk.nama,
											produk.hargasatuan,
									    	admin.nama_toko,
									    	admin.alamat,
									    	COUNT(orderkuedetail.kode_produk) AS populer,
									    	SUM(orderkuedetail.jumlahBeli) AS banyakDiBeli
									FROM ((orderkuedetail INNER JOIN produk) INNER JOIN admin) INNER JOIN kategori
									WHERE ((orderkuedetail.kode_produk = produk.kode_produk) AND (orderkuedetail.kode_admin = admin.kode_admin)  AND (produk.kode_kategori = kategori.kode_kategori))
									GROUP BY orderkuedetail.kode_produk
									ORDER BY banyakDiBeli DESC, populer DESC LIMIT 5";
							$result = mysqli_query($this->koneksi, $sql);
							while ($row = mysqli_fetch_array($result)){
								$hasil[] = $row;
							}
							return $hasil;
							break;
						
						default:
							// code...
							break;
					}
				}

				function getProdukSpesifik($kode_produk,$ordered,$typecek){
					if($ordered){
						$sql = "SELECT orderkuedetail.kode_order,
										kategori.nama as Nama_Kategori,
										admin.kode_admin as Kode_akun,
										admin.alamat,
										produk.kode_produk as Kode_Produk, 
										produk.nama as Nama_Produk,
										produk.kode_kategori, 
										produk.deskripsi, 
										produk.stok,
										produk.hargasatuan,
										produk.berat, 
										produk.kondisi, 
			    						produk.kadaluarsa,
										admin.nama_toko,
						    			COUNT(orderkuedetail.kode_produk) AS populer,
						    			SUM(orderkuedetail.jumlahBeli) AS banyakDiBeli
								FROM ((orderkuedetail INNER JOIN produk) INNER JOIN admin) INNER JOIN kategori
								WHERE (produk.kode_kategori = kategori.kode_kategori) AND (orderkuedetail.kode_admin = admin.kode_admin) AND (orderkuedetail.kode_produk = produk.kode_produk) AND (produk.kode_produk = '$kode_produk')
								GROUP BY produk.kode_produk";
					}
					else{
						$sql = "SELECT kategori.nama as Nama_Kategori,
										admin.kode_admin as Kode_akun,
										admin.alamat,
										produk.kode_produk as Kode_Produk, 
										produk.nama as Nama_Produk,
										produk.kode_kategori, 
										produk.deskripsi, 
										produk.stok,
										produk.hargasatuan,
										produk.berat, 
										produk.kondisi, 
			    						produk.kadaluarsa,
										admin.nama_toko
								FROM ((kategori INNER JOIN produk) INNER JOIN admin)
								WHERE (produk.kode_kategori = kategori.kode_kategori) AND (produk.kode_produk = '$kode_produk')
								GROUP BY produk.kode_produk";
					}
					$result = mysqli_query($this->koneksi, $sql);
					while ($row = mysqli_fetch_array($result)){
						switch ($typecek) {
							case "all":
								$hasil[] = $row;
								break;

							case "kode_order":
								return $row['kode_order'];
								break;
							case "kode_akun":
								return $row['Kode_akun'];
								break;
							case "kode":
								return $row['Kode_Produk'];
								break;
							case "kode_kategori":
								return $row['kode_kategori'];
								break;
							case "deskripsi":
								return $row['deskripsi'];
								break;
							case "nama":
								return $row['Nama_Produk'];
								break;
							case "stok":
								return $row['stok'];
								break;
							case "harga":
								return $row['hargasatuan'];
								break;
							case "berat":
								return $row['berat'];
								break;
							case "kondisi":
								return $row['kondisi'];
								break;
							case "kadaluarsa":
								return $row['kadaluarsa'];
								break;
							case "toko":
								return $row['nama_toko'];
								break;
							case "kategori":
								return $row['nama'];
								break;
							
							default:
								echo "<script>alert('Woops! Something Wrong Went.')</script>";
								break;
						}
						if ($typecek == "all") {
							return $hasil;
						}
					}
				}
				function getProdukLastId($kode_akun){
					$produkAkun = substr($kode_akun, 0, 1).substr($kode_akun, 4, 2).substr($kode_akun, 7, 2).substr($kode_akun, 10, 4);
					// echo "<script>alert('".$produkAkun."')</script>";
					// echo "<script>alert('SELECT `kode_produk`, CAST(right(kode_produk,((CHAR_LENGTH(kode_produk))-(InStr(kode_produk,`_`))))AS INT) as NoUrut,`kode_kategori`, `nama`, `stok`, `hargasatuan`, `kadaluarsa` FROM `produk`WHERE INSTR (kode_produk, `".$produkAkun."`) > 0 ORDER BY kode_produk DESC LIMIT 1')</script>";

					$sql = "SELECT `kode_produk`, 
									CAST(right(kode_produk,((CHAR_LENGTH(kode_produk))-(InStr(kode_produk,'_'))))AS INT) as NoUrut,
									`kode_kategori`, 
									`nama`, 
									`stok`, 
									`hargasatuan`, 
									`kadaluarsa` FROM `produk` 
							WHERE INSTR (kode_produk, '$produkAkun') > 0
							ORDER BY kode_produk DESC
	                        LIMIT 1";
					$result = mysqli_query($this->koneksi, $sql);
					if ($result->num_rows > 0) {
						$row = mysqli_fetch_assoc($result);
						echo "<script>alert('lastId of Product is ".$row['NoUrut']."')</script>";
						return $row['NoUrut'];
					}
					else{
						echo "<script>alert('Cant get lastId of Product Admin Have or LastId is 0')</script>";
					}
				}

			// update
				function updateProduk($kode_produk,$kode_kategori,$nama,$stok,$hargasatuan,$kadaluarsa){
					 $sql = "UPDATE `produk` 
					 		SET `kode_kategori`='$kode_kategori',
					 			`nama`='$nama',
					 			`stok`=$stok,
					 			`hargasatuan`=$hargasatuan,
					 			`kadaluarsa`='$kadaluarsa' 
					 		WHERE kode_produk = '$kode_produk'";
					$result = mysqli_query($this->koneksi, $sql);
					if ($result) {
						echo "<script>alert('Wow! Update Produk Completed.')</script>";
					}
					else {
						echo "<script>alert('Woops! Something Wrong Went.')</script>";
					}
				}

			// insert
				function insertProduk($kode_produk,$kategori,$nama,$deskripsi,$hargasatuan,$berat,$kondisi,$stok,$simpan){
					$sql = "INSERT INTO `produk`(`kode_produk`, 
													`kode_kategori`, 
													`nama`, 
													`deskripsi`, 
													`hargasatuan`, 
													`berat`, 
													`kondisi`, 
													`stok`, 
													`kadaluarsa`) 
							VALUES ('$kode_produk','$kategori','$nama','$deskripsi','$hargasatuan','$berat','$kondisi','$stok','$simpan')";
					$result = mysqli_query($this->koneksi, $sql);
					if ($result) {
						echo "<script>alert('Wow! Insert New Produk Completed.')</script>";
					}
					else {
						echo "<script>alert('Woops! Something Wrong Went.')</script>";
					}
				}

		// order
			function insertOrderKue($jam_transaksi,$jam_pembayaran,$kode_akun,$status,$komentar,$lokasi){
				$sql = "INSERT INTO orderkue(waktu_pemesanan, waktu_pembayaran, kode_member, status, komentar, alamat) 
						VALUES ('$jam_transaksi','$jam_pembayaran','$kode_akun','$status','$komentar','$lokasi')";
				$result = mysqli_query($this->koneksi, $sql);
				if ($result) {
					echo "<script>alert('Wow! User ['OrderKue'] Completed.')</script>";
				}
				else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
				
			}

			function getOrderKue($typecek){
				switch($typecek){
					case "lastId":
						$sql = "SELECT kode_order, LENGTH(kode_order), waktu_pemesanan FROM `orderkue` ORDER BY kode_order DESC, waktu_pemesanan DESC LIMIT 1";
						$result = mysqli_query($this->koneksi, $sql);
						if ($result->num_rows > 0) {
							$row = mysqli_fetch_assoc($result);
							echo "<script>alert('lastId of Order is ".$row['kode_order']."')</script>";
							return $row['kode_order'];
						}
						break;
				}
			}
			function insertOrderKueDetail($kode_order,$kode_produk,$kode_penjual,$jumlah_beli,$hargasatuan){
				$sql = "INSERT INTO `orderkuedetail`(`kode_order`, `kode_produk`, `kode_admin`, `jumlahBeli`, `hargasatuan`) 
						VALUES ('$kode_order','$kode_produk','$kode_penjual','$jumlah_beli','$hargasatuan')";
				$result = mysqli_query($this->koneksi, $sql);
				if ($result) {
					echo "<script>alert('Wow! User ['OrderKueDetail'] Completed.')</script>";
				}
				else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
			}
			function getOrderMember($kode_akun){
				$sql = "SELECT orderkue.kode_order,
							member.kode_member,
							member.nama as username, 
							produk.kode_produk,
							produk.nama as nama_produk,
							orderkuedetail.jumlahBeli,
							produk.hargasatuan,
							admin.nama_toko,
							orderkue.waktu_pemesanan,
							orderkue.waktu_pembayaran,
							orderkue.status 
						FROM ((((orderkuedetail INNER JOIN orderkue) INNER JOIN member) INNER JOIN admin) INNER JOIN produk) 
						WHERE (orderkuedetail.kode_order = orderkue.kode_order) AND (orderkuedetail.kode_admin = admin.kode_admin) AND (orderkue.kode_member = member.kode_member) AND (orderkuedetail.kode_produk = produk.kode_produk) AND (member.kode_member = '$kode_akun') 
						ORDER BY orderkue.kode_order";
				$result = mysqli_query($this->koneksi, $sql);
				while ($row = mysqli_fetch_array($result)){
					$hasil[] = $row;
				}
				return $hasil;
			}
			function getOrderAdmin($kode_akun){
				$sql = "SELECT orderkue.kode_order, 
								admin.kode_admin, 
								produk.kode_produk,
								produk.nama as nama_produk, 
								produk.hargasatuan, 
								orderkuedetail.jumlahBeli, 
								orderkue.waktu_pemesanan, 
								orderkue.waktu_pembayaran
						FROM (((orderkuedetail INNER JOIN orderkue) INNER JOIN produk) INNER JOIN admin)
						WHERE (orderkuedetail.kode_order = orderkue.kode_order) AND (orderkuedetail.kode_admin = admin.kode_admin) AND (orderkuedetail.kode_produk = produk.kode_produk) AND (orderkuedetail.kode_admin = '$kode_akun')
						GROUP BY orderkue.kode_order";
				$result = mysqli_query($this->koneksi, $sql);
				while ($row = mysqli_fetch_array($result)){
					$hasil[] = $row;
				}
				return $hasil;
			}

		// kategori
			function getKategori(){
				$sql = "SELECT `kode_kategori`, `nama` FROM `kategori` WHERE 1";
				$result = mysqli_query($this->koneksi, $sql);
				while ($row = mysqli_fetch_array($result)){
					$hasil[] = $row;
				}
				return $hasil;
			}
	}
?>