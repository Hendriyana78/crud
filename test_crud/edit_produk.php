<?php include('koneksi.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result) {
        die("Query Error :".mysqli_errno($koneksi). "-".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);

    if(!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada tabel');window.location='index.php';</script>";
    }

    } else {
        echo "<script>alert('Masukan id yang ingin di edit');window.location='index.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit produk</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type= "text/css">
        * {
            font-family: "Trebuchet MS";
            }
        .card-body {
            width: 400px;
            padding: 20px;
            margin: auto; 
            }
        .container {
            width: 500px;
            padding: 25px;
            margin: auto;
            }
    
    </style>
    
</head>
<body>
<div class="container">
    <h1 class="text-center">Edit produk no urut <?php echo $data['no_urut'];?></h1>

    <!--awal card-->
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
        Form input data
        </div>
        <div class="card-body">
            <form action="proses_edit.php" method="POST" enctype= "multipart/form-data">
                <div class="form-group">
                    <label>No Urut</label>
                    <input type="text" class="form-control" name="no_urut" value="<?php echo $data['no_urut'];?>" placeholder="Masukan no urut disini!" required>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $data['id'];?>"/>
                </div>
                <div class="form-group">
                    <label>tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tanggal'];?>" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="" placeholder="masukan deskripsi anda di sini!" required>
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <select name="posisi" class="form-control" value="<?php echo $data['posisi'];?>">
                        <option value=""></option>
                        <option value="Active">Active</option>
                        <option value="unActive">unActive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name= "gambar_produk" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>

            </form>
        </div>
    </div>
    <!--akhir card-->

</div>
<link type="text/javascript" src="js/bootstrap.min.js"></link>
</body>
</html>