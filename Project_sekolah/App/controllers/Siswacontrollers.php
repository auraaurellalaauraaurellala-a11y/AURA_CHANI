<?php

namespace App\Controllers;

use App\Models\Siswa;
use siswa as GlobalSiswa;

class Siswacontrollers{
    public function prosesdata(): void{
        $siswa1 = new Siswa("25701", "siti kusmini", "Teknik Informatika", "xii rpl 1");

        echo "<div style='border: 2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;
        background: #f8f9fa;'>";

        echo "<h3 style='color: #007bff; margin-top: 0;'>
        data profil siswa (via controller)</h3>";

        echo "<b>NIS:</b> {$siswa1->getNis()} <br>";
        echo "<b>Nama:</b> {$siswa1->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa1->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa1->getJurusan()} <br>";
        echo "</div>";

        echo "<br>";

        $siswa2 = new Siswa("257007", "Aura mayla sari", "Pemograman", "XI RPL 1");

         echo "<div style='border: 2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;
        background: #f8f9fa;'>";

         echo "<b>NIS:</b> {$siswa2->getNis()} <br>";
        echo "<b>Nama:</b> {$siswa2->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa2->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa2->getJurusan()} <br>";
        echo "</div>";

        echo "<br>";

         $siswa3 = new Siswa("257008", "Azarine aneira chani p", "Pemograman", "XI RPL 1");

         echo "<div style='border: 2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;
        background: #f8f9fa;'>";

         echo "<b>NIS:</b> {$siswa3->getNis()} <br>";
        echo "<b>Nama:</b> {$siswa3->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa3->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa3->getJurusan()} <b>";
        echo "</div>";

    }
}
?>