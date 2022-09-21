<?php

include('../models/Relasi_model.php');
include('../models/Karyawan_model.php');
include('../models/Kantor_model.php');
session_start();
if(!isset($_SESSION['listRelasi'])) {
    $_SESSION['listRelasi'] = array();
}

function insertRelasi() {
    $uidKaryawan = $_POST['uidKaryawan'];
    $uidKantor = $_POST['uidKantor'];
    foreach(indexRelasi() as $index=>$relasi) {
        if(!strcmp($relasi->getUidKantor(), $uidKantor) || !strcmp($relasi->getUidKaryawan(), $uidKaryawan)) {
            return false;
        }
    }
    $relasi = new Relasi_model($_POST['uidKaryawan'], $_POST['uidKantor']);
    array_push($_SESSION['listRelasi'], $relasi);
}

function updateRelasi() {
    $uidKaryawan = $_POST['uidKaryawan'];
    $uidKantor = $_POST['uidKantor'];
    foreach(indexRelasi() as $index=>$relasi) {
        if(!strcmp($relasi->getUidKaryawan(), $uidKaryawan)) {
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