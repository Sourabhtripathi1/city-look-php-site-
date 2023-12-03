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
        <link rel="stylesheet" href="contents/css/style.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">



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

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>


                    </nav>
                    <!-- End of Topbar -->
                    <!-- ================================================================================================ -->


                    <div class="container">
                        <div class="col-lg-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputsize" class="col-sm-2 col-form-label">Size</label>
                                    <div class="col-sm-10 col-lg-10">
                                        <select name="size[]" id="sizes" multiple>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                            <option value="XXXL">XXXL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputMaterial" class="col-sm-2 col-form-label">Material</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Material">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select name="cat[]" id="catg" multiple>
                                            <?php
                                            $sql2 = "SELECT * FROM category";
                                            $res2 = mysqli_query($conn, $sql2);

                                            while ($r = mysqli_fetch_array($res2)) {
                                            ?>
                                                <option value=<?php echo $r["Category_name"];  ?>> <?php echo $r["Category_name"];  ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputSubCategory" class="col-sm-2 col-form-label">Sub-Category</label>
                                    <div class="col-sm-10">
                                        <select name="scat[]" id="scatg" multiple>
                                            <?php
                                            $sql3 = "select Distinct(Sub_Category_name) from sub_category";
                                            $res3 = mysqli_query($conn, $sql3);


                                            while ($r2 = mysqli_fetch_array($res3)) {
                                            ?>

                                                <option value=<?php echo $r2["Sub_Category_name"]  ?>> <?php echo $r2["Sub_Category_name"]  ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Brand">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputStock" class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Stock">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPic" class="col-sm-2 col-form-label">Images</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="pic[]" multiple>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputShortdes" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" name="srt"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputlongdes" class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" name="lng"></textarea>
                                    </div>
                                </div><br>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" value="Add Product" name="ins" class="btn btn-primary btn-lg" id="addpr">
                                </div>
                            </form>

                        </div>
                    </div>


                    <?php

                    $sizestr = "";
                    $pstr = "";
                    if (isset($_POST["ins"])) {

                        $na = $_POST["Name"];
                        $pr = $_POST["price"];
                        $brnd = $_POST["Brand"];
                        $cat = $_POST["cat"];
                        $scat = $_POST["scat"];
                        $mat = $_POST["Material"];
                        $size = $_POST['size'];
                        $stk = $_POST["Stock"];
                        $srt = $_POST["srt"];
                        $lng = $_POST["lng"];
                        $pic = $_FILES["pic"];
                        $catstr = ArToStr($cat);
                        $scatstr = ArToStr($scat);
                        $sizestr = ArToStr($size);


                        $id = getPrID();

                        $sql = "insert into products values('$id','$na','$pr','$sizestr','$mat','$catstr','$scatstr','$brnd','$stk','$srt','$lng')";
                        $res = mysqli_query($conn, $sql);
                        if ($res) {
                            foreach ($_FILES['pic']['name'] as $key => $value) {

                                $r = mysqli_query($conn, "Insert into pictures(Product_id,pic) values('$id','$value')");

                                move_uploaded_file($_FILES['pic']['tmp_name'][$key], "contents/images/" . $value);
                            }
                        }
                    }


                    ?>
                    <!-- ================================================================================================= -->
                </div>
                <!-- Footer -->
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
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
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
    <script src="contents/js/multiselect-dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

    <script>
        new MultiSelectTag('sizes')
        new MultiSelectTag('catg')
        new MultiSelectTag('scatg') // id
    </script>

    </html>
<?php
}
?>