<?php
include 'includes/db.php';

if (isset($_POST['submit'])) {
    $asset_name = $_POST['asset_name'];
    $asset_type = $_POST['asset_type'];
    $serial_number = $_POST['serial_number'];
    $purchase_date = $_POST['purchase_date'];
    $status = $_POST['status'];

    $query = "INSERT INTO assets 
              (asset_name, asset_type, serial_number, purchase_date, status) 
              VALUES 
              ('$asset_name', '$asset_type', '$serial_number', '$purchase_date', '$status')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Asset</title>
</head>
<body>

<h2>Add New Asset</h2>

<form method="POST" action="">
    <label>Asset Name:</label><br>
    <input type="text" name="asset_name" required><br><br>

    <label>Asset Type:</label><br>
    <input type="text" name="asset_type"><br><br>

    <label>Serial Number:</label><br>
    <input type="text" name="serial_number"><br><br>

    <label>Purchase Date:</label><br>
    <input type="date" name="purchase_date"><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="Active">Active</option>
        <option value="In Store">In Store</option>
        <option value="Damaged">Damaged</option>
    </select><br><br>

    <button type="submit" name="submit">Save Asset</button>
</form>

<br>
<a href="index.php">← Back to Asset List</a>

</body>
</html>
