<?php
    // Definisi Class (PBO)
    class Kasir {
        public $totalBelanja;
        public $punyaKartu;
        public $diskon = 0;

        // Konstruktor untuk inisialisasi data
        public function __construct($belanja, $kartu) {
            $this->totalBelanja = $belanja;
            $this->punyaKartu = $kartu;
        }

        public function hitungDiskon() {
            if ($this->punyaKartu == "ya") {
                // Sesuai Flowchart Jalur Kanan
                if ($this->totalBelanja > 500000) {
                    $this->diskon = 50000;
                } elseif ($this->totalBelanja > 100000) {
                    $this->diskon = 15000;
                }
            } else {
                // Sesuai Flowchart Jalur Kiri
                if ($this->totalBelanja > 100000) {
                    $this->diskon = 5000;
                }
            }
            return $this->diskon;
        }

        public function hitungTotalBayar() {
            return $this->totalBelanja - $this->hitungDiskon();
        }
    }

    // Eksekusi saat tombol diklik
    if (isset($_POST['hitung'])) {
        $belanjaInput = $_POST['totalBelanja'];
        $kartuInput = $_POST['punyaKartu'];

        // Instansiasi Objek
        $transaksi = new Kasir($belanjaInput, $kartuInput);

        // Tampilkan Hasil
        echo "<h3>Hasil Output:</h3>";
        echo "Apakah ada kartu member: " . $transaksi->punyaKartu . "<br>";
        echo "Total belanjaan: Rp " . number_format($transaksi->totalBelanja, 0, ',', '.') . "<br>";
        echo "Diskon: Rp " . number_format($transaksi->hitungDiskon(), 0, ',', '.') . "<br>";
        echo "<strong>Total Bayar: Rp " . number_format($transaksi->hitungTotalBayar(), 0, ',', '.') . "</strong>";
    }
    ?>