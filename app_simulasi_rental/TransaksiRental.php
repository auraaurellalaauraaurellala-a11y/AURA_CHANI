<?php

Class transaksirental {
    private $namaPenyewa;
    private $jenisLaptop;
    private $lamaSewa;
    private $keterlambatan;
    private $addOns;

    private $tarif_harian = 50000;
    private $denda_harian = 20000;

    public function __construct($nama, $jenis, $lama, $denda, $addons) {
        $this->namaPenyewa = $nama;
        $this->jenisLaptop = $jenis;
        $this->setlamaSewa($lama);
        $this->keterlambatan = $denda;
        $this->addOns = $addons;
    }
    public function setlamaSewa($lama) {
        if($lama <= 0) {
         throw new exception("lamasewa minimal 1 hari!");
        }

        $this->lamaSewa = $lama;
    }

    public function hitungbiayaaddons() {
     $biaya = 0;

        if (in_array("mouse", $this->addOns)) {
            $biaya += 5000 * $this->lamaSewa;
        }

        if (in_array("tas", $this->addOns)) {
            $biaya += 10000 * $this->lamaSewa;
        }   
        return $biaya;
         }
          public function hitungsubtotal() {
            return ($this->lamaSewa * self:: $tarif_harian) + $this->hitungbiayaaddons();
          }

          public function hitungdiskon() {
            $subtotal = $this->hitungsubtotal();

            if ($this->lamaSewa >= 5) {
                return $subtotal * 0.10;
            }
            return 0;
          }

          public function hitungdenda () {
           if ($this->keterlambatan > 0) {
            return $this->keterlambatan * self:: $denda_harian;
           }

           return 0;
          }
        
          public function hitungtotalbayar () {
            return ($this->hitungsubtotal() - $this->hitungdiskon()) + $this->hitungdenda(); 
          }
}
?>