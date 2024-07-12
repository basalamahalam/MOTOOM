<?php 
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "db_tubesrpl2");

//tangkap parameter yang dikirimkan oleh nodemcu
$kelembaban = $_GET['kelembaban'];

// simpan ke tabel data_kelembaban
// atur ID selalu dimulai dari 1
mysqli_query($conn, "ALTER TABLE control AUTO_INCREMENT = 1");
//simpan nilai kelembaban ke data_kelembaban

$simpan = mysqli_query($conn, "INSERT INTO control(kelembapan,waktu_kelembapan,id_user) VALUES ('$kelembaban',CURRENT_TIMESTAMP,1)");

//berikan respon ke nodemcu
if($simpan)
    echo "Berhasil disimpan";
else
    echo "Gagal Tersimpan";
?>