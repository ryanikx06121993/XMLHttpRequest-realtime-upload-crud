<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
if ($action === "read") {
    $stmt = $pdo->query("SELECT * FROM upload");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}


}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
}


else {

}


