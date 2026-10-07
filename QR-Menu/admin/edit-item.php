<?php

include "db.php";

$id = $_GET["id"];

$result = $conn->query("SELECT * FROM items WHERE id = $id");
$item = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    $sql = "UPDATE items SET
            category_id = '$category_id',
            name = '$name',
            description = '$description',
            price = '$price',
            image = '$image'
            WHERE id = $id";

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
    <title>Edit Item</title>
</head>
<body>

<h1>Edit Item</h1>

<form method="POST">

    <label>Category ID:</label>
    <input
        type="number"
        name="category_id"
        value="<?php echo $item['category_id']; ?>"
        required
    >
    <br><br>

    <label>Name:</label>
    <input
        type="text"
        name="name"
        value="<?php echo $item['name']; ?>"
        required
    >
    <br><br>

    <label>Description:</label>
    <textarea name="description" required><?php echo $item['description']; ?></textarea>
    <br><br>

    <label>Price:</label>
    <input
        type="number"
        step="0.01"
        name="price"
        value="<?php echo $item['price']; ?>"
        required
    >
    <br><br>

    <label>Image:</label>
    <input
        type="text"
        name="image"
        value="<?php echo $item['image']; ?>"
    >
    <br><br>

    <button type="submit">Update Item</button>

</form>

</body>
</html>