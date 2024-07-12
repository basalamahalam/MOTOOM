<?php

include('db.php');

if(isset($_POST['tipe'])){
    if($_POST['tipe']=='tambah_tugas'){
        $nama=$_POST['nama_task'];
        $date=$_POST['batas_waktu'];
        $id_user=$_POST['id_user'];
        $db=new Task();
        $db->saveTaskData($nama,$date,$id_user);
        back();
    }else back();
}else if(isset($_POST['done_tugas'])){
    $datas=$_POST['done_tugas'];
    foreach ($datas as $data){ 
        $db=new Task();
        $db->doneTask($data);
    }
    back();
}else if(isset($_GET['hapus_tugas'])){
  $id_task=$_GET['hapus_tugas'];
  $db=new Task();
  $db->deleteTask($id_task);
  back();
}else back();


function back(){
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

/*
<?php 
              if($_SESSION['foto']){
                echo '<img class="img-xs rounded-circle" src="file/'.$_SESSION['foto'].'.jpg" alt="Profile image"> </a>';
              }else{
                echo '<img class="img-xs rounded-circle" src="file/def.jpg" alt="Profile image"> </a>';
              }
            ?>
*/