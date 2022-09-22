<?php
require_once '../config/APP.php';
session_start();
session_destroy();
print "<script>alert(\"La seccion se va a cerrar\");
window.location='';</script>";
header("location:".SERVERURL);