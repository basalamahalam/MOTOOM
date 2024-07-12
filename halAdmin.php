<?php
    include('db.php');
    session_start();
    if(!isset($_SESSION['id_admin'])){
        header("location: login-form.php");
    }
    $db2=new User();

    $mm=$db2->getUserInfo();
    $nn=0;
    foreach($mm as $r){
        $nn++;
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
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/stylea124.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/img/logo/logo.png" />

</head>

<body>

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="#">
                    <div class="d-flex">
                    <img src="assets/img/logo/logo.png" alt="logo" class="text-success" width="600"/>
                    <h2 class="text-success ms-2 my-auto">Mot</h2>
                    <h2 class="my-auto">oom</h2>
                    </div>
                    
                </a>
                <a class="navbar-brand brand-logo-mini" href="#">
                    <img src="assets/img/logo/logo.png" alt="logo" class="ps-1 pe-2" />
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-block ms-0 mt-3">
                    <h1 class="welcome-text text-success">Good Morning, <span class="text-black fw-bold">admin</span></h1>

                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle"src="file/def.jpg" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                        <img class="img-xs rounded-circle"src="file/def.jpg" alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">admin</p>
                            <p class="fw-light text-muted mb-0">admin@gmail.com</p>
                        </div>

                        <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-success me-2"></i>Sign
                            Out</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">


        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-grid-large menu-icon text-success"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            


                <div class="content-wrapper" style="padding-top: 0;">
                    <div class="row">
                        <div class="home-tab">
                            <div class="tab-content tab-content-basic">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview">
                                    <div class="row">
                                        <div class="d-flex flex-column">
                                            <div class="row">
                                            <?php 
                                        
                                        for($i=0;$i<$nn;$i++):
                                      ?>
                                                <div class="col-md-12 py-2">
                                                <img class="img-xs rounded-circle" <?php if(!$mm[$i]['foto']) echo 'src="file/def.jpg"';else echo 'src="file/'.$mm[$i]['foto'].'"';?> alt="Profile image">
                                <h4 class="card-title  card-title-dash"><?=$mm[$i]['username']?></h4>
                                <p><?=$mm[$i]['email']?></p>
                                                    <div class="swiper mySwiper ">
                                                        <div class="swiper-wrapper">
                                                            <?php
                                                             $db=new Task();
                                                             $datas=$db->getUserTask($i+1);
                                                             if(!$datas):
                                                             ?>    
                                                             <div class="swiper-slide card my-2">
                                                                <div class="card-content">
                                                                    <li class="d-block">
                                                                        <div class="form-check w-100 py-3 ps-3">
                                                                           <h6 class='mb-0'>TIDAK ADA TUGAS</h6>
                                                                        </div>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                             <?php endif;?>
                                                             <?php
                                                             foreach($datas as $index => $data):
                                                            ?>
                                                            <div class="swiper-slide card my-2">
                                                                <div class="card-content">
                                                                    <li class="d-block">
                                                                        <div class="form-check w-100 py-1">
                                                                            <label class="form-check-label">

                                                                            <?php
                                                                            if($data['batas_waktu']<$data['waktu_selesai']){
                                                                                echo "<h6 class='mb-0 text-danger'>{$data['nama_tugas']}</h6>";
                                                                            }else if($data['waktu_selesai']!=='0000-00-00 00:00:00'){
                                                                                echo "<h6 class='mb-0 text-success'>{$data['nama_tugas']}</h6>";
                                                                            }else{
                                                                                echo "<h6 class='mb-0'>{$data['nama_tugas']}</h6>";
                                                                            }
                                                                            ?>
                                                                            </label>
                                                                            <div class="d-flex mt-2">
                                                                                <div class="ps-4 text-small me-3">
                                                                                    <?php
                                                                                    if($data['batas_waktu']<$data['waktu_selesai']){
                                                                                        echo "<div class='mb-0 text-small text-danger'>{$data['waktu_selesai']}</div>";
                                                                                    }else if($data['waktu_selesai']!=='0000-00-00 00:00:00'){
                                                                                        echo "<div class='mb-0 text-small text-success' style='color:#32CD32'>{$data['waktu_selesai']}</div>";
                                                                                    }else{
                                                                                        echo "<div class='mb-0 text-small text-muted'>{$data['waktu_selesai']}</div>";
                                                                                    }
                                                                                    ?>  
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex mt-2">
                                                                                <div class="ps-4 text-small me-3">
                                                                                <?php
                                                                                if($data['batas_waktu']<$data['waktu_selesai']){
                                                                                    echo "<div class='mb-0 text-small text-danger'>{$data['batas_waktu']}</div>";
                                                                                }else if($data['waktu_selesai']!=='0000-00-00 00:00:00'){
                                                                                    echo "<div class='mb-0 text-small text-success'>{$data['batas_waktu']}</div>";
                                                                                }else{
                                                                                    echo "<div class='mb-0 text-small text-muted'>{$data['batas_waktu']}</div>";
                                                                                }
                                                                                ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            endforeach;
                                                            ?>
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php
                                  endfor;
                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>


            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex">
                <div class="d-flex">

                    <span class="mt-auto mb-3">Copyright © 2022. All
                        rights
                        reserved.</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    
    <!-- container-scroller -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <!-- -->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(function() {
        $('.sliderjq').slick({
            autoplay: true,
            rows: 3,
            slidesPerRow: 1,
            autoplaySpeed: 5000,
            slidesToScroll: 1,
            arrows: false
        });
    });
    </script>


    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 15,
        grabCursor: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        slidesPerGroup: 1,
        loop: false,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextE1: ".swiper-button-next",
            prevE1: ".swiper-button-prev",
        },
    });

    var swiper2 = new Swiper(".mySwiper2", {

        slidesPerView: 1,
        grid: {
            rows: 1
        },
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
    <!-- End custom js for this page-->
</body>

</html>