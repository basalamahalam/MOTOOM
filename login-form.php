<?php

session_start();

include("db.php");

if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    //$password_md5=md5($password);

    if($email != '' && $password != ''){
        
        $db=new Admin();
        $validasi=$db->login($email,$password);
        if($validasi==0){
            $db2=new User();
            $db2->userLogin($email,$password);
        }
    }else{
        setcookie("message","username atau password kosong",time()+10);
        header("location: index2.php");
    }

    // if (mysqli_num_rows($result) > 0) {

    //     $row = mysqli_fetch_assoc($result);

    //     if (!empty($_POST['remember_checkbox'])) {
    //         $remember_checkbox = $_POST['remember_checkbox'];
    //         //cookie
    //         setcookie('email', $email, time() + 86400); // 1 hari
    //         setcookie('password', $pass, time() + 86400);
    //         setcookie('userlogin', $remember_checkbox, time() + 86400);
    //     } else {
    //         //expire cookie
    //         setcookie('email', $email, 86400);
    //         setcookie('password', $pass, 86400);
    //     }
    //     if ($row['email'] == 'min@ta.net') {
    //         header("location: admin.php");
    //     } else {
    //         header("location: home.php");
    //     }
    // } else {
    //     $_SESSION['status-no'] = 'invalid login';
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MOTOOM</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/img/logo/logo.png" />
</head>

<body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/img/logo/logo.png" alt="Logo" />
                            </a>
                            <h3><span class="text-success">Mot</span>oom</h3>
                            <h4>Hello! let's get started</h4>
                            <div style="color:red;margin-bottom: 15px">
                                <?php
                                    if(isset($_COOKIE["message"])){
                                        echo $_COOKIE["message"];
                                    }
                                ?>
                            </div>

                            <form class="pt-3" action="#" method="POST">
                                <?php
                                if (isset($_SESSION['status'])) {
                                    echo "<div class='alert alert-success' role='alert'>
                                                      " . $_SESSION['status'] . "
                                                    </div>";
                                    unset($_SESSION['status']);
                                } else
                if (isset($_COOKIE['status-no'])) {
                                    echo "<div class='alert alert-success' role='alert'>
                                                      " . $_COOKIE['status-no'] . "
                                                    </div>";
                                    unset($_COOKIE['status-no']);
                                }
                                ?>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        placeholder="email" name="email"
                                        value="<?php if (isset($_COOKIE['email'])) {
                                                                                                                                                                    echo $_COOKIE['email'];
                                                                                                                                                                }; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="password" placeholder="Password" name="password"
                                        value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                                                                                echo $_COOKIE['password'];
                                                                                                                                                                            }; ?>">
                                </div>
                                <div class="d-flex">
                                    <div class="mt-3 me-4">
                                        <input type="reset"
                                            class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn" onclick="location.href='index.php';"
                                            name="kembali">
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit"
                                            class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn"
                                            name="submit">
                                    </div>
                                </div>
                                
                                
                                <!-- <div class="mb-2"> -->
                                <!-- opsional -->
                                <!-- <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="ti-facebook me-2"></i>Connect using facebook
                                    </button> -->
                                <!-- </div> -->
                                <div class="text-center mt-4 fw-light">
                                    Tidak Punya Akun ? <a href="daftar.php" class="text-success text-decoration-none"> Buat Akun Baru</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- endinject -->
</body>

</html>