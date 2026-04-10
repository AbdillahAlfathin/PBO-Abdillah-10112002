<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Penggajian - Vinn</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; display: flex; justify-content: center; padding: 40px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 450px; }
        h2 { text-align:center; color: #2c3e50; margin-bottom: 25px; border-bottom: 2px solid #2ecc71; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; color: #34495e; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .row { display: flex; gap: 10px; }
        button { width: 100%; padding: 12px; background: #2ecc71; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; margin-top: 10px; transition: 0.3s; }
        button:hover { background: #27ae60; }
    </style>
</head>
<body>

<div class="card">
    <h2>Input Data Pegawai</h2>
    <form action="TugasPertemuan7_Proses.php" method="POST">
        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="text" name="nama" required placeholder="Masukkan nama...">
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <select name="jabatan" id="jabatan" onchange="toggleExtra()" required>
                <option value="Programmer">Programmer</option>
                <option value="Direktur">Direktur</option>
                <option value="Mingguan">Pegawai Mingguan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Gaji Dasar (Rp)</label>
            <input type="number" name="gaji" required placeholder="8000000">
        </div>
        <div class="row">
            <div class="form-group" style="flex:1">
                <label>Masa Kerja (Thn)</label>
                <input type="number" name="thn" value="0" min="0">
            </div>
            <div class="form-group" style="flex:1">
                <label>Masa Kerja (Bln)</label>
                <input type="number" name="bln" value="0" min="0" max="11">
            </div>
        </div>
        <div id="mingguan_fields" style="display:none; background: #f9f9f9; padding: 15px; border-radius: 6px; border-left: 4px solid #2ecc71;">
            <label>Harga Barang</label>
            <input type="number" name="harga">
            <label style="margin-top:10px">Target Stock</label>
            <input type="number" name="target">
            <label style="margin-top:10px">Total Terjual</label>
            <input type="number" name="terjual">
        </div>
        <button type="submit" name="submit">Proses & Hitung Gaji</button>
    </form>
</div>

<script>
function toggleExtra() {
    let jabatan = document.getElementById('jabatan').value;
    document.getElementById('mingguan_fields').style.display = (jabatan === 'Mingguan') ? 'block' : 'none';
}
</script>
</body>
</html>