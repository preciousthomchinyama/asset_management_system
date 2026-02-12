<?php
include 'includes/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$asset_id = $_GET['id'];

// Fetch existing asset details
$result = mysqli_query($conn, "SELECT * FROM assets WHERE id = $asset_id");
$asset = mysqli_fetch_assoc($result);

if (!$asset) {
    echo "Asset not found!";
    exit();
}

// Update asset when form is submitted
if (isset($_POST['submit'])) {
    $asset_name = $_POST['asset_name'];
    $asset_type = $_POST['asset_type'];
    $serial_number = $_POST['serial_number'];
    $purchase_date = $_POST['purchase_date'];
    $status = $_POST['status'];

    $query = "UPDATE assets SET 
              asset_name='$asset_name', 
              asset_type='$asset_type', 
              serial_number='$serial_number', 
              purchase_date='$purchase_date', 
              status='$status' 
              WHERE id=$asset_id";

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
    <title>Edit Asset</title>
</head>
<body>

<h2>Edit Asset</h2>

<form method="POST" action="">
    <label>Asset Name:</label><br>
    <input type="text" name="asset_name" value="<?php echo $asset['asset_name']; ?>" required><br><br>

    <label>Asset Type:</label><br>
    <input type="text" name="asset_type" value="<?php echo $asset['asset_type']; ?>"><br><br>

    <label>Serial Number:</label><br>
    <input type="text" name="serial_number" value="<?php echo $asset['serial_number']; ?>"><br><br>

    <label>Purchase Date:</label><br>
    <input type="date" name="purchase_date" value="<?php echo $asset['purchase_date']; ?>"><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="Active" <?php if ($asset['status'] == 'Active') echo 'selected'; ?>>Active</option>
        <option value="In Store" <?php if ($asset['status'] == 'In Store') echo 'selected'; ?>>In Store</option>
        <option value="Damaged" <?php if ($asset['status'] == 'Damaged') echo 'selected'; ?>>Damaged</option>
    </select><br><br>

    <button type="submit" name="submit">Update Asset</button>
</form>

<br>
<a href="index.php">← Back to Asset List</a>

</body>
</html>
