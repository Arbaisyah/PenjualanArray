<?php
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'admin'; 
    $_SESSION['role'] = 'Dosen';
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard - POLGAN MART</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f0f9ff, #e0f7f4);
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow: hidden;
        color: #333;
    }
    header {
        background: #1e40af;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 25px;
        font-size: 16px;
    }
    header h1 {
        font-size: 20px;
        letter-spacing: 1px;
    }
    header .user-info {
        font-size: 14px;
    }
    header .user-info a {
        color: #ffd700;
        text-decoration: none;
        margin-left: 10px;
        font-weight: bold;
    }
    main {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding: 10px 20px;
    }
    h2 {
        color: #00695c;
        margin-bottom: 8px;
    }
    table {
        width: 95%;
        border-collapse: collapse;
        background: #ffffffee;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        font-size: 13px;
    }
    th, td {
        padding: 6px 8px;
        border-bottom: 1px solid #eee;
        text-align: center;
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
    .summary {
        margin-top: 5px;
        background: #dfffe0;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 13px;
        text-align: center;
        width: 95%;
    }
    .summary h3 {
        margin-bottom: 3px;
        color: #2e7d32;
    }
    .summary .amount {
        font-size: 18px;
        font-weight: bold;
        color: #006400;
    }
    .print-btn {
        margin-top: 5px;
        background-color: #00bfa5;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        font-size: 13px;
    }
    .print-btn:hover {
        background-color: #009688;
    }
</style>
</head>
<body>

<header>
    <h1>POLGAN MART</h1>
    <div class="user-info">
        Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?> |
        <a href="logout.php">Logout</a>
    </div>
</header>

<main>
    <h2>📦 Data Penjualan</h2>
    <table>
        <tr>
            <th>Kode Jual</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
        $barang = [
            ['B001', 'Pensil', 2000],
            ['B002', 'Buku Tulis', 5000],
            ['B003', 'Penghapus', 1500],
            ['B004', 'Pulpen', 3000],
            ['B005', 'Spidol', 4500],
            ['B006', 'Kalkulator', 10000],
            ['B006', 'Tas Ransel', 50000],
            ['B006', 'Buku Besar', 15000],
            ['B006', 'Penjepit Kertas', 5000],
        ];
        shuffle($barang);
        $grand_total = 0;
        $no = 1;
        foreach ($barang as $b) {
            $kode_jual = 'J' . str_pad($no, 3, '0', STR_PAD_LEFT);
            $jumlah = rand(1, 10);
            $subtotal = $b[2] * $jumlah;
            $grand_total += $subtotal;
            echo "<tr>
                <td>$kode_jual</td>
                <td>{$b[0]}</td>
                <td>{$b[1]}</td>
                <td>Rp " . number_format($b[2], 0, ',', '.') . "</td>
                <td>$jumlah</td>
                <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
            </tr>";
            $no++;
        }
        // Diskon
        $diskon = 0;
        if ($grand_total > 200000) {
            $diskon = 100000;
        } elseif ($grand_total > 100000) {
            $diskon = $grand_total * 0.2;
        } elseif ($grand_total > 50000) {
            $diskon = 10000;
        }
        $total_bayar = $grand_total - $diskon;
        echo "<tr class='total-row'><td colspan='5'>Grand Total</td><td>Rp " . number_format($grand_total, 0, ',', '.') . "</td></tr>";
        echo "<tr class='diskon-row'><td colspan='5'>Diskon</td><td>Rp " . number_format($diskon, 0, ',', '.') . "</td></tr>";
        echo "<tr class='final-row'><td colspan='5'>Total Bayar</td><td>Rp " . number_format($total_bayar, 0, ',', '.') . "</td></tr>";
        ?>
    </table>

    <div class="summary">
        <h3>💰 Total Pembayaran</h3>
        <p class="amount">Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></p>
        <button class="print-btn" onclick="window.print()">🖨 Cetak Struk</button>
    </div>
</main>

</body>
</html>
