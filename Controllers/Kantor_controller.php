<?php

include_once('Relasi_controller.php');
if(!isset($_SESSION['listKantor'])) {
    $_SESSION['listKantor'] = array();
}

function insertKantor() {
    $kantor = new Kantor_model($_POST['nama'], $_POST['alamat'], $_POST['kota'], $_POST['hp']);
    array_push($_SESSION['listKantor'], $kantor);
}

function updateKantor() {
    foreach(indexKantor() as $index=>$kantor) {
        if(!strcmp($kantor->getNama(), $_POST['nama'])) {
            $kantor->setAlamat($_POST['alamat']);
            $kantor->setKota($_POST['kota']);
            $kantor->setHp($_POST['hp']);
            return true;
        }
    }
    return false;
}

function indexKantor() {
    return $_SESSION['listKantor'];
}

function deleteKantor($id) {
    unset( $_SESSION['listKantor'][$id] );
    foreach($_SESSION['listRelasi'] as $index=>$relasi) {
        if(!strcmp($relasi->getUidKantor(), $_SESSION['listKantor'][$id]->getUid())) {
            deleteRelasi($index);
        }
    }
}

function findKantor($uid) {
    foreach($_SESSION['listKantor'] as $index=>$kantor) {
        if ($kantor->getUid() == $uid) return $kantor;
    }
}