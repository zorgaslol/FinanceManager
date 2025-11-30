<?php

include "database.php";
include "init.php";

$user_Id = $_SESSION['user_id'];
$query = "SELECT * FROM financetrackerdb.transactions where user_id = '$user_Id'";
$transactions = mysqli_query($conn, $query);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $amount = $_POST["amount"];
    $category = $_POST["category"];

    $sql = "INSERT INTO financetrackerdb.transactions(user_id, name, amount, category_id) VALUES ('$user_Id)','$name', '$amount', '$category')";
    $results = mysqli_query($conn, $sql);

    if($results){
        echo "Transaction added successfully!";
    } else {
        echo "ERROR: " . mysqli_error($conn);
    }


};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceManager</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name">

            <label for="amount">Eur</label>
            <input type="number" name="amount">

            <label for="category">Category</label>
            <select name="category" id="category">
                <option value="1">Food</option>
                <option value="2">Car</option>
                <option value="3">House</option>
                <option value="4">Utilities</option>
                <option value="5">Fun</option>
            </select>

            <input type="submit" value="Enter data">
        </form>

        <table>
            <tr>
                <td>Date</td>
                <td>Name</td>
                <td>Amount</td>
                <td>Category</td>
            </tr>

            <?php while ($transactionsRow = mysqli_fetch_assoc($transactions)) : ?>
                    <tr>
                        <td><?php echo $transactionsRow['date']; ?></td>
                        <td><?php echo $transactionsRow['name']; ?></td>
                        <td><?php echo $transactionsRow['amount']; ?></td>
                        <td><?php echo $transactionsRow['category_id']; ?></td>
                    </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>