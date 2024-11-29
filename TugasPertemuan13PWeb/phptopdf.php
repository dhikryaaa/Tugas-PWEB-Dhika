<?php
// Memanggil library FPDF
require('../phpfpdf/fpdf.php');

// Instance object dan memberikan pengaturan halaman PDF dengan orientasi landscape
$pdf = new FPDF('L', 'mm', 'A4');  // 'L' for Landscape

// Membuat halaman baru
$pdf->AddPage();

// Setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);

// Mencetak judul
$pdf->Cell(270, 7, 'GUNDAM ACADEMY', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(270, 7, 'LIST PENDAFTAR CALON SISWA GUNDAM ACADEMY', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Ln(10);

// Header tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(60, 8, 'NAMA MAHASISWA', 1, 0, 'C');
$pdf->Cell(60, 8, 'ALAMAT', 1, 0, 'C');
$pdf->Cell(40, 8, 'JENIS KELAMIN', 1, 0, 'C');
$pdf->Cell(40, 8, 'AGAMA', 1, 0, 'C');
$pdf->Cell(70, 8, 'SEKOLAH ASAL', 1, 1, 'C'); // Closing the row

// Data dari database
$pdf->SetFont('Arial', '', 10);
include 'config.php';
$sql = "SELECT * FROM pendaftar";
$mahasiswa = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($mahasiswa)) {
    // Nama Mahasiswa
    $pdf->Cell(60, 8, $row['nama'], 1, 0, 'L');

    // Alamat
    $pdf->Cell(60, 8, $row['alamat'], 1, 0, 'L');

    // Jenis Kelamin
    $pdf->Cell(40, 8, $row['jenis_kelamin'], 1, 0, 'C');

    // Agama
    $pdf->Cell(40, 8, $row['agama'], 1, 0, 'C');

    // Sekolah Asal
    $pdf->Cell(70, 8, $row['sekolah_asal'], 1, 1, 'L');
}

// Output PDF ke browser
$pdf->Output();
?>