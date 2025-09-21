<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
                 method="post" id="uploadForm" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="Enter name" required>
                        <input type="file" id="uploadFiles" name="files[]" multiple required>
                        <button type="submit" id="btnSubmit">Upload</button>
                </form>
            </div>
        </div>


        <!-- table content -->
           <h2>Display Upload List</h2>
             <div id="list"></div>

</body>
</html>
<!-- serverside request -->
 <script src="./serverside.js"></script>