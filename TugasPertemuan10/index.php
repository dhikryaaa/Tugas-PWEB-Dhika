<!DOCTYPE html>
<html>
<head>
    <title>Gundam Academy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 20px;
            background-color: #004080; 
            color: #ffffff;
        }
        header h1 {
            color: #ffffff;
            font-size: 2.5em;
            margin: 0;
        }
        nav {
            padding: 10px 0;
            width: 200px;
            margin: 20px auto;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            margin-bottom: 10px;
        }
        nav ul li a {
            display: inline-block;
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #004080;
            border-radius: 5px;
            border: 2px solid #004080;
            transition: background-color 0.3s, color 0.3s;
        }
        nav ul li a:hover {
            background-color: #ffffff;
            color: #004080;
        }
        h4 {
            text-align: center;
            color: #004080;
            font-size: 1.5em;
            margin-top: 20px;
        }
        p {
            text-align: center;
            font-size: 1.2em;
            color: #004080;
        }
    </style>
</head>

<body>
    <header>
        <h1>Gundam Academy</h1>
    </header>

    <nav>
        <ul>
            <li><a href="form-daftar.php">Daftar Baru</a></li>
            <li><a href="list-siswa.php">Pendaftar</a></li>
        </ul>
    </nav>

    <?php if(isset($_GET['status'])): ?>
        <p>
            <?php
                if($_GET['status'] == 'sukses'){
                    echo "Pendaftaran siswa baru berhasil!";
                } else {
                    echo "Pendaftaran gagal!";
                }
            ?>
        </p>
    <?php endif; ?> 

</body>
</html>
