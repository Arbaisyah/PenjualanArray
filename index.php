<?php
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Proses login saat form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Login sederhana (username: admin, password: 123)
    if ($username === 'admin' && $password === '123') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'Dosen';
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POLGAN MART</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }

        h2 {
            color: #1e40af;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 15px;
            transition: 0.2s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #1e40af;
            background-color: #eef3ff;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #1e40af;
            color: white;
        }

        button[type="reset"] {
            background-color: #f9f9f9;
            color: #333;
            border: 1px solid #ddd;
        }

        button[type="submit"]:hover {
            background-color: #1d4ed8;
        }

        button[type="reset"]:hover {
            background-color: #f1f1f1;
        }

        .error {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 8px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .footer {
            font-size: 12px;
            color: #888;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>POLGAN MART</h2>

        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

        <form method="post">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
            <button type="reset">Batal</button>
        </form>

        <div class="footer">© 2025 POLGAN MART</div>
    </div>

</body>
</html>
