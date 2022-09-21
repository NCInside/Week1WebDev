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
                <td><a href="kantor.php?delete=<?=$index?>"><button class="btn btn-primary">Delete</button></a></td>
            </tr>

            <?php
        }

        ?>
    </tbody>
    </table>
    <h1 class="text-center mt-2">Tambah Relasi</h1>
    <form method="POST" action="kantor.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
            <label for="inputkar">Karyawan</label>
                <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>

                <?php

                foreach(indexKaryawan() as $index=>$karyawan) {
                    ?>
                        
                        <option value="<?= $karyawan->getUid() ?>"><?=$karyawan->getName()?></option>

                    <?php
                }

                ?>

                </select>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
            <label for="inputkan">Kantor</label>
                <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>

                <?php

                foreach(indexKantor() as $index=>$kantor) {
                    ?>
                        
                        <option value="<?= $kantor->getUid() ?>"><?=$karyawan->getKantor()?></option>

                    <?php
                }

                ?>
                
                </select>
            </div>
        </div>
        <button name="submit" type="submit" class="btn d-block mx-auto mt-3 btn-primary" value="insert">Insert</button>
        <button name="submit" type="submit" class="btn d-block mx-auto mt-2 btn-primary" value="update">Update</button>
    </form>
</body>
</html>