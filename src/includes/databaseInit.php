<?php

function connectToMSQL($server, $user, $passwd, $database)
{
    $conn = mysqli_connect($server, $user, $passwd, $database);
    if (mysqli_connect_errno()) {
        $_SESSION["errorMessage"] = "Cant connect to database";
    } else {
        return $conn;
    }
}


