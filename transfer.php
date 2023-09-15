<?php
header("Content-Type: application/json");
require_once('conn.php');

// Terima permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents("php://input"), true);

    if (isset($requestData["from_acc"]) && isset($requestData["to_acc"]) && isset($requestData["amount"])) {
        $fromAccount = $requestData["from_acc"];
        $toAccount = $requestData["to_acc"];
        $amount = floatval($requestData["amount"]);

        $sql = "INSERT INTO transactions (from_acc, to_acc, amount) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $fromAccount, $toAccount, $amount);
        
        if ($stmt->execute()) {
            echo json_encode(["message" => "Transfer berhasil"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Transfer gagal"]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Permintaan tidak valid. Pastikan Anda mengirimkan 'from_acc', 'to_acc', dan 'amount' dalam bentuk JSON."]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["message" => "Metode HTTP tidak diizinkan"]);
}

$conn->close();
?>
