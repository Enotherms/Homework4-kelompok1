<?php
header("Content-Type: application/json");
include 'conn.php';

if(isset($_GET['account_name']) && isset($_GET['password'])) {
    $accountName = mysqli_real_escape_string($conn, $_GET['account_name']);
    $password = mysqli_real_escape_string($conn, $_GET['password']);

    $query = "SELECT balance FROM customers WHERE fullname = '$accountName' AND password = '$password'";
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
    echo json_encode(['status' => 'error', 'message' => 'Account name and password are required.']);
}
?>
