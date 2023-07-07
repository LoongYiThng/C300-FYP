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
        print_r($_FILES);
        ?>

        <h1>WIP hashes</h1>
        <h2>for now these are the hashes of the uploaded files, not the downloaded files</h2>

        <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
    </body>
</html>