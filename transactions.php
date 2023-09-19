<?php
header("Content-Type: application/json");
require_once('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['account_name']) && isset($_GET['password'])) {
        $accountName = $_GET['account_name'];
        $password = $_GET['password'];

        $sqlCheckPassword = "SELECT * FROM customers WHERE fullname = ? AND password = ?";
        $stmtCheckPassword = $conn->prepare($sqlCheckPassword);
        $stmtCheckPassword->bind_param("ss", $accountName, $password);
        $stmtCheckPassword->execute();
        $resultCheckPassword = $stmtCheckPassword->get_result();

        if ($resultCheckPassword->num_rows === 1) {
            $sql = "SELECT * FROM transactions WHERE from_acc = ? OR to_acc = ? ORDER BY transaction_date DESC LIMIT 10";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $accountName, $accountName);
            $stmt->execute();
            $result = $stmt->get_result();

            $transactions = [];
            while($row = $result->fetch_assoc()) {
                $transactions[] = $row;
            }

            if(count($transactions) > 0) {
                echo json_encode(['status' => 'success', 'transactions' => $transactions]);
            } else {
                http_response_code(404);
                echo json_encode(['message' => 'No transactions found for this account.']);
            }
        } else {
            http_response_code(401);
            echo json_encode(['message' => 'Incorrect password or account not found.']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Account name (account_name) and password are required as GET parameters.']);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Metode HTTP tidak diizinkan"]);
}

$conn->close();

?>
