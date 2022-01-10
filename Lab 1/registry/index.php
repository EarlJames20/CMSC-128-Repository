<?php

    include_once("connections/connection.php");
    $con = connection();

    $sql = "SELECT * FROM persons_list";
    $persons = $con->query($sql) or die ($con->error);
    $row = $persons->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter and Account Registry System</title>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Newsletter and Account Registry System</h1>
    </br>
    </br>
    <div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Delete?</th>
            </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><a href="deletenewsletter.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php }while($row = $persons->fetch_assoc()) ?>
        </tbody>
    </table>
    <br>

    <?php
        $sql = "SELECT * FROM accounts_list";
        $persons = $con->query($sql) or die ($con->error);
        $row = $persons->fetch_assoc();
    ?>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Delete?</th>
            </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><a href="deleteaccount.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
        </tr>
        <?php }while($row = $persons->fetch_assoc()) ?>
        </tbody>
    </table>

    <div name="return-link">
        </br>
        <a href="login.php">Return to log in page</a>
    </div>

</body>
</html>