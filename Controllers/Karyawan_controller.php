<?php

include_once('Relasi_controller.php');
if(!isset($_SESSION['listKaryawan'])) {
    $_SESSION['listKaryawan'] = array();
}

function insertKaryawan() {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $usia = $_POST['usia'];
    if (validateKaryawan($nama, $jabatan, $usia)) {
        $karyawan = new Karyawan_model($nama, $jabatan, $usia);
        array_push($_SESSION['listKaryawan'], $karyawan);
    }
}

function updateKaryawan() {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $usia = $_POST['usia'];
    if (validateKaryawan($nama, $jabatan, $usia)) {
        foreach(indexKaryawan() as $index=>$karyawan) {
            if(!strcmp($karyawan->getNama(), $_POST['nama'])) {
                $karyawan->setJabatan($_POST['jabatan']);
                $karyawan->setUsia($_POST['usia']);
                return true;
            }
        }
    } 
    return false;
}

function indexKaryawan() {
    return $_SESSION['listKaryawan'];
}

function deleteKaryawan($id) {
    foreach($_SESSION['listRelasi'] as $index=>$relasi) {
        if(!strcmp($relasi->getUidKaryawan(), $_SESSION['listKaryawan'][$id]->getUid())) {
            deleteRelasi($index);
        }
    }
    unset( $_SESSION['listKaryawan'][$id] );
}

function findKaryawan($uid) {
    foreach($_SESSION['listKaryawan'] as $index=>$karyawan) {
        if ($karyawan->getUid() == $uid) return $karyawan;
    }
}

function validateKaryawan($nama, $jabatan, $usia) {

    $errMsg = "";

    if (!preg_match("/^[a-zA-z]*$/", $nama)) {  
        $errMsg = "Error! You didn't enter a valid Nama.";  
    }
    else if (!preg_match("/^[a-zA-z]*$/", $jabatan)) {  
        $errMsg = "Error! You didn't enter a valid Jabatan.";  
    }
    else if ((int) $usia <= 0) {
        $errMsg = "Error! You didn't enter a valid Usia.";  
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