<?php

include "db.php";

$categories = $conn->query("SELECT COUNT(*) AS total FROM categories")->fetch_assoc()["total"];

$items = $conn->query("SELECT COUNT(*) AS total FROM items")->fetch_assoc()["total"];

$active_items = $conn->query("SELECT COUNT(*) AS total FROM items WHERE is_active = 1")->fetch_assoc()["total"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>QR Menu Admin Dashboard</h1>

<div>

    <h2>Total Categories</h2>
    <p><?php echo $categories; ?></p>

</div>

<div>

    <h2>Total Menu Items</h2>
    <p><?php echo $items; ?></p>

</div>

<div>

    <h2>Active Menu Items</h2>
    <p><?php echo $active_items; ?></p>

</div>

<br>

<a href="categories.php">Manage Categories</a>

<br><br>

<a href="items.php">Manage Items</a>

</body>
</html>