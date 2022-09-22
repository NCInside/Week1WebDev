<?php

require('../../controllers/Kantor_controller.php');
if(isset($_POST['submit'])) {
    insertKantor();
}

if(isset($_GET['delete'])) {
    deleteKantor($_GET['delete']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Kantor</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../karyawan/">WebDev</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../karyawan/">Karyawan </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Kantor <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../relasi/">Relasi </a>
                </li>
                </ul>
            </div>
    </nav>

    <div class="text-center">
    <h1 class="text-center">List Kantor</h1>
    <table class="table table-dark mt-2 w-50 mx-auto">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Kota</th>
        <th scope="col">Hp</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach(indexKantor() as $index=>$kantor) {
            ?>
            
            <tr>
                <td><?=$index?></td>
                <td><?=$kantor->getNama()?></td>
                <td><?=$kantor->getAlamat()?></td>
                <td><?=$kantor->getKota()?></td>
                <td><?=$kantor->getHp()?></td>
                <td><a href="index.php?delete=<?=$index?>"><button class="btn btn-primary">Delete</button></a></td>
                <td><a href="update.php?uid=<?=$kantor->getUid()?>"><button class="btn btn-primary">Update</button></a></td>
            </tr>

            <?php
        }

        ?>
    </tbody>
    </table>
    <h1 class="text-center mt-2">Tambah Kantor</h1>
    <form method="POST" action="index.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputNama">Nama</label>
                <input name="nama" type="text" class="form-control" id="inputNama" placeholder="Enter nama" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputAlamat">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="inputAlamat" placeholder="Enter alamat" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputKota">Kota</label>
                <input name="kota" type="text" class="form-control" id="inputKota" placeholder="Enter kota" required>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputHp">Hp</label>
                <input name="hp" type="number" class="form-control" id="inputHp" placeholder="Enter nomor hp" required>
            </div>
        </div>
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <button name="submit" type="submit" class="btn d-block mx-auto btn-primary" value="insert">Insert</button>
        </div>
    </form>
    </div>

</body>
</html>