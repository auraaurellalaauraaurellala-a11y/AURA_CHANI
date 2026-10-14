<?php
class TransaksiRental
{
    private $namaPenyewa;
    private $jenisLaptop;
    private $lamaSewa;
    private $keterlambatan;
    private $addOns = [];

    private const TARIF_HARIAN  = 50000;
    private const DENDA_HARIAN  = 20000;
    private const HARGA_MOUSE   = 5000;
    private const HARGA_TAS     = 10000;
    private const MIN_HARI_DISKON = 5;
    private const PERSEN_DISKON   = 0.10;

    public function __construct($nama, $jenis, $lama, $denda, $addons = [])
    {
        $this->namaPenyewa   = $nama;
        $this->jenisLaptop   = $jenis;
        $this->setLamaSewa($lama);
        $this->keterlambatan = (int)$denda;
        $this->addOns        = is_array($addons) ? $addons : [];
    }

    public function setLamaSewa($lama)
    {
        if ($lama <= 0) {
            throw new Exception("Lama sewa minimal 1 hari!");
        }
        $this->lamaSewa = (int)$lama;
    }

    public function getNamaPenyewa()   { return $this->namaPenyewa; }
    public function getJenisLaptop()   { return $this->jenisLaptop; }
    public function getLamaSewa()      { return $this->lamaSewa; }
    public function getKeterlambatan() { return $this->keterlambatan; }
    public function getAddOns()        { return $this->addOns; }

    public function hitungBiayaAddOns()
    {
        $biaya = 0;
        if (in_array('mouse', $this->addOns)) {
            $biaya += self::HARGA_MOUSE * $this->lamaSewa;
        }
        if (in_array('tas', $this->addOns)) {
            $biaya += self::HARGA_TAS * $this->lamaSewa;
        }
        return $biaya;
    }

    public function hitungSubtotal()
    {
        return ($this->lamaSewa * self::TARIF_HARIAN) + $this->hitungBiayaAddOns();
    }

    public function hitungDiskon()
    {
        $subtotal = $this->hitungSubtotal();
        if ($this->lamaSewa >= self::MIN_HARI_DISKON) {
            return $subtotal * self::PERSEN_DISKON;
        }
        return 0;
    }

    public function hitungDenda()
    {
        if ($this->keterlambatan > 0) {
            return $this->keterlambatan * self::DENDA_HARIAN;
        }
        return 0;
    }

    public function hitungTotalBayar()
    {
        return ($this->hitungSubtotal() - $this->hitungDiskon()) + $this->hitungDenda();
    }
}

?>