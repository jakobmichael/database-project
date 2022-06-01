<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];



include($rootPath . "/includes/databaseInit.php");
include($rootPath . "/includes/helperFunctions.php");
include($rootPath . "/classes/buch.php");



$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "bibliothek";

$dbConnection = connectToMSQL($servername, $username, $password, $databaseName);

$allRentableBookResults = getAllRentableBooks($dbConnection);
$allRentableBooks = array();

$allReturnableBooksResult = null;
$allReturnableBooks = array();


include($rootPath . "/includes/requestHandler.php");


if ($allRentableBookResults) {
    $anzahl = mysqli_num_rows($allRentableBookResults);
    while ($buch = mysqli_fetch_array($allRentableBookResults)) {
        $book = new Buch($buch);
        instantiateBookObjectWithAllAttributes($dbConnection,$book,true);

        array_push($allRentableBooks, $book);
    }
} 


if ($allReturnableBooksResult !==null) {
    $anzahl = mysqli_num_rows($allReturnableBooksResult);
    while ($buch = mysqli_fetch_array($allReturnableBooksResult)) {
        $book = new Buch($buch);
        instantiateBookObjectWithAllAttributes($dbConnection,$book,false);

        array_push($allReturnableBooks, $book);
    }
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

<body id="page-container">
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
        <h2 class="header">Zurueckgeben</h2>
        <?php
        include($rootPath . "/includes/suchFilterZurueckgeben.php");
        ?>

        <div>
            <?php
            include($rootPath . "/includes/returnableBooks.php");
            ?>
        </div>
    </div>


    <?php
    mysqli_close($dbConnection);
    ?>
</body>

</html>