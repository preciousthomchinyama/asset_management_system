<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Asset Management System</title>
</head>
<body>

<h2>Asset List</h2>
<a href="add_asset.php">Add New Asset</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Serial</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM assets");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['asset_name']}</td>
        <td>{$row['asset_type']}</td>
        <td>{$row['serial_number']}</td>
        <td>{$row['status']}</td>
        <td>
            <a href='edit_asset.php?id={$row['id']}'>Edit</a> |
            <a href='delete_asset.php?id={$row['id']}'>Delete</a>
        </td>
    </tr>";
}
?>
</table>

</body>
</html>
