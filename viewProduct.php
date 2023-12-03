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
                                <label for="inputName" class="col-sm-2 col-form-label">Product ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id">
                                </div>
                            </div>

                            <input type="submit" value="Search" name="Search" class="btn btn-primary" id="addpr">

                        </form>
                    </div>
                </div>
                <form action="" method="post">
                    <table class="table table-hover table-bordered mx-2 my-5">
                        <tr class="thead">
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Material</th>
                            <th> Category</th>
                            <th>Sub_category</th>
                            <th>Brand</th>
                            <th>Stock</th>
                            <th>Picture</th>
                            <th>Action</th>
                            <th></th>
                        </tr>

                        <?php

                        $sql_show = "select * from products";

                        $res = mysqli_query($conn, $sql_show);


                        if (mysqli_num_rows($res) > 0) {
                            $i = 0;
                            while ($r = mysqli_fetch_array($res)) {
                                $picture = array();
                                $item=$r["Item_no"];
                                $rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
                                while ($r_pic = mysqli_fetch_array($rs_pic)) {
                                    array_push($picture, $r_pic['pic']);
                                }

                                // $p = StrtoAr($r["Pic"]);
                        ?>

                                <tr>
                                    <td><input type="checkbox" name="ids[]" id="" class="ids" value="<?php echo $r["Item_no"]  ?>"></td>
                                    <td><?php echo $r["Item_name"]  ?></td>
                                    <td><?php echo $r["Price"]  ?></td>
                                    <td><?php echo Arst(StrToAr($r["Size"]))  ?></td>
                                    <td><?php echo $r["Material"]  ?></td>
                                    <td><?php echo Arst(StrToAr($r["Category"]))  ?></td>
                                    <td><?php echo Arst(StrToAr($r["Sub_category"]))  ?></td>
                                    <td><?php echo $r["Brand"]  ?></td>
                                    <td><?php echo $r["Stock"]  ?></td>
                                    <td><div class="d-flex justify-content-center"><img src="contents/images/<?php echo $picture[0]; ?>" class="h-25 w-25" alt=""></div></td>
                                    <td><a href="?Delid=<?php echo $r["Item_no"] ?>">Delete</a></td>
                                    <td><a href="?Udpid=<?php echo $r["Item_no"] ?>">Update</a></td>
                                </tr>



                        <?php
                            }
                        } else {
                            echo "<h1>No Record Found</h1>";
                        }

                        ?>

                    </table>

                    <input type="submit" value="Bulk Delete" name="delall" class="btn btn-primary btn-sm mx-3 md-5">

                </form>

                <br><br>
                <?php
                if (isset($_POST["delall"])) {

                    $ids = $_POST["ids"];

                    foreach ($ids as $id) {
                        $sql = "Delete from products where Item_no='$id'";
                        $res = mysqli_query($conn, $sql);
                ?>

                        <script>
                            window.location.href = "viewProduct.php";
                        </script>

                        <?php
                    }
                }

               
?>

<?php
                        if (isset($_GET["Delid"])) {

                            $id = $_GET["Delid"];

                            $sql = "Delete from products where Item_no='$id'";
                            $res = mysqli_query($conn, $sql);

                            if ($res) {
                                    ?>

                                    <script>
                                        window.location.href = "viewProduct.php";
                                    </script>

                                <?php
                            } else {

                                ?>

                                    <script>
                                        window.alert("Can not delete");
                                        window.location.href = "multipledel.php";
                                    </script>

                                <?php

                            }
                        }

                        if (isset($_GET["Udpid"])) {
                            $id = $_GET["Udpid"];

                            $sql = "select * from products where Item_no='$id'";
                            // $res=mysqli_query($conn,$sql);

                            if ($res = mysqli_query($conn, $sql)) {
                                $r = mysqli_fetch_array($res);
                                ?>
                                    <div class="container">
                                        <div class="col-lg-12">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="Name" value="<?php echo $r["Item_name"]  ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="price" value="<?php echo $r["Price"]  ?>">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inputsize" class="col-sm-2 col-form-label">Size</label>
                                                    <div class="col-sm-10 col-lg-10">
                                                        <input type="text" class="form-control" name="Size" value="<?php echo Arst(StrToAr($r["Size"]))

                                                                                                                    ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputMaterial" class="col-sm-2 col-form-label">Material</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="Material" value="<?php echo $r["Material"]  ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                                                    <div class="col-sm-10">
                                                        <select name="cat[]" id="catg"multiple
                                                        >
                                                            <?php
                                                            $sql2 = "select * from Category";
                                                            $res2 = mysqli_query($conn, $sql2);

                                                            while ($r2 = mysqli_fetch_array($res2)) {
                                                            ?>

                                                                <option value=<?php echo $r2["Category_name"]  ?>> <?php echo $r2["Category_name"]  ?></option>

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


                                                            while ($r3 = mysqli_fetch_array($res3)) {
                                                            ?>

                                                                <option value=<?php echo $r3["Sub_Category_name"]  ?>> <?php echo $r3["Sub_Category_name"]  ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="Brand" value="<?php echo $r["Brand"];  ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputStock" class="col-sm-2 col-form-label">Stock</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="Stock" value="<?php echo $r["Stock"]  ?>">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inputShortdes" class="col-sm-2 col-form-label">Short Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" rows="3" name="srt"><?php
                                                                                                            echo $r["Short_Description"] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputlongdes" class="col-sm-2 col-form-label">Long Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" rows="3" name="lng"><?php
                                                                                                            echo $r["Long_Descripion"] ?></textarea>
                                                    </div>
                                                </div><br>


                                                <input type="submit" value="Update" name="udp" class="btn btn-primary btn-lg" id="addpr">

                                            </form>



                                    <?php
                                } else {
                                    echo "can not find record";
                                }
                            }


                                    ?>
                                    <?php
                                    if (isset($_POST["udp"])) {

                                        $na = $_POST["Name"];
                                        $brnd = $_POST["Brand"];
                                        $c = $_POST["cat"];
                                        $sc = $_POST["scat"];
                                        $mat = $_POST["Material"];
                                        $stk = $_POST["Stock"];
                                        $srt = $_POST["srt"];
                                        $lng = $_POST["lng"];

                                        $cat = ArToStr($c);
                                        $scat = ArToStr($sc);

                                        $sql = "update products set  
                                    Brand='$brnd',
                                    Category='$cat',
                                    Sub_category='$scat',
                                    Material='$mat',
                                    Stock=' $stk',
                                    Long_Descripion='$lng',
                                    Short_Description='$srt'
                                                        
                                    where Item_name='$na'";

                                        $res2 = mysqli_query($conn, $sql);

                                        if (!$res2) {
                                            echo "error";
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

                                <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>


                                <script>
                                    new MultiSelectTag('catg')
                                    new MultiSelectTag('scatg') // id
                                </script>
</body>
<?php
}

?>