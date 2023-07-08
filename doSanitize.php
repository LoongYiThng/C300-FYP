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
    echo '<pre>'; print_r($_FILES); echo '</pre>';
    
    #if ($_FILES['fileUpload']) {
    #    foreach ($file_ary as $file) {
    #        echo 'File Name: ' . $file['name'];
    #        echo 'File Type: ' . $file['type'];
    #        echo 'File Size: ' . $file['size'];
    #    }
    #}
    ?>

    <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
</body>
</html>