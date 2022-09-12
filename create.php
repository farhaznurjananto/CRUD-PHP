<?php 
// include Database Connection file
include_once("config.php");

// variable
$success = "";
$error = "";

// check if form submitted, insert form into user table
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    
    // validate form submission
    if ($name && $email && $mobile) {
        // insert user data into table
        $queryCreate = "INSERT INTO users(name, email, mobile) VALUES('$name', '$email', '$mobile')";
        $create = mysqli_query($connection, $queryCreate);
        if ($create) {
            $success = "User Baru Berhasil Dimasukkan";
        } else {
            $error = "User Baru Gagal Dimasukkan!";
        }
    } else {
        $error = "Silahkan Masukkan Semua Data";
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
    
    <form action="" method="post" name="create">
        <table width="50%" border="1" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td colspan="2" align="center">
                    <a href="index.php">Go to Home</a>
                </td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input size="80%" type="text" name="name" placeholder="your name..."></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input size="80%" type="email" name="email" placeholder="your email..."></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><input size="80%" type="number" name="mobile" placeholder="your mobile..."></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="create">
                </td>
            </tr>
        </table>

        <!-- form validation -->
        <div class="form-validation" align="center">
            <?php if ($success) { ?>
                <span><?php echo $success ?></span>
            <?php } else { ?>
                <span><?php echo $error ?></span>
            <?php }?>
        </div>
    </form>
</body>
</html>