<?php 
// create Database Connection using Config file
include_once("config.php");
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
    
    <table width="80%" border="1" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td colspan="4" align="center">
                <a href="create.php">Add New User</a>
            </td>
        </tr>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>More</th>
        </tr>
        <?php 
        // read
        $queryRead = "SELECT * FROM users ORDER BY id DESC";
        $read = mysqli_query($connection, $queryRead);
        while ($userData = mysqli_fetch_array($read)) {
            $id = $userData['id'];
            $name = $userData['name'];
            $email = $userData['email'];
            $mobile = $userData['mobile'];
        ?>
        <tr align="center">
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $mobile; ?></td>
            <td>
                <a href="update.php?id=<?php echo $id ?>">Update</a>
                <a href="delete.php?id=<?php echo $id ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>