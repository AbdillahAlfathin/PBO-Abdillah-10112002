<?php

// =========================================================
// a & b. Pembuatan Class Induk (uang tabungan)
// =========================================================
class UangTabungan {
    
    // d. Penggunaan identifier public, protected, private
    protected $saldo;        // PROTECTED: Bisa diakses oleh class anak (Siswa)
    private $kodeRekening;   // PRIVATE: Hanya class induk yang tahu (Encapsulation)
    public $nama;            // PUBLIC: Bisa diakses dari luar untuk menampilkan nama

    // f. Gunakan constructor
    public function __construct($namaSiswa, $saldoAwal) {
        $this->nama = $namaSiswa;
        $this->saldo = $saldoAwal;
        $this->kodeRekening = uniqid("REK-"); // Meng-generate kode unik rahasia
    }

    // Method untuk menampilkan saldo (Encapsulation untuk read-only dari luar)
    public function getSaldo() {
        return $this->saldo;
    }

    // h. Saldo ditambah jika setor tunai
    public function setorTunai($nominal) {
        if ($nominal > 0) {
            $this->saldo += $nominal;
            return true;
        }
        return false;
    }

    // h. Saldo dikurangi jika tarik tunai
    public function tarikTunai($nominal) {
        if ($nominal > 0 && $this->saldo >= $nominal) {
            $this->saldo -= $nominal;
            return true;
        }
        return false;
    }
}

// =========================================================
// a & c. Pembuatan Class Anak (siswa 1, siswa 2, siswa 3)
// =========================================================
// e. Masing-masing anak akan menjadi object mandiri sehingga tidak bisa saling akses saldonya
class Abdillah extends UangTabungan {
    public function __construct($saldoAwal) {
        parent::__construct("Abdillah", $saldoAwal);
    }
}

class Fakhran extends UangTabungan {
    public function __construct($saldoAwal) {
        parent::__construct("Fakhran", $saldoAwal);
    }
}

class Resyan extends UangTabungan {
    public function __construct($saldoAwal) {
        parent::__construct("Resyan", $saldoAwal);
    }
}

// =========================================================
// Inisialisasi Objek & Array
// =========================================================

// g. Menetapkan saldo awal milik masing-masing siswa
$s1 = new Abdillah(100000); 
$s2 = new Fakhran(150000);
$s3 = new Resyan(200000);

// f. Gunakan array untuk menyimpan data object siswa
$daftarSiswa = [
    "1" => $s1,
    "2" => $s2,
    "3" => $s3
];

// i. Gunakan fopen untuk membaca input dari Command Prompt
$inputCLI = fopen("php://stdin", "r");

// =========================================================
// Menu Program Utama (Looping & Percabangan)
// =========================================================

// f. Gunakan perulangan (while)
while (true) {
    echo "\n====================================\n";
    echo "    PROGRAM TABUNGAN SEKOLAH    \n";
    echo "====================================\n";
    echo "1. Lihat Saldo Awal Semua siswa\n";
    echo "2. Lakukan Transaksi (Setor/Tarik)\n";
    echo "3. Keluar Program\n";
    echo "Pilih Menu (1/2/3): ";
    
    // i. Gunakan fgets untuk menangkap ketikan user di CMD
    $menu = trim(fgets($inputCLI));

    // f. Gunakan percabangan (if-elseif)
    if ($menu == "1") {
        echo "\n--- DATA SALDO AWAL SISWA ---\n";
        // Mengeluarkan isi array dengan looping
        foreach ($daftarSiswa as $kunci => $objekSiswa) {
            echo $objekSiswa->nama . " memiliki saldo: Rp " . number_format($objekSiswa->getSaldo(), 0, ',', '.') . "\n";
        }
        
    } elseif ($menu == "2") {
        echo "\nPilih Akses Siswa (Ketik 1, 2, atau 3): ";
        $pilihanAkun = trim(fgets($inputCLI));

        // e. Mengecek apakah siswa yg dipilih ada (Siswa 1 tidak bisa masuk ke akun 2)
        if (array_key_exists($pilihanAkun, $daftarSiswa)) {
            $akunAktif = $daftarSiswa[$pilihanAkun];
            
            echo "\n--- Selamat Datang, " . $akunAktif->nama . " ---\n";
            echo "1. Setor Tunai\n";
            echo "2. Tarik Tunai\n";
            echo "Pilih Transaksi (1/2): ";
            $jenisTransaksi = trim(fgets($inputCLI));

            if ($jenisTransaksi == "1") {
                echo "Masukkan nominal Setor Tunai: Rp ";
                $nominal = (int)trim(fgets($inputCLI));
                
                if ($akunAktif->setorTunai($nominal)) {
                    echo "✅ Berhasil! Saldo akhir " . $akunAktif->nama . " : Rp " . number_format($akunAktif->getSaldo(), 0, ',', '.') . "\n";
                } else {
                    echo "❌ Gagal: Nominal tidak valid.\n";
                }
                
            } elseif ($jenisTransaksi == "2") {
                echo "Masukkan nominal Tarik Tunai: Rp ";
                $nominal = (int)trim(fgets($inputCLI));
                
                if ($akunAktif->tarikTunai($nominal)) {
                    echo "✅ Berhasil! Saldo akhir " . $akunAktif->nama . " : Rp " . number_format($akunAktif->getSaldo(), 0, ',', '.') . "\n";
                } else {
                    echo "❌ Gagal: Saldo tidak mencukupi atau nominal salah.\n";
                }
            } else {
                echo "❌ Pilihan transaksi tidak dikenali.\n";
            }
        } else {
            echo "❌ Akses Ditolak: Anda tidak memiliki akses ke data tersebut.\n";
        }

    } elseif ($menu == "3") {
        echo "\nTerima kasih telah menggunakan sistem tabungan sekolah.\n\n";
        break; // Keluar dari perulangan
        
    } else {
        echo "\n❌ Menu tidak valid. Silakan pilih 1, 2, atau 3.\n";
    }
}

// Menutup resource stream
fclose($inputCLI);

?>