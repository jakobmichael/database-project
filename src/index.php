<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];



include($rootPath . "/includes/databaseInit.php");
include($rootPath . "/includes/tableFunctionsForBooks.php");
include($rootPath . "/classes/buch.php");
include($rootPath . "/includes/ausleiheFormular.php");



$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "bibliothek";

$dbConnection = connectToMSQL($servername, $username, $password, $databaseName);

$result = getAllRentableBooks($dbConnection, "buch");
$allBooks = array();



if ($result) {
    $anzahl = mysqli_num_rows($result);
    while ($buch = mysqli_fetch_array($result)) {
        $book = new Buch($buch);
        $lagerplatzResult = getLagerplatzForBook($dbConnection, $book);
        $verlagResult = getVerlagForBook($dbConnection, $book);

        while ($lagerplatz = mysqli_fetch_array($lagerplatzResult)) {

            $book->setStockwerksnummer($lagerplatz["Stockwerksnummer"]);
            $book->setRegalnummer($lagerplatz["Regalnummer"]);
            $book->setRegalfach($lagerplatz["Regalfach"]);
        }

        while ($verlag = mysqli_fetch_array($verlagResult)) {
            $book->setVerlag($verlag["Name"]);
        }

        $autorenResult = getAllAuthorsForBook($dbConnection, $book);
        $autorenListe = array();

        while ($autoren = mysqli_fetch_array($autorenResult)) {
            array_push($autorenListe, $autoren["Name"]);
        }
        $book->setAutoren($autorenListe);

        $genreResult = getAllGenresForBook($dbConnection, $book);
        $genreListe = array();

        while ($genres = mysqli_fetch_array($genreResult)) {
            array_push($genreListe, $genres["Name"]);
        }
        $book->setGenres($genreListe);

        array_push($allBooks, $book);
    }
} else {
    echo "SQL-Fehler!<br>SQL meldet: " . mysqli_error($dbConnection);
}
?>


<head>
    <meta charset="utf-8" />
    <title>Büchereisystem</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/rentableBooks.css">
</head>

<body id="page-container">
    <div id="ausleihen-container" class="flex category-container">
        <form action= "" method="post">
            <h2 class="header">Ausleihbare Bücher</h2>
            <label for="rückgabe">Rückgabedatum</label>
            <input type="date" name="rückgabe">

            <h3 class="header">Filter</h3>
            <select name="author">
                <option value="Alle">Alle Autor:innen</option>
                <?php
                $sql = "SELECT Name FROM Autor";

                $result = mysqli_query($dbConnection, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option>" . $row["Name"] . "</option>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </select>

            <select name="verlag">
                <option value="option1-filter2">Filter</option>
                <option value="option2-filter2">super toll</option>
            </select>

            <button type="submit">Suche...</button>
        </form>
        <div>
            <?php
            include($rootPath . "/includes/rentableBooks.php");
            ?>
        </div>
    </div>
    <div id="zurueckgeben-container" class="flex category-container">
        <h2 class="header">Buchrückgabe</h2>
    </div>

    <?php
    mysqli_close($dbConnection);
    ?>
</body>