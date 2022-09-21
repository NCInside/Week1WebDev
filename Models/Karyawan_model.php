<?php

class Karyawan_model {
    private $uid;
    private $nama;
    private $jabatan;
    private $usia;

    function __construct($nama, $jabatan, $usia)
    {
        $this->uid = uniqid();
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->usia = $usia;
    }

    function getUid() {
        return $this->uid;
    }
    function getNama() {
        return $this->nama;
    }
    function getJabatan() {
        return $this->jabatan;
    }
    function getUsia() {
        return $this->usia;
    }

    function setUid($uid) {
        $this->uid = $uid;
    }
    function setNama($nama) {
        $this->nama = $nama;
    }
    function setJabatan($jabatan) {
        $this->jabatan = $jabatan;
    }
    function setUsia($usia) {
        $this->usia = $usia;
    }
}