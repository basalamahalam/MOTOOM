<?php

require('db.php');
$db=new Database();
$db->connectDatabase();
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $tanggal=$_POST['tanggal'];
    $query = "SELECT kelembapan FROM control WHERE id_user=$id && DATE(waktu_kelembapan)='$tanggal' order by waktu_kelembapan";
    $result = mysqli_query($db->connection,$query);
    //$output = array("Volvo", "BMW", "Toyota");
    //foreach ($result as $row) {
    //    $output[] = $row->id . ' ' . $row->name;
    //} 
    
    //echo json_encode($output);
    $row = mysqli_fetch_all($result,MYSQLI_NUM);
    echo json_encode($row);
}
$db->closeDatabase();