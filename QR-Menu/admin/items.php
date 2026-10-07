<?php

include "db.php";

$sql = "SELECT items.*, categories.name AS category_name
        FROM items
        LEFT JOIN categories ON items.category_id = categories.id
        ORDER BY items.id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>

<h1>Menu Items</h1>

<a href="add-item.php">Add Item</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>

    <tr>

        <td><?php echo $row["id"]; ?></td>

        <td><?php echo $row["category_name"]; ?></td>

        <td><?php echo $row["name"]; ?></td>

        <td><?php echo $row["description"]; ?></td>

        <td>$<?php echo $row["price"]; ?></td>

        <td><?php echo $row["image"]; ?></td>

        <td>
            <a href="edit-item.php?id=<?php echo $row["id"]; ?>">
                Edit
            </a>

            |

            <a href="delete-item.php?id=<?php echo $row["id"]; ?>">
                Delete
            </a>
        </td>

    </tr>

    <?php } ?>

</table>

</body>
</html>