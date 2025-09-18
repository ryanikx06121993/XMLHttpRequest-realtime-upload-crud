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
                <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="Enter name" required><br />
                        <input type="file" name="file">
                        <button type="submit">Upload</button>
                </form>
            </div>
        </div>


        <!-- table content -->
           <h2>Upload List</h2>
             <div id="list"></div>

</body>
</html>
<!-- serverside request -->
 <script src="./serverside.js"></script>