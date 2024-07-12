<?php
  include('db.php');
  session_start();
  if(!isset($_SESSION['id_user'])){
    header("location: index2.php");
}
  $db=new Task();
  $datas=$db->getTaskToday($_SESSION['id_user']);
  $dataTugas=[];
  $idx=0;
  if($datas){
    foreach($datas as $data){
      $dataTugas[$idx]=$data['nama_tugas'];
      $idx++;
      //echo "<script type='text/javascript'> alert('tugas hari ini : {$data['nama_tugas']}') </script>";
    }
    //echo "<script type='text/javascript'> alert('".json_encode($datas)."') </script>";
    //echo "<script type='text/javascript'> alert('tugas hari ini: ".implode(', ',$dataTemp)."') </script>";
  }
  $db2=new Control();
  $data2=$db2->getCurrentMoist();
  //if($data2[0]['kelembapan']>200){
  //  echo "<script type='text/javascript'> alert('peringatan! kelembapan saat ini : {$data2[0]['kelembapan']}') </script>";
  //}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style1.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
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
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <a href="logout.php">logout</a>
        <li class="nav-item font-weight-semibold d-block ms-0">
          <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?= $_SESSION['username']?></span></h1>
          <h3 class="welcome-sub-text">Your performance summary this week </h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-block">
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
            <span class="input-group-addon input-group-prepend border-right">
              <span class="icon-calendar input-group-text calendar-icon"></span>
            </span>
            <input type="text" class="form-control">
          </div>
        </li>
        <li class="nav-item">
          <form class="search-form" action="#">
            <i class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
          </form>
        </li>
        <li class="nav-item dropdown d-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" <?php if(!$_SESSION['foto']) echo 'src="file/def.jpg"';else echo 'src="file/'.$_SESSION['foto'].'"';?> alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" <?php if(!$_SESSION['foto']) echo 'src="file/def.jpg"';else echo 'src="file/'.$_SESSION['foto'].'"';?> alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
              <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
            </div>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
              Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
              Messages</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
              Activity</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>
              FAQ</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
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
    <!-- partial:partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
      <div id="settings-trigger"><i class="ti-settings"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
          <div class="img-ss rounded-circle bg-light border me-3"></div>Light
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default"></div>
        </div>
      </div>
    </div>

    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                  <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the
                                    printing</h5>
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
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title card-title-dash">Todo list</h4>
                                    <div class="add-items d-flex mb-0">
                                      <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                      <a a href="#modalVal" title="Edit Data" data-bs-toggle="modal" data-bs-target="#formModal" class="open-modalVal show-edit-modal" ><button
                                                                                class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i
                                                                                    class="mdi mdi-plus"></i></button></a>
                                    </div>
                                  </div>
                                  <div class="list-wrapper">
                                    <ul class="todo-list todo-list-rounded">
                                      <form action="proses.php" method="post">
                                      <?php 
                                        $db=new Task();
                                        $datas=$db->getTaskOverdue($_SESSION['id_user']);
                                        foreach($datas as $index => $data):
                                      ?>
                                      <li class="d-block">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <div style="color:red">
                                            <input class="checkbox" type="checkbox" name="done_tugas[]" value="<?=$data['id_task']?>"><?=$data['nama_tugas']?>
                                             <i class="input-helper rounded"></i>
                                            </div>
                                           
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div style="color:red" class="ps-4 text-small me-3"><?=$data['batas_waktu']?></div>
                                            <a onclick='return confirm("hapus tugas?")' href ='proses.php?hapus_tugas=<?=$data["id_task"]?>'><i class="bi bi-trash ms-2"></i></a>
                                          </div>
                                        </div>
                                      </li>
                                      <?php
                                        endforeach;
                                      ?>
                                    <?php 
                                        $db=new Task();
                                        $datas=$db->getTaskFresh($_SESSION['id_user']);
                                        foreach($datas as $index => $data):
                                      ?>
                                      <li class="d-block">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" name="done_tugas[]" value="<?=$data['id_task']?>"> <?=$data['nama_tugas']?>
                                             <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3"><?=$data['batas_waktu']?></div>
                                            <a onclick='return confirm("hapus tugas?")' href ='proses.php?hapus_tugas=<?=$data["id_task"]?>'><i class="bi bi-trash ms-2"></i></a>
                                          </div>
                                        </div>
                                      </li>
                                      <?php
                                        endforeach;
                                      ?>
                                      <button type="submit" class="btn btn-primary" id="" name="">confirm</button>
                                      </form>
                                    </ul>
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
      </div>
      <div class="main-panel" style="width:100%;min-height:0">
        <div class="content-wrapper" style="padding-top:0;">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body card-rounded">
                                <h4 class="card-title  card-title-dash">Recent Events</h4>
                                <?php 
                                        $db=new Task();
                                        $datas=$db->getTaskDone($_SESSION['id_user']);
                                        foreach($datas as $index => $data):
                                      ?>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      <?php
                                      if($data['batas_waktu']<$data['waktu_selesai']){
                                        echo "<div class='mb-0 text-small' style='color:red'>{$data['nama_tugas']}</div>";
                                      }else{
                                        echo "<div class='mb-0 text-small text-muted'>{$data['nama_tugas']}</div>";
                                      }
                                      ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">
                                        <?php
                                      if($data['batas_waktu']<$data['waktu_selesai']){
                                        echo "<div class='mb-0 text-small' style='color:red'>{$data['waktu_selesai']}</div>";
                                      }else{
                                        echo "<div class='mb-0 text-small text-muted'>{$data['waktu_selesai']}</div>";
                                      }
                                      ?>  
                                      </div>
                                    </div>
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
      </div>



      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">

          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights
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
							<input type="hidden" name="tipe" id="tipe" value="tambah_tugas"/>
							<input type="hidden" name="id_user" id="id_user" value="<?=$_SESSION['id_user']?>"/>
							<div class="my-3 input-group">
								<span class="input-group-text">
									<i class="bi bi-envelope"></i>
								</span>
								<input type="text" class="form-control" id="nama_task" name="nama_task" placeholder="nama task" 
									required>
							</div>

							<div class="my-3 input-group">
								<span class="input-group-text">
									<i class="bi bi-bookmark"></i>
								</span>
								<input type="datetime-local" class="form-control" id="batas_waktu" name="batas_waktu" placeholder="subject"
									required>
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
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
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
  <!-- --><script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
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