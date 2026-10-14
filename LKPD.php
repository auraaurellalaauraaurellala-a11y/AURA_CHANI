<?php

class TabunganSiswa {
    private string $nomorRekening;
    private string $namaSiswa;
    private int $saldo;
    private string $pin;

    public function __construct(string $noRek, string $nama, int $saldoAwal, string $pin) {
        $this->nomorRekening = $noRek;
        $this->namaSiswa = $nama;
        $this->pin = $pin;

        // Saldo awal minimal 20.000
        if ($saldoAwal >= 20000) {
            $this->saldo = $saldoAwal;
        } else {
            $this->saldo = 20000;
            echo "Sistem: Saldo awal kurang dari batas minimal, diset otomatis ke Rp 20.000<br>";
        }
    }

    // Getter nomor rekening
    public function getNomorRekening(): string {
        return "XXXX-XXXX-" . substr($this->nomorRekening, -4);
    }

    // Getter saldo
    public function getSaldo(): int {
        return $this->saldo;
    }

    // Verifikasi PIN
    public function verifikasiPin(string $pinInput): bool {
        return $this->pin === $pinInput;
    }

    // Setor uang
    public function setorUang(int $jumlah): void {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            echo "Setor tunai Rp " . number_format($jumlah) . " berhasil.<br>";
        } else {
            echo "Jumlah setoran harus lebih dari 0!<br>";
        }
    }

    // Tarik uang dengan PIN
    public function tarikUang(int $jumlah, string $pinInput): void {

        if (!$this->verifikasiPin($pinInput)) {
            echo "Penarikan ditolak! PIN salah.<br>";
        } elseif ($jumlah <= 0) {
            echo "Jumlah penarikan tidak valid!<br>";
        } elseif ($jumlah > ($this->saldo - 20000)) {
            echo "Penarikan gagal! Saldo mengendap minimal Rp 20.000.<br>";
        } else {
            $this->saldo -= $jumlah;
            echo "Tarik tunai Rp " . number_format($jumlah) . " berhasil.<br>";
        }
    }
}


// Pengujian
$tabungan = new TabunganSiswa(
    "1234567890",
    "Ahmad Fauzi",
    50000,
    "1234"
);

echo "No Rekening: " . $tabungan->getNomorRekening() . "<br>";
echo "Saldo Awal: Rp " . number_format($tabungan->getSaldo()) . "<br><br>";

echo "Penarikan dengan PIN salah:<br>";
$tabungan->tarikUang(10000, "1111");

echo "<br>Penarikan dengan PIN benar:<br>";
$tabungan->tarikUang(10000, "1234");

echo "<br><b>Saldo Akhir: Rp " . number_format($tabungan->getSaldo()) . "</b>";

?>