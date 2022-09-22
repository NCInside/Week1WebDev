<?php

include('../../models/Relasi_model.php');
include('../../models/Karyawan_model.php');
include('../../models/Kantor_model.php');
session_start();
if(!isset($_SESSION['listRelasi'])) {
    $_SESSION['listRelasi'] = array();
}

function insertRelasi() {
    $uidKaryawan = $_POST['uidKaryawan'];
    $uidKantor = $_POST['uidKantor'];
    $relasi = new Relasi_model($uidKaryawan, $uidKantor);
    array_push($_SESSION['listRelasi'], $relasi);
}

function updateRelasi($uid) {
    $uidKaryawan = $_POST['uidKaryawan'];
    $uidKantor = $_POST['uidKantor'];
    foreach(indexRelasi() as $index=>$relasi) {
        if(!strcmp($relasi->getUid(), $uid)) {
            $relasi->setUidKaryawan($uidKaryawan);
            $relasi->setUidKantor($uidKantor);
            return true;
        }
    }
    return false;
}

function indexRelasi() {
    return $_SESSION['listRelasi'];
}

function deleteRelasi($id) {
    unset($_SESSION['listRelasi'][$id]);
}

function findRelasi($uid) {
    foreach($_SESSION['listRelasi'] as $index=>$relasi) {
        if ($relasi->getUid() == $uid) return $relasi;
    }
}