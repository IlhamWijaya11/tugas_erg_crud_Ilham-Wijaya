<html>
<head>
    <title>Tambahkan Menu</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <a href="index.php">Kembali ke daftar menu</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Makanan</td>
                <td><input type="text" name="Makanan"></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="Harga"></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><input type="text" name="Deskripsi"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $Makanan = $_POST['Makanan'];
        $Harga = $_POST['Harga'];
        $Deskripsi = $_POST['Deskripsi'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(Makanan,Harga,Deskripsi) VALUES('$Makanan','$Harga','$Deskripsi')");

        // Show message when user added
        echo "Menu berhasil ditambahkan Terima Kasih!. <a href='index.php'>Lihat Menu</a>";
    }
    ?>
</body>
</html>