<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $path = "images/".$foto;

    if(move_uploaded_file($tmp, $path)){
        // buat query update
        $sql = "UPDATE pendaftar SET nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jk', agama = '$agama', sekolah_asal = '$sekolah', foto = '$foto' WHERE id = $id";
        $query = mysqli_query($db, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: list-siswa.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
   } else {
        echo("Gambar gagal diupload");
   }
   
} else {
    die("Akses dilarang...");
}

?>