<?php

require('../../controllers/Karyawan_controller.php');
$uid = $_GET['uid'];
$karyawan = findKaryawan($_GET['uid']);

if(isset($_POST['submit'])) {
    updateKaryawan($_POST['uid']);
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Update Karyawan</title>
</head>
<body>
    
<div class="text-center">
    <h1 class="text-center mt-2">Edit Karyawan</h1>
    <form method="POST" action="update.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputNama">Nama</label>
                <input name="nama" type="text" class="form-control" id="inputNama" value="<?= $karyawan->getNama() ?>" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputJabatan">Jabatan</label>
                <input name="jabatan" type="text" class="form-control" id="inputJabatan" value="<?= $karyawan->getJabatan() ?>" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputUsia">Usia</label>
                <input name="usia" type="number" class="form-control" id="inputUsia" value="<?= $karyawan->getUsia() ?>" required>
            </div>
            <input name="uid" type="hidden" class="form-control" id="uid" value="<?= $karyawan->getUid() ?>">
        </div>
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <button name="submit" type="submit" class="btn d-block mx-auto btn-primary" value="update">Update</button>
        </div>
    </form>
</div>

</body>
</html>