<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['currenttime']);
    
    if(isset($_POST['login'])){
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Expired</title>

    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <section>
        <h1>You have been automatically logged out due to inactivity</h1>
    <form action="" method="post">
    <button type="submit" name="login">Back to log in page</button>
    </form>
    </section>
</body>
</html>