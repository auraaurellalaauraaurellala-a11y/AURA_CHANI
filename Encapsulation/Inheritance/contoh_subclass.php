<?php
require "contoh_Superclass.php";

class siswa extends Person{
    private string $nisn;

    public function __construct(string $nama, string $alamat, string $nisn)
    {
        //memanggil construct milik superclass
        parent::__construct($nama, $alamat);
        $this->nisn = $nisn;
    }

    public function belajar():void{
        echo "Siswa bernama :" .$this->Getnama()
        ." dengan NIS: ".$this->nisn.
        "sedang belajar mata pelajaran RPL.<br>";
    }
}

//Pengujian Inheritance melalui Pembuatan Objek
$siswa1 = new siswa("Ahmad sugeng", "kendal", "4252554");
$siswa1->tampilkanInfo(); //Method warisan
$siswa1->belajar();

?>