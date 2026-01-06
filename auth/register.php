<?php
include "../config/database.php";

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (strlen($password) < 6) {
        echo "<script>alert('Password minimal 6 karakter');</script>";
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hash);

    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "<script>alert('Username sudah digunakan');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    
<style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;  /* horizontal */
        align-items: center;      /* vertical */
        background: linear-gradient(135deg, #667eea, #764ba2);
    }
    table {
        margin-bottom: 10px;
    }
    th {
        text-align: left;
        padding-right: 10px;
    }
    .loginForm {
    border: 1px solid #ccc;
    padding: 20px 30px;
    text-align: center;
    }
    .center {
    padding: 5px;;
    text-align: center;
    }
    button{
        background: linear-gradient(135deg, #ea66e8ff, #ff1058ff);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div class="loginForm" style="background-color:#ffffffcc; border-radius:10px;">
        <img src="boykisser.gif" width="100px" alt="Logo" class="gif">
        <h2>Register</h2>

        <form method="POST">
            <table>
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" required></td>
                </tr>
            </table>

            <div class="center">
                <button type="submit" name="register">Daftar</button>
            </div>
        </form>

        <div class="center">
            Sudah punya akun? <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>
