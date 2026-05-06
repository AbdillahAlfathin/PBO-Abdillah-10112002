<?php

// ==========================================
// 1. MODEL (Logika Data)
// ==========================================
class Kendaraan {
    private $Merek, $JumlahRoda, $Harga, $Warna, $BhnBakar;

    public function __construct($merek, $jumlahroda, $harga, $warna, $bahanbakar) {
        $this->Merek = $merek;
        $this->JumlahRoda = $jumlahroda;
        $this->Harga = $harga;
        $this->Warna = $warna;
        $this->BhnBakar = $bahanbakar;
    }

    // Getter
    public function GetMerek() { return $this->Merek; }
    public function GetJumlahRoda() { return $this->JumlahRoda; }
    public function GetHarga() { return $this->Harga; }
    public function GetWarna() { return $this->Warna; }
    public function GetBhnBakar() { return $this->BhnBakar; }
}

// ==========================================
// 2. VIEW (Logika Tampilan)
// ==========================================
class KendaraanView {
    public function tampilkanDaftar($daftarKendaraan) {
        echo "<h3>Daftar Kendaraan (MVC Pattern)</h3>";
        foreach ($daftarKendaraan as $k) {
            printf("Merek : %s <br/>", $k->GetMerek());
            printf("Jumlah Roda : %s <br/>", $k->GetJumlahRoda());
            printf("Harga : %s <br/>", $k->GetHarga());
            printf("Warna : %s <br/>", $k->GetWarna());
            printf("Bahan Bakar : %s <br/><br/>", $k->GetBhnBakar());
        }
    }
}

// ==========================================
// 3. CONTROLLER (Logika Alur Program)
// ==========================================
class KendaraanController {
    public function index() {
        // Menyiapkan data (biasanya dari Database, di sini dari Array)
        $data = [
            new Kendaraan("Yamaha Mio", 2, 10000000, "Merah", "Premium"),
            new Kendaraan("Toyota Yaris", 4, 160000000, "Merah", "Premium"),
            new Kendaraan("Honda Scoopy", 2, 13000000, "Putih", "Premium"),
            new Kendaraan("Isuzu Panther", 4, 170000000, "Merah", "Solar")
        ];

        // Memanggil View untuk menampilkan data
        $view = new KendaraanView();
        $view->tampilkanDaftar($data);
    }
}

// ==========================================
// EKSEKUSI (Entry Point)
// ==========================================
$controller = new KendaraanController();
$controller->index();

?>