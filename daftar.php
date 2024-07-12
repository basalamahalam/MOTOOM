<?php

// session_start();

// include 'prcs/config.php';

// if (isset($_POST['submit'])) {
//     $nama = mysqli_real_escape_string($conn, $_POST['nama']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $pass = md5($_POST['password']);

//     $select = "SELECT * FROM tb_user WHERE email = '$email' && password = '$pass' ";

//     $result = mysqli_query($conn, $select);

//     if (mysqli_num_rows($result) > 0) {
//         header('Location: daftar.php?error=User telah tersedia');
//     } else {
//         $insert = "INSERT INTO tb_user(nama, email, password) VALUES ('$nama', '$email', '$pass')";
//         mysqli_query($conn, $insert);
//         $_SESSION['status'] = 'User berhasil ditambahkan. Silahkan login untuk melanjutkan.';
//         header('location: login-form.php');
//     }
// }
?>

<?php
    include("db.php");
    if (isset($_POST['submit'])) {
        if(isset($_FILES['fupload']['tmp_name'])){
            $tmp_file=$_FILES['fupload']['tmp_name'];
            $nm_file=$_FILES['fupload']['name'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
        }else if(isset($_POST['username'])){
            $tmp_file=0;
            $nm_file='def.jpg';
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
        }

        $file_type = $_FILES['fupload']['type']; //returns the mimetype

        $allowed = array("image/jpeg", "image/gif", "image/png");
        if(!in_array($file_type, $allowed)) {
        //$error_message = 'Only jpg, gif, and png files are allowed.';

        //echo $error_message;

        //exit();
            $tmp_file=null;
            $nm_file=null;

        }
        
        //$password_md5=md5($password);

        if($username != '' && $email != '' && $password != ''){
            $db=new User();
            $db->userRegister($tmp_file,$nm_file,$username,$email,$password);
            
        }else{
            setcookie("message","username, email,  atau password kosong",time()+5);
            header("location: index34.php");
        }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
font-awesome/5.15.2/css/all.min.css"/>
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

                            <form class="pt-3" action="" method="POST"  enctype="multipart/form-data">
                                <?php
                                if (isset($_GET['error'])) { ?>
                                <div class='alert alert-danger' role='alert'>
                                    <?php echo $_GET['error']; ?>
                                </div>
                                <?php } ?>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="password" placeholder="Password" name="password" required>
                                </div>
                                <!-- <div class="form-group">
                                <input name="fupload" id="fupload" type="file"><br><br>
                                </div> -->
                                <div class="input-group shadow mb-3">
                                <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
                                <input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="fupload" id="fupload" class="d-none">
                                <div class="form-control form-control-lg" id="imgname"></div>
                                <!-- <input type="text" class="form-control form-control-lg" placeholder="Upload Image" x-model="fileName"> -->
                                <button id="btnimg" class="browse btn btn-success px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Browse</button>
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
                                
                                


                                <div class="text-center mt-4 fw-light">
                                    Sudah Punya Akun ? <a href="login-form.php" class="text-success text-decoration-none" style=""> Silahkan login</a>
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
    <script>
        document.getElementById('btnimg').addEventListener('click', openDialog);

        function openDialog() {
            document.getElementById('fupload').click();
        }
        document.getElementById('fupload').onchange = function () {
            document.getElementById('imgname').innerHTML=this.value.split("\\").pop();
};
    </script>
    <!-- endinject -->
</body>

</html>