<?php
abstract class NotifikasiWEB{
    protected string $penerima;
    protected string $pesan;

    public function __construct(string $penerima, string $pesan)
    {
        $this->penerima = $penerima;
        $this->pesan = $pesan;
    }

    public function getInfoPengiriman(): string{
        return "Mengirim ke: {$this->penerima}";
    }

    abstract public function kirimNotifikasi(): void;
}

class NotifEmail extends NotifikasiWEB{
    private string $subjek;

    public function __construct(string $penerima, string $pesan, string $subjek)
    {
        parent::__construct($penerima, $pesan);
        $this->subjek = $subjek;
    }

    public function kirimNotifikasi(): void
    {
         echo "<div style='border: 2px solid #007bff;
         padding: 10px;
         margin-bottom: 10px;
         background-color: #f0f0f0;'
         >";

         echo "<h4>[EMAIL] - subjek: {$this->subjek}</h4>";
         echo "<p>{$this->getInfoPengiriman()}</p>";
         echo "<p>isi pesan: <i>{$this->pesan}</i></p>";
         echo "</div>";
    }
}

    class notifWA extends notifikasiweb{
        public function kirimnotifikasi(): void
        {
            echo "<div style='border:2px solid #28a745;
                             padding: 10px;
                             margin-bottom: 10px;
                             background-color: #e8f5e9;
                             '>";

            echo "<h4>[whatsapp MESSAGE]</h4>";
            echo "<p>{$this->getInfoPengiriman()}</p>";
            echo "<p>pesan: <i>{$this->pesan}</i></p>";
            echo "</div>";
        }
    }

    class notifBrowser extends notifikasiweb{
        private string $browserapp;

        public function __construct(string $penerima, string $pesan, string $browserapp)
    {
        parent::__construct($penerima, $pesan);
        $this->browserapp = $browserapp;
    }

    public function kirimnotifikasi(): void
    {
        echo "<div style='border:2px solid #ffc107;
        padding: 10px; 
        margin-bottom:10px;
        background-color: #fff3cd;
        '>";

        echo "<h4>[PUSH NOTIF] - browser: {$this->browserapp}</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>notif: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
    }

    class notifmanager{
        public static function proseskirim(notifikasiweb $notif): void
        {
        $notif->kirimnotifikasi();
        }
    }

    class notifgithub extends notifikasiweb{
        public function kirimNotifikasi(): void
        {
            echo "<div style='border:2px solid #24292f;
            padding:10px;
            background-color: #3381cf;'>";

            echo "<h4>[GITHUB]</h4>";
            echo "<p>{$this->getInfoPengiriman()}</p>";
            echo "<p>pesan: <i>{$this->pesan}</i></p>";
            echo "</div>";
        }
    }

    echo "<h2>dashboard simulasi pengiriman notifikasi web</h2>";

    $notif1 = new NotifEmail("steve@gmail.com", "akun anda berhasil didaftarkan.", "konfirmasi akun");
    $notif2 = new notifwa("085877846734", "kode OTP anda adalah 123456 jangan berikan ke siapapun!");
    $notif3 = new notifbrowser("token_device_asus", "anda diskon 40% untuk produk pilihan anda!", "google chrome");
    $notif4 = new notifgithub("steve", "anda mendapatkan 1 bintang di repo anda!");
    
    notifmanager::proseskirim($notif1);
    notifmanager::proseskirim($notif2);
    notifmanager::proseskirim($notif3);
    notifmanager::proseskirim($notif4);
    ?>