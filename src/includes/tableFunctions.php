<?php

function insertIntoTable($conn, $table, $columns, $values)
{
    $sql = "INSERT INTO "  . $table . "(";

    foreach ($columns as $column) {
        $sql .= $column . ",";
    }

    $sql = substr($sql, 0, -1) . ") VALUES (";

    foreach ($values as $value) {
        $sql .= "'" . $value . "',";
    }

    $sql = substr($sql, 0, -1) . ")";
    
    try {
        mysqli_query($conn, $sql);
        return 1;
    } catch (Throwable $th) {
       return 0;
    }
}
