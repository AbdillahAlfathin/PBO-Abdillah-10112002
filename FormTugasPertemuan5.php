<!DOCTYPE html>
<html>
<head>
    <title>Tugas PBO - Sistem Kasir</title>
</head>
<body>
    <h2>Sistem Perhitungan Diskon</h2>
    <form method="post" action="TugasPertemuan5.php">
    <form method="POST">
        Punya Kartu Member? 
        <select name="punyaKartu">
            <option value="tidak">Tidak</option>
            <option value="ya">Ya</option>
        </select><br><br>
        
        Total Belanjaan: 
        <input type="number" name="totalBelanja" required><br><br>
        
        <button type="submit" name="hitung">Hitung Total</button>
    </form>
</body>
</html>