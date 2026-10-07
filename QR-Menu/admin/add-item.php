<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    $sql = "INSERT INTO items 
            (category_id, name, description, price, image, is_active, created_at)
            VALUES 
            ('$category_id', '$name', '$description', '$price', '$image', 1, current_timestamp())";

    if ($conn->query($sql) === TRUE) {
        header("Location: items.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>

<h1>Add Item</h1>

<form method="POST">

    <label>Category ID:</label>
    <input type="number" name="category_id" required>
    <br><br>

    <label>Name:</label>
    <input type="text" name="name" required>
    <br><br>

    <label>Description:</label>
    <textarea name="description" required></textarea>
    <br><br>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" required>
    <br><br>

    <label>Image:</label>
    <input type="text" name="image">
    <br><br>

    <button type="submit">Add Item</button>

</form>

</body>
</html>