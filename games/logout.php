<?php
    session_start();
    session_destroy();
    require('header.php');

?>

<a href="index.php">Back to home</a>

<?php require('footer.php'); ?>