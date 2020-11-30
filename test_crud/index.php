<?php 
    include('koneksi.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type= "text/css">
        * {
            font-family: "Trebuchet MS"
            }
    
        h1 {
            text-transform: uppercase;
            color: salmon;
            margin-top: 5px;
            }

        .link {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 11px;
            }
    
    </style>
</head>

<body>
<div class="container">
    <center><h1>Test CRUD</h1></center>
    <a href="tambah_produk.php" class="link">+ &nbsp; Tambah produk</a>
        <table>
            <div class="card mt-4">
                <div class="card-header bg-success text-white">
                Daftar crud
                </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>No Urut</th>
                        <th>tanggal</th>
                        <th>Deskripsi beli</th>
                        <th>Posisi</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                <tbody>

                <?php
                    $query = "SELECT * FROM produk ORDER BY id ASC";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result) {
                        die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                    }
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['no_urut']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['deskripsi']; ?></td>
                        <td><?php echo $row['posisi']; ?></td>
                        <td><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px"></td>
                        <td>
                            <a href="edit_produk.php?id=<?php echo $row['id']; ?>" class="btn btn-primary text-white">Edit</a>
                            <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </div>

                <?php
                    $no++;
                }
            ?>
        </tbody>
    </table>
        <link rel="text/javascript" href="js/bootstrap.min.js">
</body>
</html>