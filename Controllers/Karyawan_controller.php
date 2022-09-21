<?php

include_once('Relasi_controller.php');
if(!isset($_SESSION['listKaryawan'])) {
    $_SESSION['listKaryawan'] = array();
}

function insertKaryawan() {
    $karyawan = new Karyawan_model($_POST['nama'], $_POST['jabatan'], $_POST['usia']);
    array_push($_SESSION['listKaryawan'], $karyawan);
}

function updateKaryawan() {
    foreach(indexKaryawan() as $index=>$karyawan) {
        if(!strcmp($karyawan->getNama(), $_POST['nama'])) {
            $karyawan->setJabatan($_POST['jabatan']);
            $karyawan->setUsia($_POST['usia']);
            return true;
        }
    }
    return false;
}

function indexKaryawan() {
    return $_SESSION['listKaryawan'];
}

function deleteKaryawan($id) {
    unset( $_SESSION['listKaryawan'][$id] );
    foreach($_SESSION['listRelasi'] as $index=>$relasi) {
        if(!strcmp($relasi->getUidKaryawan(), $_SESSION['listKaryawan'][$id]->getUid())) {
            deleteRelasi($index);
        }
    }
}

function findKaryawan($uid) {
    foreach($_SESSION['listKaryawan'] as $index=>$karyawan) {
        if ($karyawan->getUid() == $uid) return $karyawan;
    }
}