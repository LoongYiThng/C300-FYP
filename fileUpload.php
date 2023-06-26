<?php
# dependencies:
# 1. the variable $file. which contains the name attribute of the input tag belonging to the file 
# being uploaded
# 2. the variable $intendedFileType
# without these dependencies this file upload script will not work

$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES[$file]["name"]);
$uploadOk = true;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$errorMessages = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

print_r($_FILES);

if ($_FILES[$file]["error"]) {
    echo $errorMessages[$_FILES[$file]["error"]];
    $uploadOk=false;
} else {

    if ($_FILES[$file]["size"] > 500000000) {
        echo "Error, your file is too large. Only files that are 500kb or less are allowed";
        $uploadOk = false;
    }

    if($fileType != $intendedFileType) {
        echo "Error, only ".$intendedFileType." files are allowed.";
        $uploadOk = false;
    }

    if ($uploadOk == false) {
    echo "Sorry, your file was not uploaded.";

    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES[$file]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
?>