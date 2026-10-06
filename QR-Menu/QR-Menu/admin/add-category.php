<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];

    $sql = "INSERT INTO categories (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        header("Location: categories.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>

<h1>Add Category</h1>

<form method="POST">

    <label>Category Name:</label>
    <input type="text" name="name" required>

    <button type="submit">Add Category</button>

</form>

</body>
</html>