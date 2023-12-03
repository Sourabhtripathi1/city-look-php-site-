<?php

include('config.php');

if (AdminisLogged()) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        <!-- Custom fonts for this template-->
        <link href="contents/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="contents/admin/css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Admin-panel</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="admin-index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>


                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>View Site</span></a>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Actions
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Products</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="addProducts.php">Add Products </a>
                            <a class="collapse-item" href="viewProduct.php">View Products</a>
                        </div>
                    </div>
                </li>




                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="viewCustomers.php">

                        <span>Customers</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="viewOrders.php.">
                        <span>View Orders</span></a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Categories & brands
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="viewCategories.php">

                        <span>Categories</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="viewSubCategories.php">

                        <span>Sub-Categories</span></a>
                </li>


                <hr class="sidebar-divider">
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="Admin-logout.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Logout</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>



            </ul>
		<!-- End of Sidebar -->

		<div class="row mx-3">
			<div class="col-lg-12 mx-3"> 

				<form action="" method="post">
					<table class="table table-hover table-bordered mx-2 my-5">
						<tr>
							<th></th>
							<th>Sub Category id </th>
							<th>Sub Category name</th>
							<th>Action</th>


						</tr>



						<?php
						$res2 = mysqli_query($conn, "SELECT * FROM sub_category");

						while ($r2 = mysqli_fetch_array($res2)) {
						?>
							<tr>
								<td><input type="checkbox" name="scat[]" id="" class="ids" value="<?php echo $r2['Sub_Category_id']  ?>"></td>
								<td><?php echo $r2['Sub_Category_id']  ?></td>
								<td><?php echo $r2['Sub_Category_name']  ?></td>
								<td><a href="?Delid2=<?php echo $r2["Sub_Category_id"] ?>">Delete</a></td>

							</tr>


						<?php
						}

						?>

					</table>
					<div class="d-flex justify-content-center">
						<input type="submit" value="Bulk Delete" name="delall" class="btn btn-primary btn-sm mx-3 md-5">
						<Input type="submit" value="Add New Sub Category" name="anscat" class="btn btn-primary btn-sm mx-3 md-5"> 
			
					</div>
				</form>
			</div>




			<?php
			if (isset($_GET['Delid'])) {
				$id = $_GET['Delid'];
				$res = mysqli_query($conn,"Delete from category where Category_id='$id'");
				if ($res) {
			?>
					<script>
						window.location.href = "viewCategories.php";
					</script>

			<?php
				}
			}

			?>
			<?php
			if (isset($_GET['Delid2'])) {
				$id = $_GET['Delid2'];
				$res = mysqli_query($conn, "Delete from sub_category where Sub_Category_id='$id'");
				if ($res) {
			?>
					<script>
						window.location.href = "viewSubCategories.php";
					</script>

			<?php
				}
			}


			if(isset($_POST['ancat'])){
?>
<form action="" method="post">
	<input type="text" name="cat" ><br>
	<input type="submit" value="add" name="addcat">
</form>
<?php
			}

			?> <!-- Content Row -->


<?php
if(isset($_POST['addcat'])){
$c=$_POST['cat'];
$res=mysqli_query($conn,"Insert into category(Category_name) values('$c') ");

if($res){
	?>
			<script>
				window.location.href = "viewCategories.php";
			</script>

	<?php
		}

}



?>
			<!-- /.container-fluid -->


			<!-- End of Main Content -->

			<!-- Footer -->

			<div>
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Your Website 2021</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="login.php">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="contents/admin/vendor/jquery/jquery.min.js"></script>
		<script src="contents/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="contents/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="contents/admin/js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="contents/admin/vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="contents/admin/js/demo/chart-area-demo.js"></script>
		<script src="contents/admin/js/demo/chart-pie-demo.js"></script>

</body>

</html><?php
}

?>