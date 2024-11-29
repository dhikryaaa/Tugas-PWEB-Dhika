<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pendaftar WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gundam Academy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #ffffff;
        }
        form {
            width: 400px;
            border: 2px solid #004080;
            border-radius: 8px;
            padding: 20px;
            background-color: #ffffff;
            box-sizing: border-box;
        }
        header h3 {
            color: #004080;
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }
        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .radio-group {
            display: flex;
            justify-content: space-between;
        }
        .radio-group label {
            font-weight: normal;
            color: #333;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #004080;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #003366;
        }
        .form-group img {
            display: block;
            margin: 10px 0;
            max-width: 25%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <form action="proses-edit.php" method="POST" enctype="multipart/form-data">
        <header>
            <h3>Formulir Edit Siswa</h3>
        </header>
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" placeholder="Nama lengkap" value="<?php echo $siswa['nama'] ?>" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" rows="3" placeholder="Alamat lengkap" required><?php echo $siswa['alamat'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="radio-group">
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <label>
                        <input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>>
                        Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>>
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <?php $agama = $siswa['agama']; ?>
                <select name="agama" required>
                    <option value="Islam" <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                    <option value="Kristen" <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                    <option value="Hindu" <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                    <option value="Budha" <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal:</label>
                <input type="text" name="sekolah_asal" placeholder="Nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" required />
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <img src="images/<?php echo $siswa['foto'] ?>" alt="Foto Siswa" />
                <input type="file" name="foto">
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" name="simpan" />
            </div>
        </fieldset>
    </form>
</body>
</html>