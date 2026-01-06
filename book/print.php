<?php
require_once("../fpdf186/fpdf.php");
include "../config/database.php";

$pdf = new FPDF();
$pdf->AddPage();

// Judul
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Data Buku Perpustakaan',0,1,'C');
$pdf->Ln(5);

// Header Tabel
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,10,'Judul',1);
$pdf->Cell(60,10,'Penulis',1);
$pdf->Cell(30,10,'Tahun',1);
$pdf->Ln();

// Data Tabel
$pdf->SetFont('Arial','',12);
$data = $conn->query("SELECT * FROM books");

while ($b = $data->fetch_assoc()) {
    $pdf->Cell(60,10,$b['title'],1);
    $pdf->Cell(60,10,$b['author'],1);
    $pdf->Cell(30,10,$b['year'],1);
    $pdf->Ln();
}

// Output PDF
$pdf->Output("I", "buku.pdf");
