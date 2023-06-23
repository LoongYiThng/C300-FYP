<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>home</title>
        <?php include "design.php"; ?>
        <link rel="stylesheet" href="stylesheets/sanitizerHome.css">
    </head>
    <body>
        <?php include "navbar.php"; ?>
        
        <form action="doSanitize.php" method="get">
            <h1><strong>Choose how you want to get started</strong></h1>

            <div class="container">
                <div class="row gy-3">

                    <div class="col-md-4">
                        <div class="card h-100">
                            <i class="fas fa-file-word fa-6x"></i>
                            <div class="card-body">
                                <h2><strong>Upload a microsoft word file (.docx)</strong></h2>
                                <p>Suitable for large files<p>
                            </div>
                            <div class="card-footer">
                                <label  for="wordFile" class="btn btn-primary btn-xl"><i class="fas fa-upload"></i> choose file</label>
                                <input type="file" id="wordFile" name="wordFile" accept=".docx" style="display: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <i class="fas fa-file-alt fa-6x"></i>
                            <div class="card-body">
                                <h2><strong>Upload a text file (.txt)</strong></h2>
                                <p>Suitable for small files</p>
                            </div>
                            <div class="card-footer">
                                <label for="textFile" class="btn btn-primary btn-xl"><i class="fas fa-upload"></i> choose file</label>
                                <input type="file" id="textFile" name="textFile" accept=".txt" style="display:none">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <i class="fas fa-paste fa-6x"></i>
                            <div class="card-body">
                                <h2><strong>Paste raw text</strong></h2>
                                <p>Suitable for testing different sanitization techniques or extremely small strings of text</p>
                            </div>
                            <div class="card-footer">
                                <label for="pasteText">paste text here:</label>
                                <textarea class="form-control" id="pasteText" name="pasteText" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <h1><strong>Select a technique</strong></h1>
            <h2 style="text-align: center;">You may choose one or more techniques for sanitization.</h2>
            <p style="margin: 0px 20px 0px 20px;">
                <b>This section changes depending on your chosen file format above</b>. This is because different data types have 
                their own applicable sanitization techniques. If you are not sure about which techniques to choose or how they 
                work, try testing them some sample input to the raw text field above or read more on the technique documentation 
                here. 
            </p>

            <div class="container">
                <?php
                $language=array(
                    array(array("characterMasking", "Character masking"), array("syntheticData", "Synthetic data")),
                    array(array("dataPerturbation", "Data perturbation"), array("recordSurpression", "Record surpression")),
                    array(array("generalisation", "Generalisation"), array("pseudonymisation", "Pseudonymisation")),
                    array(array("swapping", "Swapping"), array("attributeSurpression ", "Attribute surpression")),
                );
                $spreadsheet=array(
                    array("data aggregation", "Data aggregation")
                );

                # these will loop break on an odd number of techniques in future
                foreach ($language as $techniqueGroup) {
                ?>
                <div class="row gy-3" id="languageTechniques">
                    
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="<?php echo $techniqueGroup[0][0]?>">
                        <?php echo $techniqueGroup[0][1]?></label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="<?php echo $techniqueGroup[1][0]?>">
                        <?php echo $techniqueGroup[1][1] ?></label>
                    </div>

                </div>
                <?php
                }

                foreach ($spreadsheet as $technique) {
                ?>
                <div class="row" id="spreadsheetTechniques">

                    <div class="col-md-12">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="<?php echo $techniqueGroup[0][0]?>">
                        <?php echo $techniqueGroup[0][1]?></label>
                    </div>

                </div>
                <?php } ?>
            </div>
            
            <div style="text-align: center">
                <label for="submit" class="btn btn-success btn-xl">Sanitize</label>
                <input type="submit" id="submit" style="display: none;">
            </div>
        </form>
        
        <script src="javascript/sanitizerHome.js"></script>
    </body>
</html>
