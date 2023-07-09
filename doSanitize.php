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
    
    
    ?>

    <a class="btn btn-primary btn-xl" href="sanitizerHome.php">return to home</a>
</body>
</html>