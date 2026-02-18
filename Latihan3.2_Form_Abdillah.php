<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Pegadaian Syariah</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f4f4; }
        .box { background: white; padding: 20px; border-radius: 8px; width: 300px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #10c3e2; color: white; border: none; cursor: pointer; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="box">
        <h3>Input Pinjaman</h3>
        <form action="proses_latihan3.2_Abdillah.php" method="POST">
            <label>Besaran Pinjaman:</label>
            <input type="number" name="pinjaman" placeholder="Contoh: 1000000" required>
            <button type="submit">Hitung Sekarang</button>
        </form>
    </div>
</body>
</html>