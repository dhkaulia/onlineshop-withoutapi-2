<?php
include '../koneksi.php';
?>
<?php
if ($_SESSION['data']['usn'] != 'admin') { ?>

<?php echo '
                <script>
                    alert("Forbidden Access");
                    window.location.href="../index.php";
                </script>
                ';
} ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="registered-user.php">
                    <span>Registered User</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="order_status.php">
                    <span>Status Pemesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <span>Home</span></a>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                    <div class="card-body" id="mytable">
                        <div class="table-responsive">
                            <form action="laporan-excel.php">
                                <select name="bulan" id="">
                                    <option value="01" <?= (date('m') == '01') ? 'selected' :''?>>Januari</option>
                                    <option value="02" <?= (date('m') == '02') ? 'selected' :''?>>Februari</option>
                                    <option value="03" <?= (date('m') == '03') ? 'selected' :''?>>Maret</option>
                                    <option value="04" <?= (date('m') == '04') ? 'selected' :''?>>April</option>
                                    <option value="05" <?= (date('m') == '05') ? 'selected' :''?>>Mei</option>
                                    <option value="06" <?= (date('m') == '06') ? 'selected' :''?>>Juni</option>
                                    <option value="07" <?= (date('m') == '07') ? 'selected' :''?>>Juli</option>
                                    <option value="08" <?= (date('m') == '08') ? 'selected' :''?>>Agustus</option>
                                    <option value="09" <?= (date('m') == '09') ? 'selected' :''?>>September</option>
                                    <option value="10" <?= (date('m') == '10') ? 'selected' :''?>>Oktober</option>
                                    <option value="11" <?= (date('m') == '11') ? 'selected' :''?>>November</option>
                                    <option value="12" <?= (date('m') == '12') ? 'selected' :''?>>Desember</option>
                                </select>
                                <button  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                            </form>

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Penerima</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Total Pembelian</th>
                                        <th>Status Pengiriman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($connect, "SELECT transaction.*, user.usn FROM transaction INNER JOIN user ON transaction.user_id = user.id_user") or die(mysqli_error($connect));

                                    while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td><?= $data['usn'] ?></td>
                                            <td><?= $data['penerima'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['waktu'] ?></td>
                                            <td><?= number_format($data['total'], 0) ?></td>

                                            <?php if ($data['status'] == 'menunggu') { ?>
                                                <td>
                                                    <form action="../update_transaction.php" method="POST">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <button title="Sudah Dikirim"><i class="fas fa-check" style="color: #5bec78;"></i></button>
                                                    </form>
                                                </td>
                                            <?php } else { ?>
                                                <td> Sudah Dikirim</td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="col-md-12 text-center">
                                <ul class="pagination pagination-lg pager" id="mytable"></ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End of Main Content -->



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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/table_script.js"></script>

</body>

</html>