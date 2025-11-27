<?php
include 'database.php';

$query = "SELECT * FROM financetrackerdb.users";
$query_run = mysqli_query($conn,$query) or die(mysqli_error($conn));
$rows = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

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
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>

        <?php foreach($rows as $row): ?>
            <tr>
                <td><?= $row['user_id']?></td>
                <td><?= $row['user_name']?></td>
            </tr>

            <?php endforeach; ?>
    </table>

    <script src = "script.js"></script>
</body>
</html>