<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/ecom/index.php");
?>