<?php

function getAllRentableBooks($conn)
{
    $sql = "SELECT * FROM `buch` where buch.BuchID not in (select BuchID from ausleihe)";
    try {
        $allRentableBookResults = mysqli_query($conn, $sql);

        return $allRentableBookResults;
    } catch (Throwable $th) {
        $_SESSION["errorMessage"] = $th->getMessage();
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
        $_SESSION["errorMessage"] = $th->getMessage();
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
        $_SESSION["errorMessage"] = $th->getMessage();
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
        $_SESSION["errorMessage"] = $th->getMessage();
    }
}


function getAllGenresForBook($conn, $book)
{
    $buchId = $book->getBuchID();

    $sql = "SELECT g.Name FROM buchgenrezuordnung bgz, genre g WHERE bgz.BuchID = $buchId AND g.GenreID = bgz.GenreID";

    try {
        $result = mysqli_query($conn, $sql);
        return $result;
    } catch (Throwable $th) {
        $_SESSION["errorMessage"] = $th->getMessage();
    }
}

function getCustomerAndReturndateForRentedBook($conn, $book)
{
    $buchId = $book->getBuchID();

    $sql = "SELECT a.Rückgabedatum, k.Nachname, k.Vorname, k.KundenID FROM ausleihe a, kunde k WHERE a.BuchID = $buchId AND a.KundenID = k.KundenID";

    try {
        $result = mysqli_query($conn, $sql);


        return mysqli_fetch_assoc($result);
    } catch (Throwable $th) {
        $_SESSION["errorMessage"] = $th->getMessage();
    }
}



function instantiateBookObjectWithAllAttributes($conn, $book, $rentable)
{

    $lagerplatzResult = getLagerplatzForBook($conn, $book);
    $verlagResult = getVerlagForBook($conn, $book);

    while ($lagerplatz = mysqli_fetch_array($lagerplatzResult)) {

        $book->setStockwerksnummer($lagerplatz["Stockwerksnummer"]);
        $book->setRegalnummer($lagerplatz["Regalnummer"]);
        $book->setRegalfach($lagerplatz["Regalfach"]);
    }

    while ($verlag = mysqli_fetch_array($verlagResult)) {
        $book->setVerlag($verlag["Name"]);
    }

    $autorenResult = getAllAuthorsForBook($conn, $book);
    $autorenListe = array();

    while ($autoren = mysqli_fetch_array($autorenResult)) {
        array_push($autorenListe, $autoren["Name"]);
    }
    $book->setAutoren($autorenListe);

    $genreResult = getAllGenresForBook($conn, $book);
    $genreListe = array();

    while ($genres = mysqli_fetch_array($genreResult)) {
        array_push($genreListe, $genres["Name"]);
    }
    $book->setGenres($genreListe);

    if (!$rentable) {
        $rentalData = getCustomerAndReturndateForRentedBook($conn, $book);
        $book->setRueckgabe(date_format(new DateTime($rentalData["Rückgabedatum"]), "d.m.Y"));
        $book->setKunde($rentalData["Nachname"] . ", " . $rentalData["Vorname"]);
        $book->setKundenID($rentalData["KundenID"]);
    }
}
