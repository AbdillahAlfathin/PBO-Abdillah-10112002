<?php

// 1. Class, Object, dan Properties
class KalkulatorBangunRuang {
    // Method untuk menghitung volume berdasarkan jenis bangun ruang
    // 2. Function (Method) & 4. Percabangan (Switch Case)
    public function hitungVolume($jenis, $sisi, $jariJari, $tinggi) {
        $phi = 3.14159265359;
        $volume = 0;

        switch ($jenis) {
            case "Bola":
                $volume = (4/3) * $phi * pow($jariJari, 3);
                break;
            case "Kerucut":
                $volume = (1/3) * $phi * pow($jariJari, 2) * $tinggi;
                break;
            case "Limas Segi Empat":
                // Luas alas (sisi * sisi) * tinggi / 3
                $volume = (pow($sisi, 2) * $tinggi) / 3;
                break;
            case "Kubus":
                $volume = pow($sisi, 3);
                break;
            case "Tabung":
                $volume = $phi * pow($jariJari, 2) * $tinggi;
                break;
            default:
                $volume = 0;
        }
        return $volume;
    }
}

// 3. Object Initialization
$kalkulator = new KalkulatorBangunRuang();

// 5. Array (Data Input sesuai gambar)
$daftarBangunRuang = [
    ["jenis" => "Bola", "sisi" => 0, "jari" => 7, "tinggi" => 0],
    ["jenis" => "Kerucut", "sisi" => 0, "jari" => 14, "tinggi" => 10],
    ["jenis" => "Limas Segi Empat", "sisi" => 8, "jari" => 0, "tinggi" => 24],
    ["jenis" => "Kubus", "sisi" => 30, "jari" => 0, "tinggi" => 0],
    ["jenis" => "Tabung", "sisi" => 0, "jari" => 7, "tinggi" => 10],
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas Kalkulator Bangun Ruang</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; font-family: Arial, sans-serif; }
        th { background-color: blue; color: white; padding: 10px; }
        td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Jenis Bangun Ruang</th>
            <th>Sisi</th>
            <th>Jari-jari</th>
            <th>Tinggi</th>
            <th>Volume</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // 3. Perulangan (Foreach)
        foreach ($daftarBangunRuang as $data) : 
            $hasilVolume = $kalkulator->hitungVolume($data['jenis'], $data['sisi'], $data['jari'], $data['tinggi']);
        ?>
        <tr>
            <td><?= $data['jenis']; ?></td>
            <td><?= $data['sisi']; ?></td>
            <td><?= $data['jari']; ?></td>
            <td><?= $data['tinggi']; ?></td>
            <td><?= $hasilVolume; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>