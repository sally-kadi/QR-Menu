<?php

include "db.php";

$result = $conn->query("SELECT * FROM categories");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Categories</title>
</head>

<body>

<h1>Categories</h1>

<a href="add-category.php">Add Category</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>

    <tr>

        <td>
            <?php echo $row["id"]; ?>
        </td>

        <td>
            <?php echo $row["name"]; ?>
        </td>

        <td>
            <?php
            echo $row["status"] == 1 ? "Active" : "Inactive";
            ?>
        </td>

        <td>

            <a href="edit-category.php?id=<?php echo $row["id"]; ?>">
                Edit
            </a>

            |

            <a href="delete-category.php?id=<?php echo $row["id"]; ?>">
                Delete
            </a>

        </td>

    </tr>

    <?php } ?>

</table>

</body>

</html>