<?php
# dependencies:
# 1. variable $file. the value of this variable is the name attribute of the input tag containing
# the file to be uploaded
# 2. the variable $intendedFileType
# without these dependencies this file upload script will not work.

$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES[$file]["name"]);
$uploadOk = true;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($_FILES[$filename]["size"] > 500000000) {
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
    if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES[$filename]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>