<?php
// ==========================================
// 1. CLASS LOGIKA (Tetap di dalam proses.php)
// ==========================================
class Employee {
    public $nama, $gajiDasar, $masaKerjaTotal;
    public function __construct($n, $g, $thn, $bln) {
        $this->nama = $n;
        $this->gajiDasar = $g;
        $this->masaKerjaTotal = $thn + ($bln / 12);
    }
}

class Programmer extends Employee {
    public function hitungGaji() {
        $bonus = 0;
        if ($this->masaKerjaTotal >= 1 && $this->masaKerjaTotal <= 10) {
            $bonus = 0.01 * $this->masaKerjaTotal * $this->gajiDasar;
        } elseif ($this->masaKerjaTotal > 10) {
            $bonus = 0.02 * $this->masaKerjaTotal * $this->gajiDasar;
        }
        return $this->gajiDasar + $bonus;
    }
}

class Direktur extends Employee {
    public function hitungGaji() {
        $bonus = 0.5 * $this->masaKerjaTotal * $this->gajiDasar;
        $tunjangan = 0.1 * $this->masaKerjaTotal * $this->gajiDasar;
        return $this->gajiDasar + $bonus + $tunjangan;
    }
}

class PegawaiMingguan extends Employee {
    public $harga, $target, $terjual;
    public function __construct($n, $g, $thn, $bln, $harga, $target, $terjual) {
        parent::__construct($n, $g, $thn, $bln);
        $this->harga = $harga; $this->target = $target; $this->terjual = $terjual;
    }
    public function hitungGaji() {
        $persen = ($this->target > 0) ? ($this->terjual / $this->target) * 100 : 0;
        $bonus = ($persen > 70) ? (0.10 * $this->harga * $this->terjual) : (0.03 * $this->harga * $this->terjual);
        return $this->gajiDasar + $bonus;
    }
}

// ==========================================
// 2. LOGIKA PENERIMAAN DATA & TAMPILAN
// ==========================================
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gaji = (float)$_POST['gaji'];
    $thn = (int)$_POST['thn'];
    $bln = (int)$_POST['bln'];

    if ($jabatan == "Programmer") {
        $objek = new Programmer($nama, $gaji, $thn, $bln);
    } elseif ($jabatan == "Direktur") {
        $objek = new Direktur($nama, $gaji, $thn, $bln);
    } else {
        $objek = new PegawaiMingguan($nama, $gaji, $thn, $bln, $_POST['harga'], $_POST['target'], $_POST['terjual']);
    }

    $total = $objek->hitungGaji();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan Gaji</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .receipt { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 380px; border-top: 10px solid #2ecc71; }
        h3 { text-align: center; color: #2c3e50; margin-top: 0; }
        .line { border-bottom: 2px dashed #eee; margin: 15px 0; }
        .row { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; color: #7f8c8d; }
        .label { font-weight: bold; color: #2c3e50; }
        .total-box { background: #f9f9f9; padding: 15px; border-radius: 8px; text-align: center; margin-top: 20px; }
        .total-box h2 { margin: 0; color: #27ae60; font-size: 24px; }
        
        /* KODINGAN TOMBOL KEMBALI */
        .btn-back { 
            display: block; 
            text-align: center; 
            background: #3498db; 
            color: white; 
            text-decoration: none; 
            padding: 12px; 
            border-radius: 8px; 
            font-weight: bold; 
            margin-top: 20px; 
            transition: 0.3s;
        }
        .btn-back:hover { background: #2980b9; }
    </style>
</head>
<body>

<div class="receipt">
    <h3>SLIP GAJI</h3>
    <div class="line"></div>
    
    <div class="row">
        <span class="label">Nama:</span>
        <span><?php echo $nama; ?></span>
    </div>
    <div class="row">
        <span class="label">Jabatan:</span>
        <span><?php echo $jabatan; ?></span>
    </div>
    <div class="row">
        <span class="label">Masa Kerja:</span>
        <span><?php echo "$thn Thn $bln Bln"; ?></span>
    </div>
    
    <div class="line"></div>
    
    <div class="total-box">
        <small>Total Gaji Akhir</small>
        <h2>Rp <?php echo number_format($total, 0, ',', '.'); ?></h2>
    </div>

    <a href="TugasPertemuan7_Form.php" class="btn-back"> Kembali ke Form Input</a>
</div>

</body>
</html>

<?php
} else {
    // Jika user mencoba buka proses.php langsung tanpa isi form
    header("Location: index.php");
}
?>