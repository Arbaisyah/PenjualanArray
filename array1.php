<?php
echo "<h2>-- POLGAN MART --</h2>";

// Data barang (array multidimensi biar rapi)
$barang = [
    ["B001", "Pensil", 2000],
    ["B002", "Buku Tulis", 5000],
    ["B003", "Penghapus", 1500],
    ["B004", "Pulpen", 3000],
    ["B005", "Spidol", 4500],
];

// Acak urutan daftar barang
shuffle($barang);

// Tampilkan daftar barang yang sudah diacak
echo "<h3>Daftar Barang :</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Kode</th><th>Nama Barang</th><th>Harga (Rp)</th></tr>";

foreach ($barang as $b) {
    echo "<tr>
            <td>{$b[0]}</td>
            <td>{$b[1]}</td>
            <td>{$b[2]}</td>
          </tr>";
}

echo "</table>";
?>


