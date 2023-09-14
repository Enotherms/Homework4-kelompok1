<?php
include 'conn.php';

if(isset($_GET['id']) && isset($_GET['password'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $password = mysqli_real_escape_string($conn, $_GET['password']);


    $query = "SELECT balance FROM customers WHERE id = '$id' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if($row = mysqli_fetch_assoc($result)) {
        echo json_encode(['status' => 'success', 'balance' => $row['balance']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No record found or incorrect password.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID and password are required.']);
}
?>
