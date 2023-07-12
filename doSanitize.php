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

    function uploadAllFiles($intendedFileType) {
        $file="fileUpload";
        for($fileIndex=0, $size=count($_FILES[$file]["name"]); $fileIndex<$size; ++$fileIndex) {
            include "fileUpload.php";
        }
    }

    if (!isset($_POST["dataType"])) {
        echo "error, you have not selected a datatype.";
    }elseif (!isset($_POST["techniques"])) {
        echo "error, you have not selected at least one technique.";
    }else {
        if ($_POST["dataType"]=="language") {
            uploadAllFiles(array("docx", "txt"));
        }elseif ($_POST["dataType"]=="spreadsheet") {
            uploadAllFiles(array("xlsx"));
        }
    }
    ?>

    <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
</body>
</html>