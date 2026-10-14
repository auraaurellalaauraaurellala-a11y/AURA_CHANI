<?php
//buat parent class
class karyawan{
    private $nama;
    protected $gajipokok;

    public function __construct($nama, $gajipokok)
    {
        $this->nama = $nama;
        $this->gajipokok = $gajipokok;
    }

    public function getNama(){
        return $this->nama;
        
        }

        //method asli untuk ambil gaji pokok
        public function hitungTotalGaji(){
            return $this->gajipokok;
        }
}

        //Buat child class / kelas turunan
        class Manager extends karyawan{
            private $bonus;

            public function __construct($nama, $gajipokok, $bonus)
            {
                //panggil konstruk parent
                parent::__construct($nama, $gajipokok);
                $this->bonus;
            }

            //method baru untuk bonus manager
            public function getBonus() {
                return $this->bonus;
            }
        }

        //penggunaan kode
        $staff = new karyawan("budi", 5000000);
        $manager1 = new manager("andu", 6000000, 1000000);

        echo "nama karyawan: " .$staff->getNama().
        " | total gaji: Rp. ". number_format($staff->hitungtotalgaji(),0,',','.'). "<br>";

        $totalgajimanager = $manager1->hitungtotalgaji() + 
        $manager1->getBonus();

        echo "nama manager: ".$manager1->getNama()."
        | total gaji Rp." .number_format($totalgajimanager, 0,',','.') . "<br>";


?>