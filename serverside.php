<?php
    include('./configuration.php');
    header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $action = $_GET['action'] ?? '';
        if ($action === "read") {
            $stmt = $pdo->query("SELECT * FROM uploads");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else {
            $response = [ "status" => "error","message" => "Data error retrieval"];
            // Encode to JSON
            echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

        

}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
}


else {

}


