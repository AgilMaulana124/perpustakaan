<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

<div style="text-align: center; margin-top: 50px;">
    <table style="margin: auto; text-align: center;">
        <tr>
            
    <img src="assets/boykisser.gif" width="150px" alt="Logo" class="gif" style="text-align: center;">
    <h2 style="color: white">Selamat Datang, <?= htmlspecialchars($_SESSION['user']) ?></h2>
        </tr>
        <tr>
<div style="text-align: center; margin-top: 20px; padding: 20px; background-color: #ffffffcc; border-radius: 10px;">
    <button><a href="book/index.php">Kelola Buku</a></button><br><br>
    <button><a href="auth/logout.php">Logout</a></button>
</div>
            
        </tr>
    </table>
</div>

<br>
</h2>


</body>
</html>
