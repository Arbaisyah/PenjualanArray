<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - POLGAN MART</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #1e40af;
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 20px;
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background-color: #2563eb;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        .navbar a:hover {
            background-color: #3b82f6;
        }

        .content {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .content h2 {
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 16px;
            color: #444;
        }

        .role {
            background-color: #e0e7ff;
            color: #1e40af;
            padding: 6px 10px;
            border-radius: 6px;
            display: inline-block;
            margin-top: 8px;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 13px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>POLGAN MART</h1>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
        <p>Anda login sebagai:</p>
        <div class="role"><?php echo htmlspecialchars($_SESSION['role']); ?></div>
    </div>

    <div class="footer">
        © 2025 POLGAN MART — Dashboard by sitiarbaisyah
    </div>

</body>
</html>
