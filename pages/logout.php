<?php
session_start();
session_destroy();
echo "Hello ";
header("Location: ../login.php");

?>