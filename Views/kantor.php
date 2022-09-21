<?php

require('../controllers/Kantor_controller.php');
if(isset($_POST['submit'])) {
    if ($_POST['submit'] == "insert") {
        insertKantor();
    }
    else updateKantor();
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
            <a class="navbar-brand" href="karyawan.php">WebDev</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="karyawan.php">Karyawan </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="kantor.php">Kantor <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="relasi.php">Relasi </a>
                </li>
                </ul>
            </div>
    </nav>


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
                <td><a href="kantor.php?delete=<?=$index?>"><button class="btn btn-primary">Delete</button></a></td>
            </tr>

            <?php
        }

        ?>
    </tbody>
    </table>
    <h1 class="text-center mt-2">Tambah Karyawan</h1>
    <form method="POST" action="kantor.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputNama">Nama</label>
                <input name="nama" type="text" class="form-control" id="inputNama" placeholder="Enter nama">
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputAlamat">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="inputAlamat" placeholder="Enter alamat">
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputKota">Kota</label>
                <input name="kota" type="text" class="form-control" id="inputKota" placeholder="Enter kota">
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="inputHp">Hp</label>
                <input name="hp" type="number" class="form-control" id="inputHp" placeholder="Enter nomor hp">
            </div>
        </div>
        <button name="submit" type="submit" class="btn d-block mx-auto mt-3 btn-primary" value="insert">Insert</button>
        <button name="submit" type="submit" class="btn d-block mx-auto mt-2 btn-primary" value="update">Update</button>
    </form>
</body>
</html>