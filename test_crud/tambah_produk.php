<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data</title>
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
    <h1 class="text-center">TEST CRUD</h1>

    <!--awal card-->
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
        Form input data
        </div>
        <div class="card-body">
            <form action="proses_tambah.php" method="POST" enctype= "multipart/form-data">
                <div class="form-group">
                    <label>No Urut</label>
                    <input type="text" class="form-control" name="no_urut" value="" placeholder="Masukan no urut disini!" required>
                </div>
                <div class="form-group">
                    <label>tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="" placeholder="masukan deskripsi anda di sini!" required>
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <select name="posisi" class="form-control">
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