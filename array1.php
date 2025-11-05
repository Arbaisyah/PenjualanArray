<?php
echo "<h2 style='text-align:center;'>-- POLGAN MART --</h2>";

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
echo "<h3>Daftar Barang yang Dibeli:</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse:collapse; width:80%;'>";
echo "<tr style='background-color:#f2f2f2;'>
        <th>Kode Jual</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
        <th>Total</th>
      </tr>";

// Loop tampilkan data barang + beli acak
$no_jual = 1;
foreach ($barang as $b) {
    $kode_jual = "J" . str_pad($no_jual, 3, "0", STR_PAD_LEFT);
    $jumlah_beli = rand(1, 10); // jumlah acak
    $subtotal = $b[2] * $jumlah_beli;

    // Simpan data
    $beli[] = $jumlah_beli;
    $total[] = $subtotal;
    $grand_total += $subtotal;

    // Tampilkan baris barang
    echo "<tr>
            <td align='center'>$kode_jual</td>
            <td align='center'>{$b[0]}</td>
            <td>{$b[1]}</td>
            <td align='right'>Rp " . number_format($b[2], 0, ',', '.') . "</td>
            <td align='center'>$jumlah_beli</td>
            <td align='right'>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
          </tr>";

    $no_jual++;
}

// Tambahkan baris Grand Total di dalam tabel
echo "<tr style='background-color: #f9f9f9; font-weight: bold;'>
        <td colspan='5' align='center'>Grand Total</td>
        <td align='right'>Rp " . number_format($grand_total, 0, ',', '.') . "</td>
      </tr>";

echo "</table>";

// Tambahan pemisah & pesan akhir
echo "<hr style='width:80%; margin-top:20px;'>";
echo "<p style='text-align:center; font-weight:bold;'>Total Belanja Anda: Rp " . number_format($grand_total, 0, ',', '.') . "</p>";
echo "<p style='text-align:center; font-style:italic;'>Terima kasih sudah berbelanja di POLGAN MART 💖</p>";
?>
