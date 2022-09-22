<?php

require('../../Controllers/Karyawan_controller.php');
if(isset($_POST['submit'])) {
        insertKaryawan();
}

if(isset($_GET['delete'])) {
    deleteKaryawan($_GET['delete']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Karyawan</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">WebDev</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Karyawan <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../kantor/">Kantor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../relasi/">Relasi </a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="text-center">
    <h1 class="text-center">List Karyawan</h1>
    <table class="table table-dark mt-2 w-50 mx-auto">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Usia</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach(indexKaryawan() as $index=>$karyawan) {
            ?>
            
            <tr>
                <td><?=$index?></td>
                <td><?=$karyawan->getNama()?></td>
                <td><?=$karyawan->getJabatan()?></td>
                <td><?=$karyawan->getUsia()?></td>
                <td><a href="index.php?delete=<?=$index?>"><button class="btn btn-primary">Delete</button></a></td>
                <td><a href="update.php?uid=<?=$karyawan->getUid()?>"><button class="btn btn-primary">Update</button></a></td>
            </tr>

            <?php
        }

        ?>
    </tbody>
    </table>
    <h1 class="text-center mt-2">Tambah Karyawan</h1>
    <form method="POST" action="index.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputNama">Nama</label>
                <input name="nama" type="text" class="form-control" id="inputNama" placeholder="Enter nama" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputJabatan">Jabatan</label>
                <input name="jabatan" type="text" class="form-control" id="inputJabatan" placeholder="Enter jabatan" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputUsia">Usia</label>
                <input name="usia" type="number" class="form-control" id="inputUsia" placeholder="Enter usia" required>
            </div>
        </div>
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <button name="submit" type="submit" class="btn d-block mx-auto btn-primary" value="insert">Insert</button>
        </div>
    </form>
    </div>

</body>
</html>