<?php

include_once('Relasi_controller.php');
if(!isset($_SESSION['listKantor'])) {
    $_SESSION['listKantor'] = array();
}

function insertKantor() {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $hp = $_POST['hp'];
    if (validateKantor($nama, $alamat, $kota, $hp)) {
        $kantor = new Kantor_model($nama, $alamat, $kota, $hp);
        array_push($_SESSION['listKantor'], $kantor);
    }
}

function updateKantor($uid) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $hp = $_POST['hp'];
    if (validateKantor($nama, $alamat, $kota, $hp)) {
        foreach(indexKantor() as $index=>$kantor) {
            if(!strcmp($kantor->getUid(), $uid)) {
                $kantor->setNama($nama);
                $kantor->setAlamat($alamat);
                $kantor->setKota($kota);
                $kantor->setHp($hp);
                return true;
            }
        }
    } 
    return false;
}

function indexKantor() {
    return $_SESSION['listKantor'];
}

function deleteKantor($id) {
    foreach($_SESSION['listRelasi'] as $index=>$relasi) {
        if(!strcmp($relasi->getUidKantor(), $_SESSION['listKantor'][$id]->getUid())) {
            deleteRelasi($index);
        }
    }
    unset( $_SESSION['listKantor'][$id] );
}

function findKantor($uid) {
    foreach($_SESSION['listKantor'] as $index=>$kantor) {
        if ($kantor->getUid() == $uid) return $kantor;
    }
}

function validateKantor($nama, $alamat, $kota, $hp) {

    $errMsg = "";

    if (!preg_match("/^[a-zA-z]*$/", $nama)) {  
        $errMsg = "Error! You didn't enter a valid Nama.";  
    }
    else if (!preg_match("/^[a-zA-z]*$/", $alamat)) {  
        $errMsg = "Error! You didn't enter a valid Alamat.";  
    }
    else if (!preg_match("/^[a-zA-z]*$/", $kota)) {  
        $errMsg = "Error! You didn't enter a valid Kota.";  
    }
    else if (!preg_match("/^[0-9]*$/", $hp)) {
        $errMsg = "Error! You didn't enter a valid Hp.";  
    }

    if (!empty($errMsg)) {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("' . $errMsg . '")';  
        echo '</script>'; 
        return false;
    }
    else {
        return true;
    }

}