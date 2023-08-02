<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <?php include "design.php"; ?>
    <link rel="stylesheet" href="stylesheets/sanitizerHome.css">
</head>
<body>
    <?php include "navbar.php" ?>
    <form enctype="multipart/form-data" action="doSanitize.php" method="post">
        
        <input type="hidden" name="MAX_FILE_SIZE" value="500000000" />

        <h1><strong>Choose how you want to get started</strong></h1>
        <p>
            have a look at this table containing all file types we support. then select the document type value in 
            the button group below that matches your file type.
        </p>
        <table class="table table-bordered table-dark .table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">file type</th>
                    <th scope="col">file extension</th>
                    <th scope="col">data type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">microsoft word</th>
                    <td scope="row">.docx</td>
                    <td rowspan="2">language</td>
                </tr>
                <tr>
                    <td scope="row">text</th>
                    <td scope="row">.txt</td>
                </tr>
                <tr>
                    <td scope="row">microsoft excel</th>
                    <td scope="row">.xlsx</td>
                    <td scope="row">spreadsheet</td>
                </tr>
            </tbody>
        </table>

        <div class="form-check">
            <input class="form-check-input language" type="radio" name="dataType" id="dataTypeLanguage" value="language">
            <label class="form-check-label" for="dataTypeLanguage">language</label>
        </div>
        <div class="form-check">
            <input class="form-check-input spreadsheet" type="radio" name="dataType" id="dataTypeSpreadsheet" value="spreadsheet">
            <label class="form-check-label" for="dataTypeSpreadsheet">spreadsheet</label>
        </div>

        <div class="selectFile">
            <h1><strong>select file to upload</strong></h1>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary addFile" type="button">add file slot</button>
                <button class="btn btn-outline-danger clearFile" type="button">remove file slot</button>
            </div>

            <input class="form-control" type="file" id="defaultSlot" name="fileUpload[]" accept=".docx, .txt, .xlsx">

            <div class="uploadSlots"></div>
        </div>
                
        
        <h1><strong>Select a technique</strong></h1>
        <h2>You may choose one or more techniques for sanitization.</h2>
        <p>
            <b>This section changes depending on your chosen file format above</b>. This is because different data types have 
            their own applicable sanitization techniques. If you are not sure about which techniques to choose or how they 
            work, try testing them with some sample input to the raw text field above or read more on the technique documentation 
            here. 
        </p>

        <div class="container">
            <div class="row gy-3" id="notChosen">

                <div class="col-md-2">
                    <i class="fas fa-file-import fa-6x"></i>
                    <i class="fas fa-question fa-6x"></i>
                </div>
                <div class="col-md-10">
                    <h3>you have not chosen any file formats, please upload one in the above section before proceeding</h3>
                </div>

            </div>

            <?php
            $language=array(
                array("character_masking", "synthetic_data"),
                array("data_perturbation", "record_surpression"),
                array("generalisation", "pseudonymization"),
                array("swapping")
            );
            $spreadsheet=array(
                array("data_aggregation")
            );

            function renderTechniques($id, $iteration) {
            ?>

            <div class="row gy-3" id="<?php echo $id?>" style="display: none">
            
                <?php if (count($iteration)==2) {?>
                <div class="col-md-6">
                    <label class="btn btn-primary btn-xl"><input type="checkbox" name="techniques[]" value="<?php echo $iteration[0] ?>">
                        <?php echo $iteration[0] ?>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="btn btn-primary btn-xl"><input type="checkbox" name="techniques[]" value="<?php echo $iteration[1] ?>">
                        <?php echo $iteration[1] ?>
                    </label>
                </div>

                <?php }else { ?>
                <div class="col-md-12">
                    <label class="btn btn-primary btn-xl"><input type="checkbox" name="techniques[]" value="<?php echo $iteration[0] ?>">
                        <?php echo $iteration[0] ?>
                    </label>
                </div>
                <?php } ?>

            </div>

            <?php 
            }

            foreach ($language as $techniqueGroup) {
                renderTechniques("languageTechniques", $techniqueGroup);
            }

            foreach ($spreadsheet as $techniqueGroup) {
                renderTechniques("spreadsheetTechniques", $techniqueGroup);
            }
            ?>
        </div>
        
        <div class="submitButton">
            <label for="submit" class="btn btn-success btn-xl">Sanitize</label>
            <input type="submit" id="submit" style="display: none">
        </div> 
    </form>

    <script src="sanitizerHome.js"></script>
</body>
</html>
