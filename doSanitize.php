<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>do sanitize</title>
    <?php include "design.php"; ?>
</head>
<body>
    <?php include "navbar.php"; ?>

    <?php
    echo "<pre>"; print_r($_FILES); echo "</pre>"; 
    echo "<pre>"; print_r($_POST); echo "</pre>";

    function uploadAllFiles() {
        $file="fileUpload";
        $intendedFileType=".docx";
        for($fileIndex=0, $size=count($_FILES[$file]["name"]); $fileIndex<$size; ++$fileIndex) {
            include "fileUpload.php";
        }
    }

    if ($_POST["dataType"]=="language") {
        $intendedFileType=".docx";
        uploadAllFiles();
    }elseif ($_POST["dataType"]=="spreadsheet") {
        $intendedFileType=".xlsx";
        uploadAllFiles();
    }
    ?>

    <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
</body>
</html>