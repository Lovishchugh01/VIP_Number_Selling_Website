<?php
session_start();
if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
{
    header("Location: login.php");
}
require_once "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RVIP Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
<?php 
    // database connection
    require_once "../connection.php";
?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">RVIP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="categories.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Categories</span>
                </a>
                <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Categories:</h6>
                        <a class="collapse-item" href="buttons.php">List of categories</a>
                        <a class="collapse-item" href="cards.php">Add New categories</a>
                    </div>
                </div> -->
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>VIP Numbers</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Numbers:</h6> -->
                        <a class="collapse-item" href="list-of-number.php">List of Numbers</a>
                        <!-- <a class="collapse-item" href="add-new-number.php">Add New Number</a> -->
                        <a class="collapse-item" href="uploadCSV.php">Upload CSV</a>
                    </div>
                </div>
            </li>



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


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class=" d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ricky Madaan</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="changepassword.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php 

                    $cat_id_err = $cat_name_err = $number_err = $vip_section_err  = $prize_err = "";
                    $cat_id = $cat_name = $number = $vip_section  = $prize=  "";
                    
                    // $cat_id_err = $cat_name_err = $number_err = $vip_section_err  = $prize_err = "";
                    // $cat_id = $cat_name = $number = $vip_section  = $prize = "";

                    if( $_SERVER["REQUEST_METHOD"] == "POST"){
                        if(isset($_REQUEST["insert_btn"])){
                        
                        // if( empty($_REQUEST["$cat_id_err"]) ){
                        //     $cat_id_err = " <p style='color:red'> * Categor id Can Not Be Empty</p> ";
                        //    }else {
                        //     $cat_id = $_REQUEST["cat_id"];
                        // }

                        if( empty($_REQUEST["cat_name"]) ){
                        $cat_name_err = " <p style='color:red'> * Category Can Not Be Empty</p> ";
                        }else {
                        $cat_name = $_REQUEST["cat_name"];
                        }
                        if( empty($_REQUEST["prize"]) ){
                            $prize_err = " <p style='color:red'> * Price Can Not Be Empty</p> ";
                            }else {
                            $prize = $_REQUEST["prize"];
                        }

                        if( empty($_REQUEST["number"]) ){
                            $number_err = " <p style='color:red'> * Number Can Not Be Empty</p> ";
                            }else {
                            $number = $_REQUEST["number"];
                        }
                        if( empty($_REQUEST["vip_section"]) ){
                            $vip_section_err = " <p style='color:red'> * Number Can Not Be Empty</p> ";
                            }else {
                            $vip_section = $_REQUEST["vip_section"];
                        }

                        if( !empty($cat_name) && !empty($number) && !empty($vip_section) && !empty($prize)){

                        $sql_query = "INSERT INTO `number` (`id`, `cat_name`, `number`, `prize`, `vip_section`) VALUES (NULL,  '$cat_name' ,  '$number','$prize', '$vip_section');";
                        //   $result = mysqli_query($conn , $sql_query);

                        if (mysqli_query($conn, $sql_query)) {
                            $last_id = mysqli_insert_id($conn);
                            echo "New record created successfully. Last inserted ID is: " . $last_id;
                        } else {
                            echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
                        }

                        }
                    }
                    if(isset($_REQUEST["update_btn"])){
    
                        // if( empty($_REQUEST["$cat_id_err"]) ){
                        //     $cat_id_err = " <p style='color:red'> * Categor id Can Not Be Empty</p> ";
                        //    }else {
                        //     $cat_id = $_REQUEST["cat_id"];
                        // }
                    
                        if( empty($_REQUEST["cat_name"]) ){
                        $cat_name_err = " <p style='color:red'> * Category Can Not Be Empty</p> ";
                        }else {
                        $cat_name = $_REQUEST["cat_name"];
                        }
                        if( empty($_REQUEST["prize"]) ){
                            $prize_err = " <p style='color:red'> * Price Can Not Be Empty</p> ";
                            }else {
                            $prize = $_REQUEST["prize"];
                        }
                        if( empty($_REQUEST["number"]) ){
                            $number_err = " <p style='color:red'> * Number Can Not Be Empty</p> ";
                            }else {
                            $number = $_REQUEST["number"];
                        }
                            $id = $_REQUEST["updateid"];

                        if( empty($_REQUEST["vip_section"]) ){
                            $vip_section_err = " <p style='color:red'> * Number Can Not Be Empty</p> ";
                            }else {
                            $vip_section = $_REQUEST["vip_section"];
                        }
                    
                        if( !empty($cat_name) && !empty($number) && !empty($vip_section) && !empty($prize)){
                    
                        // $sql_query = "INSERT INTO `number` (`id`, `cat_name`, `number`, `vip_section`) VALUES (NULL,  '$cat_name', '$number', '$vip_section');";
                        //   $result = mysqli_query($conn , $sql_query);
                        $sql_query = "UPDATE `number` SET `cat_name`='$cat_name',`number`='$number', `prize`='$prize',`vip_section`='$vip_section' WHERE `id`='$id'";
                        
                        if (mysqli_query($conn, $sql_query)) {
                            $last_id = mysqli_insert_id($conn);
                            echo " record Updated successfully. Last inserted ID is: " . $last_id;
                        } else {
                            echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
                        }
                    
                        }
                    }

                    }

                    ?>
                    <!-- php script end -->
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Of Numbers</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->
                            <button type="button" class="btn btn-info d-block ml-auto" data-toggle="modal" data-target="#exampleModal">
                                + Add New Number
                             </button>
     
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Add New Number</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <div class="modal-body">
                                            <form method="POST" action="">
                                                <div class="form-group">
                                                    <label for="number">VIP Number(max 10 digit)</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="Number" name="number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="number">Price:</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="Price" name="prize" required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            id="inlineRadio1" value="Gold" name="vip_section">
                                                        <label class="form-check-label" for="inlineRadio1">Gold</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            id="inlineRadio2" value="Premium" name="vip_section">
                                                        <label class="form-check-label" for="inlineRadio2">Premium</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="cat_name" required>
                                                        <option selected>Choose...</option>
                                                        <?php 

                                                        $sql_query = "SELECT * FROM `category`";
                                                        $result = mysqli_query($conn , $sql_query);
                                                        while( $rows = mysqli_fetch_assoc($result) ){
                                                            echo '<option id = "'.$rows['name'].'" value = "'.$rows['name'].'">'.$rows['name'].'</option>';
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <button type="submit" name="insert_btn" value="submit" class="btn btn-info">Submit</button>
                                            </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Vip Number List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Catogory</th>
                                            <th>Number</th>
                                            <th>VipSection</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Catogory</th>
                                            <th>Number</th>
                                            <th>VipSection</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- php script start -->
                                    <?php 
                                    $sql_query = "SELECT * FROM number";
                                            $result = mysqli_query($conn , $sql_query);
                                            $srno = 1;

                                            while( $rows = mysqli_fetch_assoc($result) ){
                                                $id = $rows['id'];
                                                $cat_name = $rows['cat_name'];
                                                $number = $rows['number'];
                                                $vip_section = $rows['vip_section'];
                                                echo '<tr>
                                                <td>'.$srno++.'</td>
                                                <td>'.$rows['cat_name'].'</td>
                                                <td>'.$rows['number'].'</td>
                                                <td>'.$rows['vip_section'].'</td>
                                                <td>'.$rows['prize'].'</td>
                                                <td>
                                                    <a href="deletenumber.php?id='.$rows['id'].'"><i class="fas fa-trash fa-sm fa-fw mr-2 text-primary-400"></i></a>
                                                    <button type="button" class="btn text-primary" data-toggle="modal" data-target="#exampleModalEdit"   data-updateid="'.$rows['id'].'" data-number="'.$rows['number'].'" data-radio="'.$rows['vip_section'].'" data-category="'.$rows['cat_name'].'" data-prize="'.$rows['prize'].'"><i class="fas fa-edit fa-sm fa-fw text-primary-400"></i></button>

                                                </td>
                                            </tr>';
                                            }
                                    ?>
                                    <!-- php script end -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- <button type="button" class="btn text-primary" data-toggle="modal" data-target="#exampleModalEdit" data-whatever="@mdo"><i class="fas fa-edit fa-sm fa-fw text-primary-400"></i></button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit" data-whatever="@fat">Open modal for @fat</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->


                    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Number</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <form method="POST" action="">
                                        <div class="modal-body">
                                            
                                            <div class="form-group">
                                                <label for="recipient-number" class="col-form-label">VIP Number:</label>
                                                <input type="text" name="number" class="form-control" id="recipient-number">
                                                <!-- <label for="recipient-number" class="col-form-label">ID:</label> -->
                                                <input type="text" name="updateid" class="form-control d-none" id="recipient-id">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-prize" class="col-form-label">Price:</label>
                                                <input type="text" name="prize" class="form-control" id="recipient-prize">
                                            </div>
                                            <div class="form-group">
                                                <!-- <label for="recipient-name" class="col-form-label">VIP Number:</label> -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input recipient-radio-gold" type="radio" id="recipient-radio" value="Gold" name="vip_section">
                                                    <label class="form-check-label" for="inlineRadio1">Gold</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input recipient-radio-premium" type="radio" id="recipient-radio" value="Premium" name="vip_section">
                                                    <label class="form-check-label" for="inlineRadio1">Premium</label>
                                                </div>
                                                <!-- <input type="text" class="form-control" id="recipient-name"> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Category:</label>
                                                <select class="custom-select mr-sm-2" id="recipient-category" name="cat_name">
                                                        <?php 

                                                        $sql_query = "SELECT * FROM `category`";
                                                        $result = mysqli_query($conn , $sql_query);
                                                        while( $rows = mysqli_fetch_assoc($result) ){
                                                            echo '<option id = "cat'.$rows['name'].'" value = "'.$rows['name'].'">'.$rows['name'].'</option>';
                                                        }

                                                        ?>
                                                    <!-- <option id="1313" value="1313">1313</option>
                                                    <option id="786" value="786">786</option>
                                                    <option id="420" value="420">420</option>
                                                    <option id="Mirror" value="Mirror">Mirror</option>
                                                    <option id="Semimirror" value="Semimirror">Semimirror</option>
                                                    <option id="Symmetry" value="Symmetry">Symmetry</option>
                                                    <option id="xyxy" value="xyxy">xyxy</option>
                                                    <option id="xyxyxy" value="xyxyxy">xyxyxy</option>
                                                    <option id="xxyyzz" value="xxyyzz">xxyyzz</option>
                                                    <option id="Tetra" value="Tetra">Tetra</option>
                                                    <option id="Penta" value="Penta">Penta</option>
                                                    <option id="Hexa" value="Hexa">Hexa</option>
                                                    <option id="2213420" value="2213420">22 13 420</option> -->
                                                </select>
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="update_btn" value="update" class="btn btn-primary">Save Changes</button>
                                            </div>
                                    </form>
                                </div>
                        </div>

                    </div>

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
    
    <script>
        $('#exampleModalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        
        var number =  button.data('number') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        
        var prize = button.data('prize')


        var section = button.data('radio');
        if(section == "Gold"){
        $(".recipient-radio-gold").prop("checked", true)
        }else{
        $(".recipient-radio-premium").prop("checked", true)
        }


        var updateid = button.data('updateid')
        
        
        var name = button.data('category')
        var modal = $(this)
        
        $("#recipient-category option:selected").each(function () {
        $(this).removeAttr('selected'); 
        });


        $("#cat"+name).prop("selected", "selected")
        
        modal.find('#recipient-id').val(updateid)
        modal.find('#recipient-number').val(number)
        modal.find('#recipient-prize').val(prize)
        // modal.find('#recipient-category').val(name)
        })
    </script>

</body>

</html>