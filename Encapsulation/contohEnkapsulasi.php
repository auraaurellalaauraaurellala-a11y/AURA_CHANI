<?php
class AkunBank{
    private $nomorRekening;
    private $saldo;
    private $pin;

    public function __construct($nomorRekening, $saldo, $pin){
        $this->nomorRekening = $nomorRekening;
        $this->saldo = $saldo;
        $this->pin = $pin;
    }

    //kita buat getter nomer rekening (red-only)
    public function getNomorRekening(){
        return $this->nomorRekening; 
    }

    //buat getter dan setter untuk saldo 
    public function getSaldo(){
        return "Rp.".number_format ($this->saldo,2,',','.');
    }

public function setSaldo($jumlah){
    if($jumlah >= 0){
        $this->saldo = $jumlah;
    } else {
        echo "Error: saldo awal/perubahan tidak valid<br>";
    }
}

//buat getter dan setter untuk pin (write-only/terenkripsi:terlindungi)
public function setPin($pinBaru){
    if (preg_match('/^[0-9]{6}$/', $pinBaru)){
        $this->pin = password_hash($pinBaru, PASSWORD_BCRYPT);
    } else {
        echo "Error: PIN harus berupa 6 digit angka <br>";
    }
}
}
//penggunaan kode

//buat object berserta isi propertinya
$akun1 = new AkunBank("3246-786-123", 500000, "123456");

echo "no rekening:".$akun1->getNomorRekening()."<br>";
echo "saldo saat ini:".$akun1->getSaldo()."<br>";

$akun1->setSaldo(750000);
echo "saldo setelah diupdate:".$akun1->getSaldo()."<br>";

$akun1->setSaldo(-250000);
echo "saldo setelah diupdate:".$akun1->getSaldo()."<br>";

$akun1->setSaldo(950000);
echo "saldo setelah diupdate:".$akun1->getSaldo()."<br>";
?>