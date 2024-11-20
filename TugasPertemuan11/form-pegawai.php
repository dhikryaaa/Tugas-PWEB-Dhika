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
            align-items: center;
            margin-bottom: 15px;
        }
        label {
            width: 120px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        textarea,
        select {
            flex: 1;
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
    <form action="proses-pegawai.php" method="POST">
        <header>
            <h3>Formulir Pendataan Pegawai</h3>
        </header>
        <fieldset>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" placeholder="Nama lengkap" required />
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" name="jabatan" placeholder="Jabatan pegawai" required />
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
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email pegawai" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" rows="3" placeholder="Alamat lengkap" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Daftar" name="daftar" />
            </div>
        </fieldset>
    </form>
</body>
</html>
