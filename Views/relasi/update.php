<?php

require('../../controllers/Karyawan_controller.php');
require('../../controllers/Kantor_controller.php');
$uid = $_GET['uid'];
$relasi = findRelasi($_GET['uid']);

if(isset($_POST['submit'])) {
    updateRelasi($_POST['uid']);
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
    <title>Update Relasi</title>
</head>
<body>
    
    <div class="text-center">
    <h1 class="text-center mt-2">Edit Relasi</h1>
    <form method="POST" action="update.php">
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
            <input name="uid" type="hidden" class="form-control" id="uid" value="<?= $relasi->getUid() ?>">
        </div>
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <button name="submit" type="submit" class="btn d-block mx-auto btn-primary" value="update">Update</button>
        </div>
    </form>
    </div>

</body>
</html>