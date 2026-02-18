<?php

class HitungPinjaman {
    public $besaran_pinjaman;
    public $bunga_persen = 10;
    public $lama_angsuran = 5;
    public $hari_terlambat = 40;
    public $denda_rate = 0.0015; // 0.15%

    public function setPinjaman($jumlah) {
        $this->besaran_pinjaman = $jumlah;
    }

    public function hitungTotalPinjaman() {
        return $this->besaran_pinjaman + ($this->besaran_pinjaman * ($this->bunga_persen / 100));
    }

    public function hitungAngsuran() {
        return $this->hitungTotalPinjaman() / $this->lama_angsuran;
    }

    public function hitungDenda() {
        return $this->hitungAngsuran() * $this->denda_rate * $this->hari_terlambat;
    }

    public function hitungTotalBayar() {
        return $this->hitungAngsuran() + $this->hitungDenda();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $proses = new HitungPinjaman();
    $proses->setPinjaman($_POST['pinjaman']);

    echo "<h2>HASIL PERHITUNGAN - TOKO PEGADAIAN SYARIAH</h2>";
    echo "Besaran Pinjaman: Rp " . number_format($proses->besaran_pinjaman, 0, ',', '.') . "<br>";
    echo "Bunga: " . $proses->bunga_persen . "%<br>";
    echo "Total Pinjaman: Rp " . number_format($proses->hitungTotalPinjaman(), 0, ',', '.') . "<br>";
    echo "Lama Angsuran: " . $proses->lama_angsuran . " Bulan<br>";
    echo "Besaran Angsuran: Rp " . number_format($proses->hitungAngsuran(), 0, ',', '.') . "<br>";
    echo "-------------------------------------------<br>";
    echo "Keterlambatan: " . $proses->hari_terlambat . " Hari<br>";
    echo "Denda Terlambat: Rp " . number_format($proses->hitungDenda(), 0, ',', '.') . "<br>";
    echo "<strong>BESARAN PEMBAYARAN: Rp " . number_format($proses->hitungTotalBayar(), 0, ',', '.') . "</strong><br>";
    echo "<p style='color:red;'>Ketentuan denda 0.15% per hari dari angsuran</p>";
}
?>