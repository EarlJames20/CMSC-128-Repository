<?php
    session_start();
    include_once("connections/connection.php");
    $con = connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <section>
        <h1>Hello! <br>Please log in to your account</h1>
    <form action="" method="post">
    <label>Username</label>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <label>Password</label>
    <br>
    <input type="password" name="password" id="password">
    <span class="eye" onclick="showPassword()">
        <i id="hide-on" class="fa fa-eye"></i>
        <i id="hide-off" class="fa fa-eye-slash"></i>
    </span>
    <br>
    
    <?php
        if(isset($_POST['login'])){
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql1 = "SELECT * FROM accounts_list WHERE username = '$username' AND password = '$password'";
            $user1 = $con->query($sql1) or die ($con->error);
            $row1 = $user1->fetch_assoc();
            $total1 = $user1->num_rows;

            $sql2 = "SELECT * FROM accounts_list WHERE username = '$username' AND password != '$password'";
            $user2 = $con->query($sql2) or die ($con->error);
            $row2 = $user2->fetch_assoc();
            $total2 = $user2->num_rows;

            if ($total1 > 0){
                $_SESSION['username'] = $row1['username'];
                $_SESSION['currenttime'] = time();
                header("Location: home.php");
            }elseif($total2 > 0) {
                echo "You have entered the wrong password";
            }elseif($username == '' or $password == ''){
                echo "Fields cannot be blank";
            }else{
                echo "Username does not exist";
            }
        }
    ?>
    <br>
    <button type="submit" name="login">Login</button>
    <p>Don't have an account? Click here to <a href="signup.php">sign up</a>.</p>
    </form>
    </section>

    <script>
        function showPassword(){
            var password = document.getElementById("password");
            var hideOn = document.getElementById("hide-on");
            var hideOff = document.getElementById("hide-off");
        
            if(password.type === 'password'){
                password.type = "text";
                hideOn.style.display = "block";
                hideOff.style.display = "none";
            }else{
                password.type = "password";
                hideOn.style.display = "none";
                hideOff.style.display = "block";
            }
        }
    </script>
</body>
</html>