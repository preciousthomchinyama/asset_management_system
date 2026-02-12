<?php
include 'includes/db.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$asset_id = $_GET['id'];

// Delete the asset
$query = "DELETE FROM assets WHERE id = $asset_id";

if (mysqli_query($conn, $query)) {
    // Redirect back to asset list
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting asset: " . mysqli_error($conn);
}
?>
