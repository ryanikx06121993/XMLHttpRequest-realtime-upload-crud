<?php

function checkUploadfunction($files) {
    if($_FILES['files'][0] == '') {
        highlight_string("<?php" . var_export($files, true) . ";?>");
        return "Please select at least one file";
    }
}