<?php
# dependencies:
# 1. the variable $file. which contains the name attribute of the input tag belonging to the file 
# being uploaded
# 2. the variable $fileIndex. which contains the numerical index position of the file in the $_FILES
# 3. the variable $intendedFileType. which a list of all the allowed file extensions
# without these dependencies this file upload script will not work

$targetDirectory = "uploads/";
$targetFile = $targetDirectory.basename($_FILES[$file]["name"][$fileIndex]);
$uploadOk = true;
$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

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

if ($_FILES[$file]["error"][$fileIndex]) {
    echo $errorMessages[$_FILES[$file]["error"][$fileIndex]];
    $uploadOk=false;
} else {

    if ($_FILES[$file]["size"][$fileIndex] > 500000000) {
        echo "Error, your file is too large. Only files that are 500kb or less are allowed. <br>";
        $uploadOk = false;
    }

    $unallowedFileTypeErrorMessage="";
    $unallowedFileTypeFound=false;
    for ($i=0; $i<count($intendedFileType); $i++) {
        if ($fileType!=$intendedFileType[$i]) {
            $unallowedFileTypeFound=true;
        }elseif ($fileType==$intendedFileType[$i]) {
            $unallowedFileTypeFound=false;
            break;
        }
        $unallowedFileTypeErrorMessage.=$intendedFileType[$i].", ";
    }
    if ($unallowedFileTypeFound) {
        echo "error, only ".$unallowedFileTypeErrorMessage."are allowed. <br>";
        echo "filetype submitted: ".$fileType."<br>";
        $uploadOk=false;
    }

    if ($uploadOk == false) {
    echo "Sorry, your file was not uploaded. <br>";

    // if everything is ok, try to upload file
    } else {
        $newFilename = tempnam($targetDirectory, "");
        unlink($newFilename);
        if (move_uploaded_file($_FILES[$file]["tmp_name"][$fileIndex], $newFilename)) {
            echo "The file ". htmlspecialchars(basename($_FILES[$file]["name"][$fileIndex])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file. <br>";
        }
    }
    
    echo "<br>";
    return array($uploadOk, $newFilename);
}
?>