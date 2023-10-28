<?php
session_start();

// Unset and destroy the session.
session_unset();
session_destroy();

header('Location: index.php');
exit();
?>
