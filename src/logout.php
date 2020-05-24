<?php
@ob_start();
session_start();
?>
<?php
session_destroy();
header('Location: login.php');
?>
