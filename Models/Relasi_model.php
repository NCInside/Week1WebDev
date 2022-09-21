<?php

class Relasi_model {
    private $uid;
    private $uidKaryawan;
    private $uidKantor;

    function __construct($uidKaryawan, $uidKantor)
    {
        $this->uid = uniqid();
        $this->uidKaryawan = $uidKaryawan;
        $this->uidKantor = $uidKantor;
    }

    function getUid() {
        return $this->uid;
    }
    function getUidKaryawan() {
        return $this->uidKaryawan;
    }
    function getUidKantor() {
        return $this->uidKantor;
    }

    function setUid($uid) {
        $this->uid = $uid;
    }
    function setUidKaryawan($uidKaryawan) {
        $this->uidKaryawan = $uidKaryawan;
    }
    function setUidKantor($uidKantor) {
        $this->uidKantor = $uidKantor;
    }
}