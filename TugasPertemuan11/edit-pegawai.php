<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-pegawai.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pegawai WHERE id=$id";
$query = mysqli_query($db, $sql);
$pegawai = mysqli_fetch_assoc($query);

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
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        textarea,
        select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .radio-group label {
            display: inline-block;
            margin-right: 10px;
            font-weight: normal;
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
    </style>
</head>

<body>
    <form action="proses-edit-pegawai.php" method="POST">
        <header>
            <h3>Edit Data Pegawai</h3>
        </header>
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $pegawai['id'] ?>" />

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $pegawai['nama'] ?>" required />
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" name="jabatan" placeholder="Jabatan Pegawai" value="<?php echo $pegawai['jabatan'] ?>" required />
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="radio-group">
                    <?php $jk = $pegawai['jenis_kelamin']; ?>
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <?php $agama = $pegawai['agama']; ?>
                <select name="agama" required>
                    <option value="Islam" <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                    <option value="Kristen" <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                    <option value="Hindu" <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                    <option value="Budha" <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="Alamat Email" value="<?php echo $pegawai['email'] ?>" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" rows="3" placeholder="Alamat Lengkap" required><?php echo $pegawai['alamat'] ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" name="simpan" />
            </div>
        </fieldset>
    </form>
</body>
</html>