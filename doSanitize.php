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
        for($fileIndex=0, $size=count($_FILES[$file]["name"]); $fileIndex<$size; $fileIndex++) {
            array_push($results, include "fileUpload.php");
        }

        return $results;
    }

    function noCommandInjection($input) {
        $validTechniques=array(
            "character_masking", "synthetic_data", "data_perturbation", "record_surpression",
            "generalisation", "pseudonyzmization", "swapping", "data_aggregation"
        );
        foreach ($validTechniques as $technique) {
            if ($technique==$input) {
                return true;
            }
        }

        return false;
    }

    function executeScripts($upload) {
        $success=false;
        foreach ($_POST["techniques"] as $technique) {
            $commandLine="\"C:/Users/21005024/Anaconda3/python.exe\" ";
            $commandLine.="sanitizationScripts/".$technique.".py ";
            $commandLine.=$upload[1]." ";
            $commandLine.=$upload[2];
            echo $commandLine."<br>";

            if (noCommandInjection($technique)) {
                shell_exec($commandLine);
                $success=true;
            }
        }

        return $success;
    }

    if (!isset($_POST["dataType"])) {
        echo "error, you have not selected a datatype.";
    }
    if (!isset($_POST["techniques"])) {
        echo "error, you have not selected at least one technique.";
    }

    $allCheck=isset($_POST["dataType"]) and isset($_POST["techniques"]);
    if ($allCheck) {
        if ($_POST["dataType"]=="language") {
            $results=uploadAllFiles(array("docx", "txt"));
        }elseif ($_POST["dataType"]=="spreadsheet") {
            $results=uploadAllFiles(array("xlsx"));
        }
        echo "<pre>"; print_r($results); echo "<pre>";

        foreach ($results as $upload) {
            // if upload success
            if ($upload[0]) {
                $executeResults=executeScripts($upload);
                echo $executeResults;
            
            // if upload fail
            }else {}
        }
    }
    
    ?>

    <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
</body>
</html>