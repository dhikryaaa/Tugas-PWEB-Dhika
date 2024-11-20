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
        // JavaScript function to confirm deletion
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</head>

<body>
    <header>
        <h3>List Pegawai Academy</h3>
    </header>

    <nav>
        <a href="form-pegawai.php">Tambah Baru</a>
    </nav>

    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM pegawai";
        $query = mysqli_query($db, $sql);

        while($pegawai = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$pegawai['id']."</td>";
            echo "<td>".$pegawai['nama']."</td>";
            echo "<td>".$pegawai['jabatan']."</td>";
            echo "<td>".$pegawai['jenis_kelamin']."</td>";
            echo "<td>".$pegawai['agama']."</td>";
            echo "<td>".$pegawai['email']."</td>";
            echo "<td>".$pegawai['alamat']."</td>";
            echo "<td>";
            // Add onclick event to confirm deletion
            echo "<a href='edit-pegawai.php?id=".$pegawai['id']."' class='button-blue'>Edit</a> | ";
            echo "<a href='hapus-pegawai.php?id=".$pegawai['id']."' class='button-red' onclick='return confirmDelete()'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p style="text-align: center;">Total: <?php echo mysqli_num_rows($query) ?></p>

</body>
</html>
