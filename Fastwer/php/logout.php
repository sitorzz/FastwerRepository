<?php
session_start();
session_destroy();
//destruyes la sesión y redireccionas a la página de index
print "<script>window.location='../index.php';</script>";
?>