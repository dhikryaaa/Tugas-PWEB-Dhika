<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $path = "images/".$foto;

   if(move_uploaded_file($tmp, $path)){
        // buat query
        $sql = "INSERT INTO pendaftar (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$foto')";
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
        echo("Gambar gagal diupload");
   }

} else {
    die("Akses dilarang...");
}

?>