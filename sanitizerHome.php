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
                                <textarea class="form-control" id="pasteText" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <h1><strong>Select a technique</strong></h1>
            <h2 style="text-align: center;">You may choose one or more techniques for sanitization.</h2>
            <p style="margin: 0px 20px 0px 20px;">
                If you are not sure about which techniques to choose or how they work, try testing them some sample input to the 
                raw text field above or read more on the technique documentation here
            </p>

            <div class="container">
                <div class="row gy-3">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="recordSurpression"> Record surpression</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="characterMasking"> Character masking</label>
                    </div>

                </div>
                <div class="row gy-3">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="pseudonymisation"> Pseudonymisation</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="generalisation"> Generalisation</label>
                    </div>

                </div>
                <div class="row gy-3">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="swapping"> Swapping</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="dataPerturbation"> Data Perturbation</label>
                    </div>

                </div>
                <div class="row gy-3">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="dataAggregation"> Data Aggregation</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="syntheticData"> Synthetic Data</label>
                    </div>

                </div>
            </div>
            
            <div style="text-align: center">
                <label for="submit" class="btn btn-success btn-xl">Sanitize</label>
                <input type="submit" id="submit" style="display: none;">
            </div>
        </form>
    </body>
</html>
