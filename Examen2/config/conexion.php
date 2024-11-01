<?php
    function conexion(): mysqli{
    $db = mysqli_connect("localhost", "root", "", "bienesraices3E");

    if ($db) {
        echo "Seller Created";
    } else {
        echo "Seller Not Created" . mysqli_connect_error();
    }
    return $db;
    }

?>