<?php
session_start();
include "database.php";

$inputedUsername = "";
$inputedPassword = "";



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $inputedUsername = $_POST["username"];
    $inputedPassword = $_POST["password"];

    //create variable for SQL query and for the results that sql returns
    $sql = "SELECT * FROM financetrackerdb.users WHERE user_name = '$inputedUsername' LIMIT 1";
    $results = mysqli_query($conn, $sql);


    if(mysqli_num_rows($results) == 1){
        echo "User found" . "<br>";

        $row = mysqli_fetch_assoc($results);
        $dbPassword = $row["password"];
        $userId = $row["user_id"];

        if(password_verify($inputedPassword, $dbPassword)){
            $_SESSION["user_id"] = $userId;
            header("Location: index.php");
        } else{
            echo "Password incorrect fuck out of here!" . "<br>";
        }

    } else {
        echo "User not found" . "<br>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Login Form</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <label for="username">Username</label>
        <input type = "text" name="username"><br>

        <label for="password"></label>
        <input type = "password" name="password"><br>

        <input type="submit">
    </form>

    </div>
    
</body>
</html>