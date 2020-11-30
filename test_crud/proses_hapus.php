<?php 
include('koneksi.php');

$id = $_GET['id'];
$query = "DELETE FROM produk WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if(!$result) {
    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));       
} else {
echo "<script>alert('Hapus data sukses!');window.location='index.php';</script>";
}