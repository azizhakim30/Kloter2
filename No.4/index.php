<?php
session_start();
include 'dbconnect.php';

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
	
	<div class="top-brands">
		<div class="container">
		<h2>Produk Kami</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							
							<?php 
								$brgs=mysqli_query($conn,"SELECT * from cycle order by idsepeda ASC");
								$no=1;
								while($p=mysqli_fetch_array($brgs)){
							?>
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="product.php?idsepeda=<?php echo $p['idsepeda'] ?>"><img title=" " alt=" " src="<?php echo $p['image_s']?>" width="200px" height="200px" /></a>		
															
															<p><?php echo $p['nama_s'] ?></p>
															<h4>Stock : <?php echo ($p['stock_s']) ?> </h4>
															<h4>Rp<?php echo number_format($p['harga_s']) ?> </h4>
															
														</div>
														<div class="snipcart-details top_brand_home_details">
																<fieldset>
																	<a href="product.php?idsepeda=<?php echo $p['idsepeda'] ?>"><input type="submit" class="button" value="Lihat Produk" /></a>
																</fieldset>
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<?php
											}
								?>
								
								
								<div class="clearfix"> </div>
							</div>
						</div>
						
											
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>