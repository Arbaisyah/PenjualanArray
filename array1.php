<?php
echo "<h2>-- POLGAN MART --</h2>";

// Data barang
$barang = [
    ["B001", "Pensil", 2000],
    ["B002", "Buku Tulis", 5000],
    ["B003", "Penghapus", 1500],
    ["B004", "Pulpen", 3000],
    ["B005", "Spidol", 4500],
];

// Acak urutan barang
shuffle($barang);

// Variabel untuk menyimpan total-total
$beli = [];
$total = [];
$grand_total = 0;

// Tampilkan tabel
echo "<h3>Daftar Barang Yg dibeli:</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Kode</th>
        <th>Nama Barang</th>
        <th>Harga (Rp)</th>
        <th>Jumlah Beli</th>
        <th>Total (Rp)</th>
      </tr>";

// Loop tampilkan data barang + beli acak
foreach ($barang as $b) {
    $jumlah_beli = rand(1, 10); // jumlah acak
    $subtotal = $b[2] * $jumlah_beli;

    // Simpan data
    $beli[] = $jumlah_beli;
    $total[] = $subtotal;
    $grand_total += $subtotal;

    // Tampilkan baris barang
    echo "<tr>
            <td>{$b[0]}</td>
            <td>{$b[1]}</td>
            <td align='right'>{$b[2]}</td>
            <td align='center'>$jumlah_beli</td>
            <td align='right'>$subtotal</td>
          </tr>";
}

// Tambahkan baris Grand Total di dalam tabel
echo "<tr style='background-color: #f2f2f2; font-weight: bold;'>
        <td colspan='4' align='center'>Grand Total</td>
        <td align='right'>Rp $grand_total</td>
      </tr>";

echo "</table>";
?>
