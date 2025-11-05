<?php
echo "<!DOCTYPE html>
<html lang='id'>
<head>
<meta charset='UTF-8'>
<title>POLGAN MART</title>
<style>
    * {
        box-sizing: border-box;
    }
    body {
        font-family: 'Poppins', Arial, sans-serif;
        background: linear-gradient(135deg, #f0f9ff, #e0f7f4);
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        color: #333;
    }
    .container {
        width: 85%;
        max-width: 900px;
        background: #ffffffee;
        backdrop-filter: blur(6px);
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        padding: 25px 30px 35px;
        text-align: center;
        animation: fadeIn 0.8s ease;
    }
    h2 {
        color: #00695c;
        margin-bottom: 5px;
    }
    h3 {
        color: #444;
        margin-bottom: 15px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 15px;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #eee;
        text-align: center;
        font-size: 14px;
    }
    th {
        background-color: #a7ffeb;
        color: #004d40;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .total-row {
        background-color: #e3f2fd;
        font-weight: bold;
    }
    .diskon-row {
        background-color: #fff8e1;
        font-weight: bold;
        color: #795548;
    }
    .final-row {
        background-color: #c8e6c9;
        font-weight: bold;
        color: #1b5e20;
    }
    .summary-box {
        margin-top: 10px;
        padding: 15px;
        background: linear-gradient(135deg, #e8f5e9, #d0f8ce);
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    }
    .summary-box h3 {
        margin: 0;
        color: #2e7d32;
    }
    .summary-box p {
        margin: 5px 0;
    }
    .amount {
        font-size: 22px;
        font-weight: bold;
        color: #006400;
    }
    footer {
        margin-top: 10px;
        font-style: italic;
        color: #555;
        font-size: 14px;
    }
    .print-btn {
        margin-top: 15px;
        background-color: #00bfa5;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        font-size: 14px;
    }
    .print-btn:hover {
        background-color: #009688;
        transform: scale(1.05);
    }
    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(10px);}
        to {opacity: 1; transform: translateY(0);}
    }
    @media print {
        body {
            background: white;
            margin: 0;
        }
        .print-btn {
            display: none;
        }
        .container {
            box-shadow: none;
            width: 100%;
            margin: 0;
            border-radius: 0;
        }
    }
</style>
</head>
<body>";

echo "<div class='container' id='nota'>";
echo "<h2>🛍️ POLGAN MART 🛍️</h2>";
echo "<h3>Daftar Barang yang Dibeli</h3>";

// Data barang
$barang = [
    ['B001', 'Pensil', 2000],
    ['B002', 'Buku Tulis', 5000],
    ['B003', 'Penghapus', 1500],
    ['B004', 'Pulpen', 3000],
    ['B005', 'Spidol', 4500],
];

// Acak urutan
shuffle($barang);

// Hitung total
$grand_total = 0;

echo "<table>
<tr>
    <th>Kode Jual</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Jumlah Beli</th>
    <th>Total</th>
</tr>";

$no_jual = 1;
foreach ($barang as $b) {
    $kode_jual = 'J' . str_pad($no_jual, 3, '0', STR_PAD_LEFT);
    $jumlah_beli = rand(1, 10);
    $subtotal = $b[2] * $jumlah_beli;
    $grand_total += $subtotal;

    echo "<tr>
        <td>$kode_jual</td>
        <td>{$b[0]}</td>
        <td style='text-align:left;'>{$b[1]}</td>
        <td style='text-align:right;'>Rp " . number_format($b[2], 0, ',', '.') . "</td>
        <td>$jumlah_beli</td>
        <td style='text-align:right;'>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
    </tr>";
    $no_jual++;
}

// Hitung diskon
$diskon = 0;
$keterangan = '';

if ($grand_total > 200000) {
    $diskon = 100000;
    $keterangan = "Diskon Rp 100.000 (total > 200.000)";
} elseif ($grand_total > 100000) {
    $diskon = $grand_total * 0.20;
    $keterangan = "Diskon 20% (total > 100.000)";
} elseif ($grand_total > 50000) {
    $diskon = 10000;
    $keterangan = "Diskon Rp 10.000 (total > 50.000)";
} else {
    $keterangan = "Tidak ada diskon";
}

$total_bayar = $grand_total - $diskon;

// Total di tabel
echo "<tr class='total-row'>
        <td colspan='5'>Grand Total</td>
        <td style='text-align:right;'>Rp " . number_format($grand_total, 0, ',', '.') . "</td>
      </tr>
      <tr class='diskon-row'>
        <td colspan='5'>Diskon</td>
        <td style='text-align:right;'>Rp " . number_format($diskon, 0, ',', '.') . "</td>
      </tr>
      <tr class='final-row'>
        <td colspan='5'>Total Bayar Setelah Diskon</td>
        <td style='text-align:right;'>Rp " . number_format($total_bayar, 0, ',', '.') . "</td>
      </tr>";

echo "</table>";

// Ringkasan bawah
echo "<div class='summary-box'>
        <h3>💵 TOTAL PEMBAYARAN 💵</h3>
        <p class='amount'>Rp " . number_format($total_bayar, 0, ',', '.') . "</p>
        <p style='font-style:italic;'>($keterangan)</p>
      </div>";

echo "<footer>Terima kasih sudah berbelanja di <strong>POLGAN MART</strong> 💖</footer>";
echo "<button class='print-btn' onclick='window.print()'>🖨️ Cetak Struk</button>";
echo "</div></body></html>";
?>
