<?php

include "session.php";
include "conexion.php";

if ($_POST["password"]==$_POST["confirm_password"]) {
        


$result = "UPDATE user SET password = '".$_POST["password"]."' where id = $id_session";

$con->query($result);

$con->close();

    echo "Password updated";

    } else {
    
        echo "</br>Sorry, there was an error changing your password. Make sura that you write the same passwords";
    }


print "<script>window.location='../profile.php';</script>";

?>