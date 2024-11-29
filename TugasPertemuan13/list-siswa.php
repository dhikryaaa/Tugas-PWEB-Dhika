<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Gundam Academy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header h3 {
            text-align: center;
            color: #004080;
        }
        nav {
            width: 80%;
            margin: 20px auto;
            text-align: left;
        }
        nav a {
            display: inline-block;
            text-decoration: none;
            padding: 8px 15px;
            background-color: #004080;
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
            margin-right: 10px;
        }
        nav a:hover {
            background-color: #003366;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        .button-blue {
            text-decoration: none;
            padding: 5px 10px;
            color: #ffffff;
            background-color: #004080;
            border-radius: 3px;
        }
        .button-blue:hover {
            background-color: #003366;
        }
        .button-red {
            text-decoration: none;
            padding: 5px 10px;
            color: #ffffff;
            background-color: #ff0000;
            border-radius: 3px;
        }
        .button-red:hover {
            background-color: #cc0000;
        }
    </style>
    <script type="text/javascript">
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">Tambah Baru</a>
        <a href="phptopdf.php" target="_blank">Cetak Pendaftar</a> <!-- New Print Button -->
    </nav>

    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Sekolah Asal</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM pendaftar";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['id']."</td>";
            echo "<td><img src='images/".$siswa['foto']."' width='100' height='100'></td>";
            echo "<td>".$siswa['nama']."</td>";
            echo "<td>".$siswa['alamat']."</td>";
            echo "<td>".$siswa['jenis_kelamin']."</td>";
            echo "<td>".$siswa['agama']."</td>";
            echo "<td>".$siswa['sekolah_asal']."</td>";

            echo "<td>";
            // Add onclick event to confirm deletion
            echo "<a href='form-edit.php?id=".$siswa['id']."' class='button-blue'>Edit</a> | ";
            echo "<a href='hapus-pendaftar.php?id=".$siswa['id']."' class='button-red' onclick='return confirmDelete()'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p style="text-align: center;">Total: <?php echo mysqli_num_rows($query) ?></p>

</body>
</html>