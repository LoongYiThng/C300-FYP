<?php
# dependencies:
# 1. a variable $file. which contains the name attribute of the input tag belonging to the file 
# being uploaded
# 2. a variable $fileIndex. which contains the numerical index position of the file in the $_FILES
# 3. a variable $intendedFileType. which a list of all the allowed file extensions
# without these dependencies this file upload script will not work

# output:
# this script will return an array with the following key value pairs:
# "status"- whether the file upload was successful or not
# "uploadError"- error message for problems found in file upload. see $errorMessages variable for listing

# "fileSize"- the size of the file
# "fileType"- the file extension submitted without the fullstop (example: "docx")
# "tempFileName"- the full path (including the file itself) where the file is stored
# "fileName"- the name of the file uploaded

# "additionalErrorMessages"- exactly what it says. to understand what triggers this, read code. by default 
# this is empty. but whenever applicable, the script will append a suitable error message.

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
    $uploadError=$errorMessages[$_FILES[$file]["error"][$fileIndex]];
    $uploadOk=false;
} else {
    $uploadError=null;
    $fileSize=$_FILES[$file]["size"][$fileIndex];
    $additionalErrorMessages="";

    if ($_FILES[$file]["size"][$fileIndex] > 500000000) {
        $additionalErrorMessages.="Error, your file is too large. Only files that are 500kb or less are allowed. <br>";
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
        $additionalErrorMessages.="error, only ".$unallowedFileTypeErrorMessage."are allowed. <br>";
        $additionalErrorMessages.="filetype submitted: ".$fileType."<br>";
        $uploadOk=false;

    }

    if ($uploadOk == false) {
    echo "Sorry, your file was not uploaded. <br>";

    // if everything is ok, try to upload file
    } else {
        $newFilename = tempnam($targetDirectory, "");
        unlink($newFilename);
        if (move_uploaded_file($_FILES[$file]["tmp_name"][$fileIndex], $newFilename)) {
        } else {
            $additionalErrorMessages.="Sorry, there was an error uploading your file. <br>";
            $uploadOk=False;
        }
    }
    
    echo "<br>";
}

return array(
    "status"=>$uploadOk,
    "uploadError"=>$uploadError,
    "fileSize"=>$fileSize,
    "fileType"=>$fileType,
    "tempFileName"=>$newFilename,
    "fileName"=>$targetFile,
    "additionalErrorMessages"=>$additionalErrorMessages,
);
?>