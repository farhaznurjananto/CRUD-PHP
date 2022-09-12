<?php 
// include Database Connection file
include_once("config.php");

// variable
$success = "";
$error = "";

// get id from URL to delete that user
$id = $_GET['id'];

$queryDelete = "DELETE FROM users WHERE id = '$id'";
$delete = mysqli_query($connection, $queryDelete);
if ($delete) {
    $success = "Data User Berhasil Dihapus";
} else {
    $error = "Data User Gagal Dihapus!";
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
        <!-- form validation -->
        <div class="form-validation" align="center">
            <?php if ($success) { ?>
                <span><?php echo $success ?></span>
            <?php header("refresh:1,url=index.php"); } else { ?>
                <span><?php echo $error ?></span>
            <?php }?>
        </div>
</body>
</html>