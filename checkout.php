<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="home.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">2</span>
                            </a>
                            <a class="btn px-0 ml-3" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-user text-primary"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php
                                        if (isset($_SESSION['login']) && $_SESSION['login']) {
                                        ?> 
                                            <button class="dropdown-item" type="button"><a href="account-settings/index.php">Profile</a></button>

                                            <?php 
                                            if($_SESSION['data']['usn'] == 'admin') {?>
                                            <button class="dropdown-item" type="button"><a href="./dashboard/index.php">Dashboard</a></button>
                                            <?php } ?>

                                            <button class="dropdown-item" type="button"><a href="logout.php">Logout</a></button>
                                            <?php } else { ?>
                                            <button class="dropdown-item" type="button"><a href="login.php">Sign In</a></button>
                                            <button class="dropdown-item" type="button"><a href="regist.php">Sign Up</a></button>
                                            <?php } ?>
                                </div>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="proses_checkout.php" method="POST">

            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Alamat</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            
                            <div class="col-md-6 form-group">
                                <label>Penerima</label>
                                <input class="form-control" name="penerima" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nomor Hp</label>
                                <input class="form-control" name="nohp" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat"  type="text" placeholder="example@email.com">
                            </div>
                            
                           
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            <?php 
                            $query = mysqli_query($connect, "SELECT user_cart.* , product.image, product.price, product.name FROM user_cart INNER JOIN product ON user_cart.product_id = product.id WHERE user_id = '" . $_SESSION['data']['id_user'] . "'") or die(mysqli_error($connect));
                            $total = 0;
                            $totalbyproduct = 0;
                            while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                $total += $data['price'] * $data['qty'];
                                $totalbyproduct = $data['price'] * $data['qty'];
                                
                                ?>
                            <div class="d-flex justify-content-between">
                                <p><?= $data['name'] ?> <?= $data['qty'] ?>x</p>
                                <p><?= $totalbyproduct ?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>Rp.<?= number_format($total,0) ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                            <input type="hidden" name="total" value="<?= $total ?>">
                            <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>