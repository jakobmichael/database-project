<?php

function connectToMSQL($server, $user, $passwd, $database)
{
    $conn = mysqli_connect($server, $user, $passwd, $database);
    if (mysqli_connect_errno()) {
        return 0;
    } else {
        return $conn;
    }
}


