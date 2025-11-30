<?php
include "database.php";

$username = "";
$password = "";



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO financetrackerdb.users (user_name, password) VALUES ('$username', '$password')";

    if(mysqli_query($conn, $sql)) {
        echo "New record added succesfully";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
        <h1>Register Form</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <label for="username">Username</label>
        <input type = "text" name="username"><br>

        <label for="password">Password</label>
        <input type = "password" name="password"><br>

        <input type="submit" value="Register">
    </form>

    </div>
</body>
</html>