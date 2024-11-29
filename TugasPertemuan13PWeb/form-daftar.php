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
    </style>
</head>

<body>
    <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
        <header>
            <h3>Formulir Pendaftaran Siswa Baru</h3>
        </header>
        <fieldset>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" placeholder="Nama lengkap" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" rows="3" placeholder="Alamat lengkap" required></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="radio-group">
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <select name="agama" required>
                    <option value="" disabled selected>Pilih agama</option>
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal:</label>
                <input type="text" name="sekolah_asal" placeholder="Nama sekolah" required />
            </div>
            <div class="form-group">
                <label for="foto">Upload Foto:</label>
                <input type="file" name="foto" required />
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <input type="submit" value="Daftar" name="daftar" />
            </div>
        </fieldset>
    </form>
</body>
</html>
