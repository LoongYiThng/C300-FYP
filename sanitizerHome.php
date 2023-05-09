<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>home</title>
        <?php include "design.php"; ?>
    </head>
    <body>
        <?php include "navbar.php"; ?>

        <h1>Choose how you want to get started</h1>

        <div class="container" style="padding: 50px 0px 50px">
            <div class="row gy-3">

                <div class="col-md-4">
                    <div class="card h-100">
                        <h4><b>upload a microsoft word file (.docx)</b></h4>
                        <p>suitable for large files</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <h4><b>upload a text file (.txt)</b></h4>
                        <p>suitable for small files</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <h4><b>paste raw text</b></h4>
                        <p>fast and suitable for testing different sanitization techniques or extremely small strings of text</p>
                    </div>
                </div>

            </div>
        </div>

        <h1>Select a technique</h1>

        <div class="container" style="padding: 50px 0px 50px">
            <div class="row gy-3" style="padding: 10px 0px 10px">

                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>record surpression</h4></button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>character masking</h4></button>
                </div>

            </div>
            <div class="row gy-3" style="padding: 10px 0px 10px">

                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>pseudonymisation</h4></button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>generalisation</h4></button>
                </div>

            </div>
            <div class="row gy-3" style="padding: 10px 0px 10px">

                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>swapping</h4></button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>data perturbation</h4></button>
                </div>

            </div>
            <div class="row gy-3" style="padding: 10px 0px 10px">

                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>data aggregation</h4></button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-xl"><h4>synthetic data</h4></button>
                </div>

            </div>
        </div>
    </body>
</html>
