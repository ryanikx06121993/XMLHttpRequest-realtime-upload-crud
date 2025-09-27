<?php
    include('./configuration.php');
    include('./checkFiles_function.php');
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
        //CHECK FILES DATA UPLOADED JSON FORMAT SSSS
        // echo json_encode($_FILES);
        // echo checkUploadfunction($_FILES);

        // HERE PREPARE DATA HANDLING AND FILE HANDLING
            // Make sure upload directory exists
                $uploadDir = __DIR__ . "/uploads";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

            // array container
            $uploadArray = array();

                     // Allowed MIME types a variable which filter file format allowed
                    $allowedMimes = ['image/jpeg', 'image/png', 'application/pdf', 'text/plain'];
                    //   filter specific file size allowed
                    $maxSize      = 20 * 1024 * 1024; // 20MB

                    // Check if files are uploaded
                    if (!isset($_FILES['files'])) {
                          $response = [ "status" => "error","message" => "There are no files uploaded!"];
                        // Encode to JSON
                        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                    }



            // varibale count function preparation for loop insert into database
            $numFiles = count($_FILES['files']['name']);    


                // Normalize the $_FILES array
            $files = [];
                        // loop for multiple upload
            foreach ($_FILES['files']['name'] as $i => $name) {
                if ($_FILES['files']['error'][$i] === UPLOAD_ERR_NO_FILE) continue;
                $files[] = [
                    'name'     => $name,
                    'type'     => $_FILES['files']['type'][$i],
                    'tmp_name' => $_FILES['files']['tmp_name'][$i],
                    'error'    => $_FILES['files']['error'][$i],
                    'size'     => $_FILES['files']['size'][$i],
                ];
            }
     

                try {

                   // Prepare SQL
                        $sql = "INSERT INTO uploads 
                                (name, files_name, , file_size, files_type, files_path) 
                                VALUES (:name ,:files_name, :file_size, :files_type, :files_path)";
                        $stmt = $pdo->prepare($sql); 

                            // permission to write and edit files
     chmod($dest, 0644);

       // Insert metadata into DB
    $stmt->execute([
        ':name' => $_POST['name'],
        ':files_name'   => $storedName,
        ':file_size'   => $file['size'],
        ':files_type'     => $mime,
        ':files_path'     => $dest,
    ]);


        // Generate safe unique file name
    $ext        = pathinfo($file['name'], PATHINFO_EXTENSION);
    $storedName = bin2hex(random_bytes(16)) . ($ext ? ".$ext" : '');
    $dest       = $uploadDir . "/" . $storedName;
     if (!move_uploaded_file($file['tmp_name'], $dest)) {
                $response = [ "status" => "error","message" => "Error Uploading {$file['name']} failed to move!"];
                        // Encode to JSON
                        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        continue;
    }


    echo "Success uploaded!";




// // Process each file
// foreach ($files as $file) {
//     if ($file['error'] !== UPLOAD_ERR_OK) {
//               $response = [ "status" => "error","message" => "Error Uploading {$file['name']}!"];
//                         // Encode to JSON
//                         echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//         continue;
//     }
//     if ($file['size'] > $maxSize) {
//                       $response = [ "status" => "error","message" => "Error Uploading {$file['size']} is too large!"];
//                         // Encode to JSON
//                         echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//         continue;
//     }

//     // Detect real MIME type
//     $finfo = new finfo(FILEINFO_MIME_TYPE);
//     $mime  = $finfo->file($file['tmp_name']) ?: 'application/octet-stream';
//     if (!in_array($mime, $allowedMimes, true)) {
//                      $response = [ "status" => "error","message" => "Error Uploading {$file['name']} invalid type!"];
//                         // Encode to JSON
//                         echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//         continue;
//     }
// }



                }catch(PDOException $e){
                           $response = [ "status" => "error","message" => . $e->getMessage();];
                        // Encode to JSON
                        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                    // echo "Error: " . $e->getMessage();
                }

        
     }else {
            $response = [ "status" => "error","message" => "Data error action=upload"];
            // Encode to JSON
            echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

     } else {
    $response = [ "status" => "error","message" => "Post error unreadable!"];
            // Encode to JSON
            echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}




