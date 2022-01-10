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
    <title>Sign Up</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <section>
        <h1>Create a new account</h1>
    <form action="" method="post">
    <label>Username</label>
    <br>
    <input type="text" name="username" id="username">
    <form action="" method="post">
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
        if(isset($_POST['signup'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM accounts_list WHERE username = '$username'";
            $user = $con->query($sql) or die ($con->error);
            $row = $user->fetch_assoc();
            $total = $user->num_rows;

            if($username == '' or $password == ''){
                echo "Fields cannot be blank";
            }elseif($total > 0){
                echo "Username already exists";
            }elseif(strlen($password) < 8){
                echo "Password should be at least 8 characters long";
            }elseif(preg_match('/[@!#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password) == 0){
                echo "Password should contain a special character";
            }elseif(preg_match('/[0-9]/', $password) == 0){
                echo "Password should contain a number";
            }elseif(preg_match('/[A-Z]/', $password) == 0){
                echo "Password should contain a capital letter";
            }else{
                $sql = "INSERT INTO `accounts_list`(`username`, `password`) 
                        VALUES ('$username','$password')";
                echo "Account Created!";
            }
            $con->query($sql) or die ($con->error);
        }
    ?>
    <br>
    <button type="submit" name="signup">Sign up</button>
    <p>Already have an account? Click here to <a href="login.php">log in</a>.</p>
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