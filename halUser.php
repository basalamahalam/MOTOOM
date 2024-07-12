<?php
    include('db.php');
        session_start();
    if(!isset($_SESSION['id_user'])){
        header("location: login-form.php");
    }
    $db=new Task();
    $datas=$db->getTaskToday($_SESSION['id_user']);
    $dataTugas=[];
    $idx=0;
    if($datas){
        foreach($datas as $data){
        $dataTugas[$idx]=$data['nama_tugas'];
        $idx++;
        }
    }
    $db2=new Control();
    $data2=$db2->getCurrentMoist();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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
                <li class="nav-item font-weight-semibold d-block ms-0 mt-3 d-none d-sm-block">
                    <h1 class="welcome-text text-success">Good Morning, <span class="text-black fw-bold"><?=$_SESSION['username']?></span></h1>

                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                        <span class="input-group-addon input-group-prepend border-right">
                            <span class="icon-calendar input-group-text calendar-icon"></span>
                        </span>
                        <input type="text" class="form-control">
                    </div>
                </li>

                <li class="nav-item dropdown user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" <?php if(!$_SESSION['foto']) echo 'src="file/def.jpg"';else echo 'src="file/'.$_SESSION['foto'].'"';?> alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                        <img class="img-xs rounded-circle" <?php if(!$_SESSION['foto']) echo 'src="file/def.jpg"';else echo 'src="file/'.$_SESSION['foto'].'"';?> alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold"><?=$_SESSION['username']?></p>
                            <p class="fw-light text-muted mb-0"><?=$_SESSION['email']?></p>
                        </div>

                        <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-success me-2"></i>Sign
                            Out</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu d-none d-lg-block"></span>
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
            <div class="content-wrapper pt-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-tab">
                            <div class="tab-content tab-content-basic">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview">
                                    <div class="row">
                                        <div class="col-lg-8 d-flex flex-column">
                                            <div class="row flex-grow">
                                                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                                    <div class="card card-rounded">
                                                        <div class="card-body">
                                                            <div
                                                                class="d-sm-flex justify-content-between align-items-start">
                                                                <div>
                                                                    <h4 class="card-title card-title-dash">Grafik Kelembapan</h4>

                                                                    <h5 class="card-subtitle card-subtitle-dash">Data diterima secara real time</h5>
                                                                </div>
                                                                <div id="performance-line-legend"></div>
                                                            </div>
                                                            <div class="chartjs-wrapper mt-5">
                                                                <canvas id="performaneLine"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex flex-column">
                                            <div class="row flex-grow">
                                                <div class="col-12 grid-margin stretch-card">
                                                    <div class="card card-rounded">

                                                        <div class="card-body">

                                                            <div class="row">

                                                                <div class="col-md-12">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <h4 class="card-title card-title-dash">
                                                                            Todo
                                                                            list
                                                                        </h4>
                                                                        <div class="add-items d-flex mb-0">
                                                                            <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                                                            <a a href="#modalVal" title="Edit Data"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#formModal"
                                                                                class="open-modalVal show-edit-modal"><button
                                                                                    class="add btn btn-icons btn-rounded btn-success todo-list-add-btn text-white me-0 pl-12p"><i
                                                                                        class="mdi mdi-plus"></i></button></a>
                                                                        </div>
                                                                    </div>
                                                                    <form action="proses.php" method="post">
                                                                    <div class="sliderjq">
                                                                    <?php 
                                        $db=new Task();
                                        $datas=$db->getTaskOverdue($_SESSION['id_user']);
                                        foreach($datas as $index => $data):
                                      ?>
                                        <div class="swiper-slide">
                                            <div class="card-content">
                                                <li class="d-block">
                                                    <div class="form-check w-100">
                                                        <label class="form-check-label">
                                                            <div class="text-danger">
                                                            <input class="checkbox" type="checkbox" name="done_tugas[]" value="<?=$data['id_task']?>"><?=$data['nama_tugas']?>
                                                            <i class="input-helper rounded"></i>
                                                            </div>
                                                        
                                                        </label>
                                                        <div class="d-flex mt-2">
                                                            <div class="ps-4 text-small text-danger me-3"><?=$data['batas_waktu']?></div>
                                                            <a onclick='return confirm("hapus tugas?")' href ='proses.php?hapus_tugas=<?=$data["id_task"]?>'><i class="bi bi-trash m-2 text-dark"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                                                        <?php
                                    endforeach;
                                    ?>

                                                                        <?php
                                    $db = new Task();
                                    $datas = $db->getTaskFresh($_SESSION['id_user']);
                                    foreach ($datas as $index => $data) :
                                    ?>
                                                                        <div class="swiper-slide">
                                            <div class="card-content">
                                                <li class="d-block">
                                                    <div class="form-check w-100">
                                                        <label class="form-check-label">
                                                            <div>
                                                            <input class="checkbox" type="checkbox" name="done_tugas[]" value="<?=$data['id_task']?>"><?=$data['nama_tugas']?>
                                                            <i class="input-helper rounded"></i>
                                                            </div>
                                                        
                                                        </label>
                                                        <div class="d-flex mt-2">
                                                            <div class="ps-4 text-small me-3"><?=$data['batas_waktu']?></div>
                                                            <a onclick='return confirm("hapus tugas?")' href ='proses.php?hapus_tugas=<?=$data["id_task"]?>'><i class="bi bi-trash ms-auto text-dark"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                                                        <?php
                                    endforeach;
                                    ?>
                                                                   </div>
                                                                    <button type="submit" class="btn btn-success" id="" name="">confirm</button>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="main-panel" style="width: 100%; min-height: 0;">
                <div class="content-wrapper" style="padding-top: 0;">
                    <div class="row">
                        <div class="home-tab">
                            <div class="tab-content tab-content-basic">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview">
                                    <div class="row">
                                        <div class="d-flex flex-column">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>History</h4>
                                                    <div class="swiper mySwiper ">
                                                        <div class="swiper-wrapper">
                                                            <?php
                              $db = new Task();
                              $datas = $db->getTaskDone($_SESSION['id_user']);
                              foreach ($datas as $index => $data) :
                              ?>
                                                            <div class="swiper-slide card my-2">
                                                                <div class="card-content">
                                                                    <li class="d-block">
                                                                        <div class="form-check w-100">
                                                                            <label class="form-check-label">

                                                                            <?php
                                      if($data['batas_waktu']<$data['waktu_selesai']){
                                        echo "<div class='mb-0 text-small text-danger'>{$data['nama_tugas']}</div>";
                                      }else{
                                        echo "<div class='mb-0 text-small text-muted'>{$data['nama_tugas']}</div>";
                                      }
                                      ?>
                                                                                
                                                                            </label>
                                                                            <div class="d-flex mt-2">
                                                                                <div class="ps-4 text-small me-3">
                                                                                <?php
                                      if($data['batas_waktu']<$data['waktu_selesai']){
                                        echo "<div class='mb-0 text-small text-danger'>{$data['waktu_selesai']}</div>";
                                      }else{
                                        echo "<div class='mb-0 text-small text-muted'>{$data['waktu_selesai']}</div>";
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
                                            </div>
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
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="formModalLabel">to-do</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row justify-content-center my-2">
                    <div class="text-center mt-4">
                        <h2>add to-do list</h2>
                    </div>
                    <div class="col-11">
                        <form method="post" action="proses.php" id="form-book" enctype="multipart/form-data">
                            <input type="hidden" name="tipe" id="tipe" value="tambah_tugas" />
                            <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>" />
                            <div class="my-3 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="text" class="form-control" id="nama_task" name="nama_task"
                                    placeholder="nama task" required>
                            </div>

                            <div class="my-3 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-bookmark"></i>
                                </span>
                                <input type="datetime-local" class="form-control" id="batas_waktu" name="batas_waktu"
                                    placeholder="subject" required>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary" id="edit" name="edit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="js/dashboard22.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(function() {
        $('.sliderjq').slick({
            autoplay: false,
            rows: 3,
            infinite:false,
            slidesPerRow: 1,
            autoplaySpeed: 5000,
            slidesToScroll: 1,
            arrows: false
        });
    });
    </script>


    <script>
        var xx=0;
        if($(window).width()>991)xx=3;
        else if($(window).width()>700)xx=2;
        else xx=1;
        var swiper = new Swiper(".mySwiper", {
        
        slidesPerView: xx,
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
    </script>
    <script>
    window.setTimeout(function(){
      if(<?= count($dataTugas)?>)alert("tugas hari ini : <?= implode(", ",$dataTugas)?>");
      
      if(<?=$data2[0]['kelembapan']?>>500){
        alert('peringatan! kelembapan saat ini : <?=$data2[0]['kelembapan']?>');
      }
    }, 1500); 
  </script>
    <!-- End custom js for this page-->
</body>

</html>