<?php
//Pseudocode dari contoh elemen PBO
//Class = Hewan
//Property = Nama, Jenis, Warna
//Method = Makan(), Tidur(), Bersuara()

//Object = Hewan-Kucing
//Nama = Milo
//Jenis = Kucing
//Warna = Putih

//Object = Hewan-Kelinci
//Nama = Bubu
//Jenis = Kelinci
//Warna = Coklat

class Hewan
{
    public $nama;
    public $jenis;
    public $warna;

    public function makan()
    {
        echo $this->nama . " sedang makan";
    }

    public function tidur()
    {
        echo $this->nama . " sedang tidur";
    }

    public function bersuara()
    {
        echo $this->nama . " sedang bersuara";
    }
}

// Objek pertama
$kucing = new Hewan();
$kucing->nama = "Milo";
$kucing->jenis = "Kucing";
$kucing->warna = "Putih";

// Objek kedua
$kelinci = new Hewan();
$kelinci->nama = "Bubu";
$kelinci->jenis = "Kelinci";
$kelinci->warna = "Cokelat";

echo "Objek 1<br>";
echo "Nama: " . $kucing->nama . "<br>";
echo "Jenis: " . $kucing->jenis . "<br>";
echo "Warna: " . $kucing->warna . "<br>";
$kucing->bersuara();

echo "<br><br>";

echo "Objek 2<br>";
echo "Nama: " . $kelinci->nama . "<br>";
echo "Jenis: " . $kelinci->jenis . "<br>";
echo "Warna: " . $kelinci->warna . "<br>";
$kelinci->bersuara();

?>