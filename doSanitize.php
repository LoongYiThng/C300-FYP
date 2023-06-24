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
        $files=array("wordFile", "textFile", "pasteText", "pdfFile", "excelFile");
        $formatSelected=false;
        foreach ($files as $value) {
            if (!empty($_GET[$value])) {
                $formatSelected=true;
                $retrievedFilename=$_GET[$value];
            }
        }
        if ($formatSelected==false) {
            echo "error: the website has neither detected a file submitted or a file uploaded previously. <br>";
        }

        $techniques=array("characterMasking", "syntheticData", "dataPerturbation", "recordSurpression",
        "generalisation", "pseudonymisation", "swapping", "attributeSurpression");
        $techniqueSelected=false;
        foreach ($techniques as $value) {
            if (isset($_GET[$value])) {
                $techniqueSelected=true;
            }
        }
        if ($techniqueSelected==false) {
            echo "error: it appears you have not made any selection on which technique you intend to use.";
        }

        #if all goes well
        if ($formatSelected and $techniqueSelected) {
            echo "pass <br>";
            print("filename: ".$retrievedFilename);  
        }
        ?>

        <h1>WIP hashes</h1>
        <h2>for now these are the hashes of the uploaded files, not the downloaded files<h2>
    </body>
</html>