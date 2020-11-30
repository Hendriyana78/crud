<?php
    include('koneksi.php');

    $id = $_POST['id'];
    $no_urut = $_POST['no_urut'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $posisi = $_POST['posisi'];
    $gambar_produk = $_FILES['gambar_produk']['name'];

    if($gambar_produk != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $gambar_produk);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar_produk;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

        $query = "UPDATE produk SET no_urut = '$no_urut', 
                                    tanggal = '$tanggal', 
                                    deskripsi = '$deskripsi', 
                                    posisi = '$posisi', 
                                    gambar_produk = '$nama_gambar_baru'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        
        if(!$result) {
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));       
        } else {
            echo "<script>alert('Edit data sukses!');window.location='index.php';</script>";
        }

        } else {
            echo "<script>alert('Ekstensi hanya bisa png dan jpg!');window.location='edit_produk.php';</script>";
        }
    } else {
        $query = "UPDATE produk SET no_urut = '$no_urut', 
                                    tanggal = '$tanggal', 
                                    deskripsi = '$deskripsi', 
                                    posisi = '$posisi'";
        $query ="WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        
        if(!$result) {
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));       
        } else {
            echo "<script>alert('Edit data sukses!');window.location='index.php';</script>";
        }
    }

?>