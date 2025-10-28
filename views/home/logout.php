<?php
session_start();
session_destroy();
header("Location: /iBoss/index.php");
?>