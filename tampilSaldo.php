<?php
include 'conn.php';

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT balance FROM customers WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if($row = mysqli_fetch_assoc($result)) {
        echo json_encode(['status' => 'success', 'balance' => $row['balance']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No record found.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID is required.']);
}
?>
