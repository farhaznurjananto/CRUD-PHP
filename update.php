<?php 
// include Database Connection file
include_once("config.php");

// variable
$success = "";
$error = "";

// display selected user data based on id
$id = $_GET['id'];
$queryRead = "SELECT * FROM users WHERE id = '$id'";
$read = mysqli_query($connection, $queryRead);
while ($userData = mysqli_fetch_array($read)){
    $name = $userData['name'];
    $email = $userData['email'];
    $mobile = $userData['mobile'];
}

// check if form is submitted for user update. then redirect to homepage after update
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // validate form submission
    if ($name && $email && $mobile) {
        // update user data
        $queryUpdate = "UPDATE users SET name = '$name', email = '$email', mobile = '$mobile' WHERE id = '$id'";
        $update = mysqli_query($connection, $queryUpdate);
        if ($update) {
            $success = "Data User Berhasil Diupdate";
        } else {
            $error = "Data User Gagal Diupdate!";
        }
    } else {
        $error = "Silahkan Masukkan Semua Data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-PHP</title>
</head>
<body>
    
    <form action="" method="post" name="update">
        <table width="50%" border="1" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td colspan="2" align="center">
                    <a href="index.php">Go to Home</a>
                </td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input size="80%" type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input size="80%" type="email" name="email" value=<?php echo $email; ?>></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><input size="80%" type="number" name="mobile" value=<?php echo $mobile; ?>></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input align="center" type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                    <input type="submit" name="submit" value="update">
                </td>
            </tr>
        </table>

        <!-- form validation -->
        <div class="form-validation" align="center">
            <?php if ($success) { ?>
                <span><?php echo $success ?></span>
            <?php header("refresh:1,url=index.php"); } else { ?>
                <span><?php echo $error ?></span>
            <?php } ?>
        </div>
    </form>
</body>
</html>