<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $Makanan=$_POST['Makanan'];
    $Harga=$_POST['Harga'];
    $Deskripsi=$_POST['Deskripsi'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET Makanan='$Makanan',Harga='$Harga',Deskripsi='$Deskripsi' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $Makanan = $user_data['Makanan'];
    $Harga = $user_data['Harga'];
    $Deskripsi = $user_data['Deskripsi'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Makanan</td>
                <td><input type="text" name="Makanan" value=<?php echo $Makanan;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="Harga" value=<?php echo $Harga;?>></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><input type="text" name="Deskripsi" value=<?php echo $Deskripsi;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>