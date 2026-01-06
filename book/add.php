<?php
include "../session.php";
include "../config/database.php";

if (isset($_POST['save'])) {
    if ($_POST['year'] < 1900) {
        die("Tahun tidak valid");
    }

    $stmt = $conn->prepare(
        "INSERT INTO books (title, author, year) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("ssi", $_POST['title'], $_POST['author'], $_POST['year']);
    $stmt->execute();
    header("Location: index.php");
}
?>
<head>
<link rel="stylesheet" href="../assets/style.css">
<title>Tambah Buku</title>
</head>

<form method="POST">
    <div style="text-align: center; margin-top: 20px;">
        <img src="../assets/boykisser.gif" width="150px" alt="Logo" class="gif">
    </div>
    <div style="background-color: #ebeeffff; padding: 20px; border-radius: 10px; margin-top: 10px;">
        
    <h2 style="text-align: center">Tambah Buku</h2>
    <table>
        <tr>
            <th>Title</th>
            <td><input name="title" required></td>
        </tr>
        <tr>
            <th>Author</th>
            <td><input name="author" required></td>
        </tr>
        <tr>
            <th>Year</th>
            <td><input name="year" type="number" required></td>
        </tr>
    </table> 
        <div style="text-align: center; margin-top: 20px;">
            <button name="save">Simpan</button>
        </div>
    </div>
</form>
