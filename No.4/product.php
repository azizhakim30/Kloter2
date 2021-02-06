<?php
session_start();
include 'dbconnect.php';

$idsepeda = $_GET['idsepeda'];

if(isset($_POST['addprod'])){
	if(!isset($_SESSION['log']))
		{	
			header('location:login.php');
		} else {
			$ui = $_SESSION['id'];
			$cek = mysqli_query($conn,"select * from cart where userid='$ui'");
			$liat = mysqli_num_rows($cek);
			$f = mysqli_fetch_array($cek);
			$orid = $f['orderid'];
				
		if($liat>0){				
			$cekbrg = mysqli_query($conn,"select * from detailorder where idsepeda='$idsepeda' and orderid='$orid'");
			$liatlg = mysqli_num_rows($cekbrg);
			$brpbanyak = mysqli_fetch_array($cekbrg);
			$jmlh = $brpbanyak['qty'];				
							
			if($liatlg>0){
				$i=1;
				$baru = $jmlh + $i;
				$updateaja = mysqli_query($conn,"update detailorder set qty='$baru' where orderid='$orid' and idsepeda='$idsepeda'");
								
				if($updateaja){
					echo " <div class='alert alert-success'>
					Barang sudah pernah dimasukkan ke keranjang, jumlah akan ditambahkan
					</div>
					<meta http-equiv='refresh' content='1; url= product.php?idsepeda=".$idsepeda."'/>";
				} else {
					echo "<div class='alert alert-warning'>
					Gagal menambahkan ke keranjang
					</div>
					<meta http-equiv='refresh' content='1; url= product.php?idsepeda=".$idsepeda."'/>";
				}
								
			} else {
							
				$tambahdata = mysqli_query($conn,"insert into detailorder (orderid,idsepeda,qty) values('$orid','$idsepeda','1')");
				if ($tambahdata){
					echo " <div class='alert alert-success'>
					Berhasil menambahkan ke keranjang
					</div>
					<meta http-equiv='refresh' content='1; url= product.php?idsepeda=".$idsepeda."'/>  ";
				} else { 
					echo "<div class='alert alert-warning'>
					Gagal menambahkan ke keranjang
					</div>
					<meta http-equiv='refresh' content='1; url= product.php?idsepeda=".$idsepeda."'/> ";
				}
			};
		} else {
					
			$oi = crypt(rand(22,999),time());
						
			$bikincart = mysqli_query($conn,"insert into cart (orderid, userid) values('$oi','$ui')");
						
			if($bikincart){
			$tambahuser = mysqli_query($conn,"insert into detailorder (orderid,idsepeda,qty) values('$oi','$idsepeda','1')");
				if ($tambahuser){
					echo " <div class='alert alert-success'>
					Berhasil menambahkan ke keranjang
					</div>
					<meta http-equiv='refresh' content='1; url= product.php?idsepeda=".$idsepeda."'/>  ";
				} else { 
					echo "<div class='alert alert-warning'>
					Gagal menambahkan ke keranjang
					 </div>
					<meta http-equiv='refresh' content='1; url= product.php?idsepeda=".$idsepeda."'/> ";
				}
			} else {
				echo "gagal bikin cart";
			}
		}
	}
};
?>

<!DOCTYPE html>
<html>
<head>
<title>TOKO SEPEDA</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
</head>
	
<body>
<body>
	<div class="agileits_header">
		<div class="container">
			<div class="agile-login">
				<ul>
				<?php
				if(!isset($_SESSION['log'])){
					echo '
					<li><a href="registered.php"> Daftar</a></li>
					<li><a href="login.php">Masuk</a></li>
					';
				} else {
					
					echo '
					<li style="color:white">Halo, '.$_SESSION["name"].'
					<li><a href="logout.php">Logout</a></li>
					';	
				};
					
				
				?>	
				</ul>
			</div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">Toko Sepeda</a></h1>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Home</a></li>	
						<li><a href="cart.php">Keranjang Saya</a></li>
						<li><a href="produk.php">Daftar Seluruh Sepeda</a></li>
						<li><a href="merk.php">Daftar Merk</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
		
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active"><?php 
				$p = mysqli_fetch_array(mysqli_query($conn,"Select * from cycle where idsepeda='$idsepeda'"));
				echo $p['nama_s'];
				?></li>
			</ol>
		</div>
	</div>

	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="<?php echo $p['image_s']?>" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php echo $p['nama_s'] ?></h2>
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">Stock : <?php echo ($p['stock_s']) ?> </h4>
							<h4 class="m-sing">Merk : <?php 
							$merk=mysqli_query($conn,"SELECT * from merk order by merkid ASC");
							$no=1;
							$m=mysqli_fetch_array($merk);
							echo ($m['name_m']) ?> </h4>
						</div>
					
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">Rp<?php echo number_format($p['harga_s']) ?> </h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="idprod" value="<?php echo $idsepeda ?>">
									<input type="submit" name="addprod" value="Add to cart" class="button">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>