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


function getAllRentableBooks($conn)
{
    $sql = "SELECT * FROM `buch` where buch.BuchID not in (select BuchID from ausleihe)";
    try {
        $result = mysqli_query($conn, $sql);

        return $result;
    } catch (Throwable $th) {
        return 0;
    }
}

function getLagerplatzForBook($conn, $book)
{
    $buchLagerplatzID = $book->getLagerplatzID();
    $sql = "SELECT l.Stockwerksnummer, l.Regalnummer,l.Regalfach FROM lagerplatz l, buch b WHERE l.LagerplatzID = $buchLagerplatzID";

    try {
        $result = mysqli_query($conn, $sql);
        return $result;
    } catch (Throwable $th) {
        return 0;
    }
}

function getVerlagForBook($conn, $book)
{
    $buchVerlagID = $book->getVerlagID();
    $sql = "SELECT v.Name FROM verlag v, buch b WHERE v.VerlagID = $buchVerlagID";

    try {
        $result = mysqli_query($conn, $sql);
        return $result;
    } catch (Throwable $th) {
        return 0;
    }
}


function getAllAuthorsForBook($conn, $book)
{
    $buchId = $book->getBuchID();

    $sql = "SELECT a.Name FROM autorbuchzuordnung abz, autor a WHERE abz.BuchID = $buchId AND a.AutorID = abz.AutorID";

    try {
        $result = mysqli_query($conn, $sql);
        return $result;
    } catch (Throwable $th) {
        return 0;
    }
}


function getAllGenresForBook($conn,$book) {
    $buchId = $book->getBuchID();

    $sql = "SELECT g.Name FROM buchgenrezuordnung bgz, genre g WHERE bgz.BuchID = $buchId AND g.GenreID = bgz.GenreID";

    try {
        $result = mysqli_query($conn, $sql);
        return $result;
    } catch (Throwable $th) {
        return 0;
    }
}


function addBookToAusleihe($ausleihe) {
   
}