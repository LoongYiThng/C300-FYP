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
    echo "ALL FILES UPLOAD<br>";
    echo "<pre>"; print_r($_FILES); echo "</pre>";
    echo "ALL OPTIONS<br>";
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
        $executeOutput="";

        foreach ($_POST["techniques"] as $technique) {
            $commandLine="\"C:/Users/21005024/Anaconda3/python.exe\" ";
            $commandLine.="sanitizationScripts/".$technique.".py ";
            $commandLine.=$upload["fileType"]." ";
            $commandLine.=$upload["tempFileName"];
            echo $commandLine."<br>";

            if (noCommandInjection($technique)) {
                $executeOutput.=shell_exec($commandLine);
            }
        }

        return $executeOutput;
    }

    //basic input validation
    if (!isset($_POST["dataType"])) {
        echo "error, you have not selected a datatype. <br>";
    }
    if (!isset($_POST["techniques"])) {
        echo "error, you have not selected at least one technique. <br>";
    }

    $allCheck=isset($_POST["dataType"]) and isset($_POST["techniques"]);
    if ($allCheck) {
        //upload files, returns error messages as well
        if ($_POST["dataType"]=="language") {
            $results=uploadAllFiles(array("docx", "txt"));
        }elseif ($_POST["dataType"]=="spreadsheet") {
            $results=uploadAllFiles(array("xlsx"));
        }
        echo "PROCESSING RESULTS<br>";
        echo "<pre>"; print_r($results); echo "<pre>";

        foreach ($results as $upload) {
            // if upload success
            if ($upload["status"]) {
                $executeResults=executeScripts($upload);
                echo $executeResults;

                $downloadTempPath="uploads/".basename($upload["tempFileName"]);
                $downloadFileName=basename($upload["fileName"]);
    ?>

    <table class="table table-bordered table-dark .table-responsive-sm">
    <thead>
        <tr>
            <th scope="row" colspan="2" style="text-align: center; font-size:large">file upload information</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row" colspan="2" style="text-align: center; font-weight:normal">file metadata</th>
        </tr>
        <tr>
            <th scope="row">uploaded file name</th>
            <td><?php echo $upload["fileName"] ?></td>
        </tr>
        <tr>
            <th scope="row">file upload status</th>
            <td><?php if ($upload["status"]) {echo "success";} else {echo "failed";}?></td>
        </tr>
        <tr>
            <th scope="row">file size</th>
            <td><?php echo $upload["fileSize"] ?></td>
        </tr>

        <tr>
            <th scope="row" colspan="2" style="text-align: center; font-weight:normal">sanitized file hashes</th>
        </tr>
        <tr>
            <th scope="row">md5 hash</th>
            <td><?php echo hash_file("md5", $upload["tempFileName"]) ?></td>
        </tr>
        <tr>
            <th scope="row">sha1 hash</th>
            <td><?php echo hash_file("sha1", $upload["tempFileName"]) ?></td>
        </tr>
        <tr>
            <th scope="row">sha256 hash</th>
            <td><?php echo hash_file("sha256", $upload["tempFileName"]) ?></td>
        </tr>

        <tr>
            <th scope="row" colspan="2" style="text-align: center; font-weight:normal">error messages</th>
        </tr>
        <tr>
            <td scope="row" colspan="2"><?php echo $upload["additionalErrorMessages"] ?></td>
        </tr>

        <tr>
            <td colspan="2"><a href="<?php echo $downloadTempPath?>" class="btn btn-primary" role="button" download="<?php echo $downloadFileName?>"><i class="fas fa-download">download</a></td>
        </tr>
    </tbody>
    </table>

    <?php
            // if upload fail
            }else {
    ?>

    <table class="table table-bordered table-dark .table-responsive-sm">
    <thead>
        <tr>
            <th scope="row" colspan="2" style="text-align: center; font-size:large">file upload information</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row" colspan="2" style="text-align: center; font-weight:normal">file metadata</th>
        </tr>
        <tr>
            <th scope="row">uploaded file name</th>
            <td><?php echo $upload["fileName"] ?></td>
        </tr>
        <tr>
            <th scope="row">file upload status</th>
            <td><?php if ($upload["status"]) {echo "success";} else {echo "failed";}?></td>
        </tr>
        <tr>
            <th scope="row">file size</th>
            <td><?php echo $upload["fileSize"] ?></td>
        </tr>

        <tr>
            <th scope="row" colspan="2" style="text-align: center; font-weight:normal">error messages</th>
        </tr>
        <tr>
            <td scope="row" colspan="2"><?php echo $upload["additionalErrorMessages"] ?></td>
        </tr>
    </tbody>
    </table>


    <?php
            }
        }
    }
    
    ?>

    <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
</body>
</html>