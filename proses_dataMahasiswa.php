<?php
/**
 * FILE: proses_dataMahasiswa.php
 */

// 1. Method untuk menentukan status kelulusan (Latihan Array/Method)
function cekKelulusan($nilai) {
    if ($nilai >= 60) {
        return "Lulus Kuis";
    } else {
        return "Tidak Lulus Kuis";
    }
}

// 2. Mengecek apakah ada data yang dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Mengumpulkan data ke dalam Array Multidimensi
    // Catatan: Karena di form kamu nama inputnya campur (nama, nama2, nama3), 
    // tapi 'kelas', 'mata kuliah', dan 'nilai' namanya sama semua, 
    // PHP biasanya hanya mengambil input yang terakhir.
    
    // Agar rapi, kita petakan berdasarkan urutan di form kamu:
    $daftar_mahasiswa = [
        [
            "nama"   => $_POST['nama'] ?? '-',
            "kelas"  => $_POST['kelas'] ?? '-',
            "matkul" => $_POST['mata_kuliah'] ?? '-', // PHP merubah spasi jadi underscore
            "nilai"  => $_POST['nilai'] ?? 0
        ],
        [
            "nama"   => $_POST['nama2'] ?? '-',
            "kelas"  => $_POST['kelas'] ?? '-', 
            "matkul" => $_POST['mata_kuliah'] ?? '-',
            "nilai"  => $_POST['nilai2'] ?? 0
        ],
        [
            "nama"   => $_POST['nama3'] ?? '-',
            "kelas"  => $_POST['kelas'] ?? '-',
            "matkul" => $_POST['mata_kuliah'] ?? '-',
            "nilai"  => $_POST['nilai3'] ?? 0
        ]
    ];

    echo "<h1>Hasil Data Nilai Mahasiswa</h1>";

    // 4. Looping untuk menampilkan data sesuai format gambar latihan
    foreach ($daftar_mahasiswa as $mhs) {
        // Lewati jika nama kosong agar tidak menampilkan data kosong
        if ($mhs['nama'] == '-') continue;

        echo "Nama : " . $mhs['nama'] . "<br>";
        echo "Kelas : " . $mhs['kelas'] . "<br>";
        echo "Mata Kuliah : " . $mhs['matkul'] . "<br>";
        echo "Nilai : " . $mhs['nilai'] . "<br>";
        
        // Memanggil method/fungsi
        echo "<strong>" . cekKelulusan($mhs['nilai']) . "</strong><br>";
        echo "<hr>";
    }
} else {
    echo "Silahkan isi form terlebih dahulu.";
}
?>