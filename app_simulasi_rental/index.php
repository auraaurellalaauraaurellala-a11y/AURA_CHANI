<?php

session_start();
require_once 'TransaksiRental';
if(isset($_SESSION['daftar transaksi'])){
    $_SESSION['daftar transaksi']=[];
     }

     $error = "";

     if($_SERVER['REQUEST_METHOD'] === 'POST') {
     try {
            $nama = ($_POST['nama'] ?? '');
            $jenis = ($_POST['jenis'] ?? '');
            $lama = (INT) ($_POST['lama'] ?? 0);
            $denda = (INT) ($_POST['keterlambatan'] ?? 0);
            $addons = $_POST['addons'] ?? [];
             
            if ($nama === '' || $jenis === '') {
                throw new Exception("nama penyewa dan jenis laptop wajib diisi");
            }

            $obj = new transaksirental($nama, $jenis, $lama, $keterlambatan, $addons);

            $_SESSION['daftar_transaksi'][] = [
              'nama' => $obj->getnamapenyewa(),
              'jenis' => $obj->getjenislaptop(),
              'lama' => $obj->getlamasewa(),
              'addons' => $obj->getaddons(),
              'subtotal' => $obj->hitungsubtotal(),
              'diskon' => $obj->hitungdiskon(),
              'denda' => $obj->hitungdenda(),
              'total' => $obj->hitungtotalbayar(),
            ];

             $sukses = "transaksi berhasil disimpan";

                    } catch (Exception $e) {
                        $error = $e->getmessage();
                    }
     }

     function rupiah($angka) {
        return "RP" . number_format($angka, 0, ',', '.');
     }
     ?>
     <!DOCTYPE html>
     <html lang="id">
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TechRent Express - Simulasi Rental Laptop</title>
        <link herf="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color:aqua;}
            .card-header { font-weight: 600;}
            </style>
     </head>
     <body>
        
     <nav class="navbar navbar-dark bg=primary mb-4">
     <div class="container">
     <span class="navbar-brand mb-0 h1">TechRent Express</span>
     <a href="reset.php" class="btn btn-light btn-sm"
     onclick="return confirm('yakin ingin menghapus semua riwayat transaksi?')">
     reset data
     </a>
     </div>
     </nav>

     <div class="container">
        <h4 class="mb-4 text-center">sistem simulasi transaksi rentsl laptop</h4>

        <?php if ($error): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>error:</strong> <?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if ($sukses): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?=  htmlspecialchars($sukses) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <div class="row">
                    
                <div class="col-lg-5 mb-4>
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        form input transaksi
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3>
                            <label class="form-label">Nama Penyewa</label>
                            <input type="text" name="nama" class"form-control"placholder="contoh: budi santoso" required>
            </div>

            <div class="mb-3">
                <label class="form-label">jenis laptop</label>
                <select name="jenis" class="nama" class="form-select" require>
                    <option value="">-- pilih laptop --</option>
                    <option value="asus vivibook">asus vivibook</option>
                    <option value="lenovo thinkpad">lenovo thikpad</option>
                    <option value="acar aspire 5">acer aspire 5</option>
                    <option value="hp pavillion">hp pavillion</option>
                    <option value="macbook air m1">macbook air m1</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">lama sewa (hari)</label>
                <input type="number" name="lama" class="form-control"min="1" value="1" required>
                <small class="text-muted">minimal 1 hari. diskon 10% untuk sewa >= 5 hari.</small>  
            </div>

            <div class="mb-3>
            <label class="form-label">keterlambatan (hari)</label>
            <input type="number" name="keterlambatan" class="form-control"
            min="0" value="0">
            <small class="text-muted">denda Rp 20.000/hari keterlambatan.</small>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">fitur tambahan (add-ons)</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"name="addons[}" value="mouse" id="addonmouse">
                    <label class="form-check-label" for="addonmouse">
                        mouse wireless (+Rp 5.000/hari)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"name="addons[]" value="tas" id="addontas">
                    <label class="form-check-label" for="addontas">
                        tas laptop (+Rp 10.000/hari)
                    </label>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    hitung & simpan transaksi
                </button>
            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-3 shadow-sm">
                    <div class="card-body small">
                        <strong>info tarif:</strong><br>
                        tarif dasar: Rp 50.000/hari<br>
                        mouse wireless: +Rp 5.000/hari<br>
                        tas laptop: +Rp 10.000/hari<br>54w
                        diskon 10% untuk sewa > 5 hari<br>
                        denda telat: Rp 20.000/hari
                    </div>
                </div>
                </div>
                
     </body>
     </html>