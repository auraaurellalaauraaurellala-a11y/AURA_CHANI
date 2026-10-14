<?php

use App\Models\Siswa;
use App\Controllers\Siswacontrollers;

require_once 'App/Models/Siswa.php';
require_once 'App/controllers/Siswacontrollers.php';

echo "<h2>sistem informasi sekolah - SMK Texmaco Semarang</h2>";
echo "<hr>";

$controller = new Siswacontrollers();
$controller->prosesData();

echo "<br> <hr>";

$siswa1 = new Siswa("25701", "siti kusmini", "Teknik Informatika", "xii rpl 1");
echo "NIS    : ".$siswa1->getNis(). "<br>";
echo "NAMA   : ".$siswa1->getNama(). "<br>";
echo "JURUSAN : ".$siswa1->getJurusan(). "<br>";
echo "KELAS  : ".$siswa1->getKelas(). "<br>";