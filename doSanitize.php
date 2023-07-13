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
        $results=array();
        for($fileIndex=0, $size=count($_FILES[$file]["name"]); $fileIndex<$size; ++$fileIndex) {
            array_push($results, include "fileUpload.php");
        }
        return $results;
    }

    if (!isset($_POST["dataType"])) {
        echo "error, you have not selected a datatype.";
    }
    if (!isset($_POST["techniques"])) {
        echo "error, you have not selected at least one technique.";
    }

    $allCheck=isset($_POST["datatype"]) and isset($_POST["techniques"]);
    if ($allCheck) {
        if ($_POST["dataType"]=="language") {
            $results=uploadAllFiles(array("docx", "txt"));
        }elseif ($_POST["dataType"]=="spreadsheet") {
            $results=uploadAllFiles(array("xlsx"));
        }
        echo "<pre>", print_r($results); echo "<pre>";

        foreach ($results as $upload) {
            if ($upload[0]==true) {
                echo shell_exec("cd");
            }
        }
    }
    ?>

    <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
</body>
</html>