<?php
include "../config/database.php";
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: ../book/index.php");
    } else {
        // echo "<script>alert('Username atau password salah');</script>";
    }
}
?>

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
<form method="POST">
    <div class="loginForm" style="background-color:#ffffffcc; border-radius:10px;">
        <img src="boykisser.gif" width="100px" alt="Logo" class="gif">
            <h2>Login</h2>
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
        <br>
        <div class="center">
                <button name="login">Login</button>

        </div>
        <div class="center"> Belum punya akun? 
                <a href="register.php">Register</a>

        </div>
    </div>
</form>
