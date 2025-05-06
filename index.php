<?php
    include("connection.php");
    $conn = connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <h1>Welcome to fakebook!</h1>
        <label for="username">Username: </label>
        <input type="text" name="username"> <br>

        <label for="password">Password: </label>
        <input type="password" name="password"> <br>

        <input type="submit" name="submit" value="register">

    </form>
</body>
</html>

<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS); 
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if(empty($username)){
            echo "Please enter username";
        }elseif(empty($password)){
            echo "Please enter password";
        }else{
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user_tbl (u,p) 
                VALUES ('$username','$passwordHash')";
            mysqli_query($conn, $sql);
            echo "You are now registered!";
        }
    }

    mysqli_close($conn);
?>