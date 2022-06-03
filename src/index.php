<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

include($rootPath . "/includes/databaseInit.php");
include($rootPath . "/includes/helperFunctions.php");
include($rootPath . "/classes/buch.php");

session_start();

$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "bibliothek";

$dbConnection = connectToMSQL($servername, $username, $password, $databaseName);

if (!isset($_SESSION["allRentableBooks"])) {
    $_SESSION["allRentableBooks"] = retrieveBooksFromSqlResult(getAllRentableBooks($dbConnection), $dbConnection, "allRentableBooks");
}

if (!isset($_SESSION["allReturnableBooks"])) {
    $_SESSION["allReturnableBooks"] = array();
}

if (!isset($_SESSION["errorMessage"])) {
    $_SESSION["errorMessage"] = null;
}


function retrieveBooksFromSqlResult($result, $dbConnection, $rentable)
{

    $sessionArray = array();

    if ($result) {
        while ($buch = mysqli_fetch_array($result)) {
            $book = new Buch($buch);
            instantiateBookObjectWithAllAttributes($dbConnection, $book, $rentable);
            array_push($sessionArray, $book);
        }
        return $sessionArray;
    } else {
        return array();
    }
}


$DEFAULT = "-";


$baseSql = "SELECT b.* FROM buch b ";
$constraints = " WHERE b.BuchID not in (select BuchID FROM ausleihe) ";

$baseTime = " 00:00:00.000000";


if (isset($_GET["buchSuche"])) {

    if ($_GET["author"] !== $DEFAULT) {
        $autor = $_GET["author"];
        $baseSql .= ", autorbuchzuordnung abz ";
        $constraints .= " AND abz.AutorID = $autor AND abz.BuchID = b.BuchID ";
    }

    if ($_GET["genre"] !== $DEFAULT) {
        $genreId = $_GET["genre"];

        $baseSql .= ", buchgenrezuordnung bgz";
        $constraints .= "AND bgz.GenreID = $genreId AND bgz.BuchID = b.BuchID";
    }

    if ($_GET["verlag"] !== $DEFAULT) {
        $verlagId = $_GET["verlag"];

        $constraints .= "AND b.VerlagID = $verlagId";
    }


    $sql = $baseSql . $constraints;
    $_SESSION["allRentableBooks"] = retrieveBooksFromSqlResult(mysqli_query($dbConnection, $sql), $dbConnection, "allRentableBooks", true);
} elseif (isset($_GET["buchFilterZurueksetzen"])) {
    try {
        $baseSql .= "WHERE b.BuchID not in (select BuchID FROM ausleihe)";
        $_SESSION["allRentableBooks"] = retrieveBooksFromSqlResult(mysqli_query($dbConnection, $baseSql), $dbConnection, "allRentableBooks", true);
    } catch (Throwable $th) {
        $_SESSION["allRentableBooks"] = array();
        $_SESSION["errorMessage"] = $th->getMessage();
    }
}

if (isset($_POST["buchID"])) {

    if (isset($_POST["buchID"]) && isset($_POST["kunde"]) && isset($_POST["rueckgabe"])) {

        $rueckgabe = $_POST["rueckgabe"];
        $buchId = $_POST["buchID"];
        $kundeId = $_POST["kunde"];
        $now = date("Y-m-d");

        if ($rueckgabe > $now) {

            $sql = "INSERT INTO ausleihe (`Leihdatum`, `Rückgabedatum`, `BuchID`, `KundenID`) VALUES ('$now' , '$rueckgabe','$buchId','$kundeId')";
            try {
                mysqli_query($dbConnection, $sql);
            } catch (Throwable $th) {
                $_SESSION["errorMessage"] = $th->getMessage();
            } finally{
                $_SESSION["allRentableBooks"] = retrieveBooksFromSqlResult(getAllRentableBooks($dbConnection), $dbConnection, "allRentableBooks");
            }
        } else {
            $_SESSION["errorMessage"] = "Rückgabedatum muss nach dem Ausleihdatum liegen!";
        }
    }
}


if (isset($_POST["zurueckgeben"])) {
    $values = explode("+", $_POST["zurueckgeben"]);
    $buchId = $values[0];
    $kundeId = $values[1];

    $sql = "DELETE FROM ausleihe WHERE ausleihe.BuchID = $buchId AND ausleihe.KundenID = $kundeId";

    try {
        mysqli_query($dbConnection, $sql);
        $_SESSION["allReturnableBooks"] = array();
    } catch (Throwable $th) {
        $_SESSION["errorMessage"] = $th->getMessage();
    } finally{
         $_SESSION["allRentableBooks"] = retrieveBooksFromSqlResult(getAllRentableBooks($dbConnection), $dbConnection, "allRentableBooks");
    }
}

if (isset($_GET["kundenSuche"])) {
    $kundeId = $_GET["kunde"];
    $sql = "SELECT b.* FROM ausleihe a, buch b WHERE a.KundenID =$kundeId AND a.BuchID = b.BuchID";

    try {
        $_SESSION["allReturnableBooks"] = retrieveBooksFromSqlResult(mysqli_query($dbConnection, $sql), $dbConnection, false);
    } catch (Throwable $th) {
        $_SESSION["errorMessage"] = $th->getMessage();
        $_SESSION["allReturnableBooks"] = array();
    }
}

if (isset($_POST["fehlerZuruecksetzen"])) {
    $_SESSION["errorMessage"] = null;
}

?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Büchereisystem</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/rentableBooks.css">
    <link rel="stylesheet" href="css/ausleihFooter.css">
</head>

<header>
    <img alt="book-icon" src="/assets/images/book.png" width="25px" id="book-icon">
    <p>Büchereisystem </p>
    <a href="<?php $_SERVER['PHP_SELF']; ?>"><img alt="book-icon" src="/assets/images/refresh.png" width="20px" id="book-icon"></a>
    

</header>

<body id="page-container">
    <div id=<?= $_SESSION["errorMessage"] === null ? "invisible-error-container" :  "error-container" ?>>
        <p><?= $_SESSION["errorMessage"] ?></p>
        <br>
        <form action="index.php" method="post">
            <button type="submit" name="fehlerZuruecksetzen" value="fehlerZuruecksetzen">Fehler zurücksetzen</button>
        </form>
    </div>
    <div id="content-container">
        <div id="ausleihen-container" class="flex category-container">
            <h2 class="header">Ausleihen</h2>
            <?php
            include($rootPath . "/includes/suchFilter.php");
            ?>
            <div>
                <?php
                include($rootPath . "/includes/rentableBooks.php");
                ?>
            </div>
        </div>
        <div id="zurueckgeben-container" class="flex category-container">
            <h2 class="header">Zur&uuml;ckgeben</h2>
            <?php
            include($rootPath . "/includes/suchFilterZurueckgeben.php");
            ?>

            <div>
                <?php
                include($rootPath . "/includes/returnableBooks.php");
                ?>
            </div>
        </div>
    </div>
</body>

</html>