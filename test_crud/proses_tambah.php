<?php
    include('koneksi.php');

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

        $query = "INSERT INTO produk (no_urut, tanggal, deskripsi, posisi, gambar_produk) 
                    VALUES ('$no_urut', 
                            '$tanggal', 
                            '$deskripsi',
                            '$posisi',
                            '$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);
        
        if(!$result) {
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));       
        } else {
            echo "<script>alert('Tambah data sukses!');window.location='index.php';</script>";
        }

        } else {
            echo "<script>alert('Ekstensi hanya bisa png dan jpg!');window.location='tambah_data.php';</script>";
        }
    } else {
        $query = "INSERT INTO produk (no_urut, tanggal, deskripsi, posisi) 
                    VALUES ('$no_urut', 
                            '$tanggal', 
                            '$deskripsi',
                            '$posisi')";
        $result = mysqli_query($koneksi, $query);
        
        if(!$result) {
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Silahkan upload data dulu!!');window.location='index.php';</script>";
        }
    }

?>