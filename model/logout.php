<?php
session_unset();
session_destroy();
header("refresh:5;url=".$address, true, 301);
?>