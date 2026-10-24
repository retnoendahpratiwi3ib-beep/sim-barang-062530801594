<?php
class Barang {
    public $kode;
    public $nama;
    public $jumlah;

    public function __construct($kode, $nama, $jumlah) {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->jumlah = $jumlah;
    }

    public function tampilInfo() {
        return "Kode: {$this->kode} | Nama: {$this->nama} | Jumlah: {$this->jumlah} unit";
    }
}