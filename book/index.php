<?php
include "../session.php";
include "../config/database.php";

$search = $_GET['search'] ?? '';
$stmt = $conn->prepare("SELECT * FROM books WHERE title LIKE ?");
$param = "%$search%";
$stmt->bind_param("s", $param);
$stmt->execute();
$result = $stmt->get_result();
?>
<head>
<link rel="stylesheet" href="../assets/style.css">
<title>Daftar Buku</title>
</head>
<body>
<form>
<div style="text-align: center; margin-top: 20px;">
    <img src="../assets/boykisser.gif" width="150px" alt="Logo" class="gif">
</div>
<div style="background-color: #ebeeffff; padding: 20px; border-radius: 10px; margin-top: 10px;">
    <table style="align-items: center; margin: auto;">
        <tr>
            <td>
                <input name="search" placeholder="Cari buku">
            </td>
            <td>
                <button>Cari</button>
            </td>
        </tr>
    </table>
</form>
<br>
<table>
    <tr>
        <td>
            <button><a href="../index.php">Profil</a></button>
            <button><a href="add.php">Tambah Buku</a></button>
            <button><a href="print.php">Print PDF</a></button>
            <button><a href="special.php">Fitur Special</a></button>
            <button><a href="../auth/logout.php">Logout</a></button>
        </td>
    </tr>
</table>
<table border="1" style="background-color: #fff; border-collapse: collapse; width: 100%; margin-top: 10px;">
<tr><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Aksi</th></tr>
<?php while($b = $result->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($b['title']) ?></td>
<td><?= htmlspecialchars($b['author']) ?></td>
<td><?= $b['year'] ?></td>
<td>
    <a href="edit.php?id=<?= $b['id'] ?>">Edit</a>
    <a href="delete.php?id=<?= $b['id'] ?>">Hapus</a>
</td>
</tr>
<?php endwhile ?>
</table>

</div>


</body>