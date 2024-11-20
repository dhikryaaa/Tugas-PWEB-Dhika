<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // buat query
    $sql = "INSERT INTO pegawai (nama, jabatan, jenis_kelamin, agama, email, alamat) VALUE ('$nama', '$jabatan', '$jk', '$agama', '$email', '$alamat')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>