<?php 
	session_start();
	include 'dbconnect.php';
			
	if(isset($_POST["addproduct"])) {
		$nama_s=$_POST['nama_s'];
		$merkid=$_POST['merkid'];
		$harga_s=$_POST['harga_s'];
		$stock_s=$_POST['stock_s'];
		$image_s=$_POST['image_s'];
		
			  $query = "insert into cycle (merkid, nama_s, image_s, stock_s, harga_s)
			  values('$merkid','$nama_s','$image_s','$stock_s','$harga_s')";
			  $sql = mysqli_query($conn, $query); 
			  
			  if($sql){ 
				
				echo "<br><meta http-equiv='refresh' content='5; URL=produk.php'> You will be redirected to the form in 5 seconds";
					
			  }else{
				echo "Sorry, there's a problem while submitting.";
				echo "<br><meta http-equiv='refresh' content='5; URL=produk.php'> You will be redirected to the form in 5 seconds";
			  }
			
	};
	if(isset($_POST["hapus"])){
		$kode = $_POST['idproduknya'];
		$q2 = mysqli_query($conn, "delete from cycle where idsepeda='$kode'");
		if($q2){
			echo "Berhasil Hapus";
		} else {
			echo "Gagal Hapus";
		}
	 }
	?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sepeda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
   
    <div id="preloader">
        <div class="loader"></div>
    </div>
        <div class="main-content">
           
            <div class="header-area">
            <a href="index.php" class = "btn btn-success"><span>Kembali ke Toko</span></a>
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content-inner">
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Sepeda</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Sepeda</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
												<th>Gambar</th>
												<th>Nama Sepeda</th>
												<th>Merk</th>
												<th>Harga</th>
												<th>Stock</th>
                                                <th>Aksi</th>
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT * from merk m, cycle p where m.merkid=p.merkid order by idsepeda ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><img id="example" src="<?php echo $p['image_s']?>" alt=" " class="img-responsive" width="8%"></td>
													<td><?php echo $p['nama_s'] ?></td>
													<td><?php echo $p['name_m'] ?></td>
													<td><?php echo $p['harga_s'] ?></td>
													<td><?php echo $p['stock_s'] ?></td>
                                                    <td>
														
													</td>

												</tr>		
												
												<?php 
											}
																				
											?>
										</tbody>
										</table>
                                    </div>
								 </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>

    </div>
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Produk</h4>
						</div>
						
						<div class="modal-body">
						<form action="produk.php" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Nama Sepeda</label>
									<input name="nama_s" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Merk</label>
									<select name="merkid" class="form-control">
									<option selected>Pilih Merk</option>
									<?php
									$det=mysqli_query($conn,"select * from merk order by name_m ASC")or die(mysqli_error($conn));
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['merkid'] ?>"><?php echo $d['name_m'] ?></option>
										<?php
								}
								?>		
									</select>
									
								</div>
								<div class="form-group">
									<label>Stock</label>
									<input name="stock_s" type="number" class="form-control"  min="1" max="5" required>
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input name="harga_s" type="number" class="form-control">
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<input name="image_s" type="file" class="form-control">
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addproduct" type="submit" class="btn btn-primary" value="Tambah">
							</div>
						</form>
					</div>
				</div>
			</div>
	
	<script>
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <script src="assets/js/line-chart.js"></script>
    <script src="assets/js/pie-chart.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
</body>
</html>
