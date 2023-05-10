<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>home</title>
        <?php include "design.php"; ?>
    </head>
    <body>
        <?php include "navbar.php"; ?>
        
        <form action="doSanitize.php" method="get">
            <h1>Choose how you want to get started</h1>

            <div class="container" style="padding: 50px 0px 50px">
                <div class="row gy-3">

                    <div class="col-md-4">
                        <div class="card h-100">
                            <i class="fas fa-file-word fa-6x" style="text-align: center;"></i>
                            <div class="card-body">
                                <h2><b>upload a microsoft word file (.docx)</b></h2>
                                <p>suitable for large files<p>
                            </div>
                            <div class="card-footer">
                                <label  for="wordFile" class="btn btn-primary btn-xl"><i class="fas fa-upload"></i> choose file</label>
                                <input type="file" id="wordFile" name="wordFile" accept=".docx" style="display: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <i class="fas fa-file-alt fa-6x" style="text-align: center;"></i>
                            <div class="card-body">
                                <h2><b>upload a text file (.txt)</b></h2>
                                <p>suitable for small files</p>
                            </div>
                            <div class="card-footer">
                                <label for="textFile" class="btn btn-primary btn-xl"><i class="fas fa-upload"></i> choose file</label>
                                <input type="file" id="textFile" name="textFile" accept=".txt" style="display:none">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <i class="fas fa-paste fa-6x" style="text-align: center;"></i>
                            <div class="card-body">
                                <h2><b>paste raw text</b></h2>
                                <p>suitable for testing different sanitization techniques or extremely small strings of text</p>
                            </div>
                            <div class="card-footer">
                                <label for="pasteText">paste text here:</label>
                                <textarea class="form-control" id="pasteText" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <h1>Select a technique</h1>

            <div class="container" style="padding: 50px 0px 50px">
                <div class="row gy-3" style="padding: 10px 0px 10px">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="recordSurpression"> record surpression</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="characterMasking"> character masking</label>
                    </div>

                </div>
                <div class="row gy-3" style="padding: 10px 0px 10px">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="pseudonymisation"> pseudonymisation</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="generalisation"> generalisation</label>
                    </div>

                </div>
                <div class="row gy-3" style="padding: 10px 0px 10px">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="swapping"> swapping</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="dataPerturbation"> data perturbation</label>
                    </div>

                </div>
                <div class="row gy-3" style="padding: 10px 0px 10px">

                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="dataAggregation"> data aggregation</label>
                    </div>
                    <div class="col-md-6">
                        <label class="btn btn-primary btn-xl"><input type="checkbox" name="syntheticData"> synthetic data</label>
                    </div>

                </div>
            </div>
            <div style="text-align: center">
                <label for="submit" class="btn btn-success btn-xl">sanitize</label>
                <input type="submit" id="submit" style="display: none;">
            </div>
        </form>
    </body>
</html>
