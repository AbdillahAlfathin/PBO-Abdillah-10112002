<!DOCTYPE html>
<html>
<head>
    <title>Form Belanja Warung</title>

    <script>
        let nomor = 1;

        function tambahData() {
            nomor++;
            let container = document.getElementById("container");
            let div = document.createElement("div");

            div.style.border = "1px solid #ccc";
            div.style.padding = "10px";
            div.style.marginBottom = "10px";

            div.innerHTML = `
                <h4>Data ${nomor}</h4>

                Nama Pembeli<br>
                <input type="text" name="nama[]"><br><br>

                Nama Barang<br>
                <input type="text" name="barang[]"><br><br>

                Harga<br>
                <input type="number" name="harga[]"><br><br>

                Jumlah<br>
                <input type="number" name="jumlah[]"><br><br>

                Member<br>
                <select name="member[]">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
                <br><br>
            `;

            container.appendChild(div);
        }
    </script>
</head>

<body>

    <h2>Input Data Belanja</h2>

    <form method="POST" action="proses_belanjaWarung.php">
        <div id="container">
            <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                <h4>Data 1</h4>

                Nama Pembeli<br>
                <input type="text" name="nama[]"><br><br>

                Nama Barang<br>
                <input type="text" name="barang[]"><br><br>

                Harga<br>
                <input type="number" name="harga[]"><br><br>

                Jumlah<br>
                <input type="number" name="jumlah[]"><br><br>

                Member<br>
                <select name="member[]">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
        </div>

        <button type="button" onclick="tambahData()">Tambah Data</button>
        <br><br>

        <button type="submit">Proses Data</button>
    </form>

</body>
</html>