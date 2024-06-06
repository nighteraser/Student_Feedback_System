<?php
session_start();
session_unset();
session_destroy();
header("Location: comment_page.php");
exit();
?>
