<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>about us</title>
        <?php include "design.php"; ?>
        <link rel="stylesheet" href="stylesheets/about.css">
    </head>
    <body>
        <?php include "navbar.php"; ?>

        <div class="bigHeader">
            <h1>Purpose</h1>
            <h2 style="text-align: center;">To automate data sanitizing through the use of scripts or web application</h2>
        </div>

        <h2>How it works</h2>
        <img src="images/how it works.png" alt="how it works">
        <p>
            It starts with you, the user of the application uploading a document to the website. Currently we support word files, 
            text files and typing arbitrary text. Once that is done, all you need to do is choose one or 
            more sanitization techniques. Finally, select submit and your file will be submitted to our servers for processing.
            Once sanitized, the file will be available for download. However please remember to check that your file is
            legitimate and genuine by comparing the downloaded files's hash value with the website's hash value.
        </p>

        <h2>To find out more</h2>
        <p>
            If you have any further questions about the inner workings of this website be sure to download and check our 
            documentation below. If you have any questions about the sanitization techniques you may find them below as well, for 
            simpler succinct explanations, we do have documentation attached to each technique listed in the "search techniques" 
            tab of the navigation bar at the very top of your screen. 
        </p>
        <div class="container">
            <div class="row gy-3">

                <div class="col-md-6">
                    <div class="card h-100">
                        <i class="fas fa-user fa-6x"></i>
                        <div class="card-body">
                            <h3><strong>Download user documentation</strong></h3>
                            Contains all explanations on the inner working of the website such as:
                            <ol>
                                <li>Low level operations</li>
                                <li>Application architecture</li>
                                <li>User privacy</li>
                                <li>Navigating the website</li>
                                <li>Technologies used by website</li>
                            </ol>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary btn-xl" role="button" href="downloads/user_documentation.docx" download><i class="fas fa-download"></i> download</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <i class="fas fa-tools fa-6x"></i>
                        <div class="card-body">
                            <h3><strong>Download technique documentation</strong></h3>
                            Contains highly detailed explanations about all available techniques such as:
                            <ol>
                                <li>How the technique works</li>
                                <li>Low level technique implementation</li>
                                <li>Technique integration into website</li>
                                <li>Storage of techniques</li>
                                <li>Technologies used by techniques</li>
                            </ol>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary btn-xl" role="button" href="downloads/techniques_documentation.docx" download><i class="fas fa-download"></i> download</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <p>
            If you still need help you may refer to the next section for methods of contacting us, we are reachable in any of the 
            contacts provided in the section below and will respond in at least 3 working days.
        </p>

        <h2>About us</h2>
        <p>
            This web application was created by a group of RP students as a first year project, you may contact us by <br>
            <i class="fas fa-envelope"></i> Mail: <a href="mailto:21005024@myrp.edu.sg">21005024@myrp.edu.sg</a><br>
            <i class="fas fa-phone"></i> Phone: (+65) 8282 9084
        </p>
        
    </body>
</html>