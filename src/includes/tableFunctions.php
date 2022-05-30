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


function selectAllValuesFromTableWithoutConstraints($conn, $table ) {

    $sql = "SELECT * FROM $table";

    try {
        $result = mysqli_query($conn, $sql);
        
        return $result;
    } catch (Throwable $th) {
       return 0;
    }

}

function getLagerplatzForBook($conn,$book) {
    $buchLagerplatzID = $book->getLagerplatzID();
    $sql = "SELECT l.Stockwerksnummer, l.Regalnummer,l.Regalfach FROM lagerplatz l, buch b WHERE l.LagerplatzID = $buchLagerplatzID";

    try {
        $result = mysqli_query($conn, $sql);
        return $result;
    } catch (Throwable $th) {
       return 0;
    }
}

function getVerlagForBook($conn,$book) {
    $buchVerlagID = $book->getVerlagID();
    $sql = "SELECT v.Name FROM verlag v, buch b WHERE v.VerlagID = $buchVerlagID";

    try {
        $result = mysqli_query($conn, $sql);
        return $result;
    } catch (Throwable $th) {
       return 0;
    }
}
