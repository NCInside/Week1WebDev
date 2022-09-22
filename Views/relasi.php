<?php

require('../controllers/Karyawan_controller.php');
require('../controllers/Kantor_controller.php');
if(isset($_POST['submit'])) {
    if ($_POST['submit'] == "insert") {
        insertRelasi();
    }
    else updateRelasi();
}

if(isset($_GET['delete'])) {
    deleteRelasi($_GET['delete']);
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
    <a class="navbar-brand" href="relasi.php">WebDev</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="karyawan.php">Karyawan </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kantor.php">Kantor</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="relasi.php">Relasi <span class="sr-only">(current)</span></a>
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
        <th scope="col">Karyawan</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Usia</th>
        <th scope="col">Kantor</th>
        <th scope="col">Alamat</th>
        <th scope="col">Kota</th>
        <th scope="col">Hp</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach(indexRelasi() as $index=>$relasi) {
            $karyawan = findKaryawan($relasi->getUidKaryawan());
            $kantor = findKantor($relasi->getUidKantor());
            ?>
            
            <tr>
                <td><?=$index?></td>
                <td><?=$karyawan->getNama()?></td>
                <td><?=$karyawan->getJabatan()?></td>
                <td><?=$karyawan->getUsia()?></td>
                <td><?=$kantor->getNama()?></td>
                <td><?=$kantor->getAlamat()?></td>
                <td><?=$kantor->getKota()?></td>
                <td><?=$kantor->getHp()?></td>
                <td><a href="relasi.php?delete=<?=$index?>"><button class="btn btn-primary">Delete</button></a></td>
            </tr>

            <?php
        }

        ?>
    </tbody>
    </table>
    <h1 class="text-center mt-2">Tambah Relasi</h1>
    <form method="POST" action="relasi.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
            <label for="inputkar">Karyawan</label>
                <select class="form-select" aria-label="Default select example" name="uidKaryawan" required>

                <?php

                foreach(indexKaryawan() as $index=>$karyawan) {
                    ?>
                        
                        <option value="<?= $karyawan->getUid() ?>"><?=$karyawan->getNama()?></option>

                    <?php
                }

                ?>

                </select>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
            <label for="inputkan">Kantor</label>
                <select class="form-select" aria-label="Default select example" name="uidKantor" required>

                <?php

                foreach(indexKantor() as $index=>$kantor) {
                    ?>
                        
                        <option value="<?= $kantor->getUid() ?>"><?=$kantor->getNama()?></option>

                    <?php
                }

                ?>
                
                </select>
            </div>
        </div>
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <button name="submit" type="submit" class="btn d-block mx-auto btn-primary" value="insert">Insert</button>
            <button name="submit" type="submit" class="btn d-block mx-auto btn-primary" value="update">Update</button>
        </div>
    </form>
    </div>

</body>
</html>