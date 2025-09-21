<?php
    include('./configuration.php');
    header("Content-Type: application/json; charset=UTF-8");
        // variable for action
        $action = $_GET['action'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
// PLEASE FIX GET REALTIME DATA FETCH ALL 
        if ($action === "read") {
            $stmt = $pdo->query("SELECT * FROM uploads");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else {
            $response = [ "status" => "error","message" => "Data error action=read"];
            // Encode to JSON
            echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

        

}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

     if ($action === "upload") {
        // CHECK DATA PASSING FROM AJAX SERVER SIDE
        // echo json_encode($_POST);
        // echo json_encode($_FILES);

        // HERE PREPARE DATA HANDLING AND FILE HANDLING


        
     }else {
            $response = [ "status" => "error","message" => "Data error action=upload"];
            // Encode to JSON
            echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

      
}


else {

}


