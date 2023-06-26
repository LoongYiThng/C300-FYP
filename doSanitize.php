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
        $fileSelected=true;
        if (empty($_FILES["file"]["name"])) {
            $fileSelected=false;
            echo "error, it appears you have not selected a file to sanitize <br>";
        }

        $techniqueSelected=true;
        if (!isset($_POST["technique"])) {
            $techniqueSelected=False;
            echo "error, it appears you have not selected a technique to use in sanitization";
        }

        #if all validation goes well above, form processing starts here
        if ($fileSelected and $techniqueSelected) {
            echo "input validation passed <br>";
            
            $file="file";
            $intendedFileType=$_POST["extension"];
            include "fileUpload";
        }

        #this section is for pasteText testing for now it is empty
        if (isset($_POST["pasteText"])) {}
        ?>

        <h1>WIP hashes</h1>
        <h2>for now these are the hashes of the uploaded files, not the downloaded files</h2>

        <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
    </body>
</html>