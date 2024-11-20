<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // buat query update
    $sql = "UPDATE pegawai SET nama = '$nama', jabatan = '$jabatan', jenis_kelamin = '$jk', agama = '$agama', email = '$email', alamat = '$alamat' WHERE id = $id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-pegawai.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>