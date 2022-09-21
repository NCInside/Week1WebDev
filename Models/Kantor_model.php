<?php

class Kantor_model {
    private $uid;
    private $nama;
    private $alamat;
    private $kota;
    private $hp;

    function __construct($nama, $alamat, $kota, $hp)
    {
        $this->uid = uniqid();
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->kota = $kota;
        $this->hp = $hp;
    }

    function getUid() {
        return $this->uid;
    }
    function getNama() {
        return $this->nama;
    }
    function getAlamat() {
        return $this->alamat;
    }
    function getKota() {
        return $this->kota;
    }
    function getHp() {
        return $this->hp;
    }

    function setUid($uid) {
        $this->uid = $uid;
    }
    function setNama($nama) {
        $this->nama = $nama;
    }
    function setAlamat($alamat) {
        $this->alamat = $alamat;
    }
    function setKota($kota) {
        $this->kota = $kota;
    }
    function setHp($hp) {
        $this->hp = $hp;
    }
}