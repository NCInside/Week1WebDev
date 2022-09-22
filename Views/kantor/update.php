<?php

require('../../controllers/Kantor_controller.php');
$uid = $_GET['uid'];
$kantor = findKantor($_GET['uid']);

if(isset($_POST['submit'])) {
    updateKantor($_POST['uid']);
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
    <title>Update Kantor</title>
</head>
<body>
    
<div class="text-center">
    <h1 class="text-center mt-2">Edit Kantor</h1>
    <form method="POST" action="update.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputNama">Nama</label>
                <input name="nama" type="text" class="form-control" id="inputNama" value="<?= $kantor->getNama() ?>" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputAlamat">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="inputAlamat" value="<?= $kantor->getAlamat() ?>" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputKota">Kota</label>
                <input name="kota" type="text" class="form-control" id="inputKota" value="<?= $kantor->getKota() ?>" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputHp">Hp</label>
                <input name="hp" type="number" class="form-control" id="inputHp" value="<?= $kantor->getHp() ?>" required>
            </div>
            <input name="uid" type="hidden" class="form-control" id="uid" value="<?= $kantor->getUid() ?>">
        </div>
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <button name="submit" type="submit" class="btn d-block mx-auto btn-primary" value="update">Update</button>
        </div>
    </form>
</div>

</body>
</html>