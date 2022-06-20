<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

session_start();

$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "bibliothek";

$dbConnection = mysqli_connect($servername, $username, $password, $databaseName);


if (isset($_POST["addBook"])) {

    if (isset($_POST["titel"]) && isset($_POST["description"]) && isset($_POST["isbn"]) && isset($_POST["seitenzahl"]) && isset($_POST["erschienen"]) && isset($_POST["lagerplatzid"]) && isset($_POST["verlagid"])) {

        $titel = $_POST["titel"];
        $description = $_POST["description"];
        $isbn = $_POST["isbn"];
        $seitenzahl = $_POST["seitenzahl"];
        $erschienen = $_POST["erschienen"];
        $lagerplatzid = $_POST["lagerplatzid"];
        $verlagid = $_POST["verlagid"];
        $genreid = $_POST["genreid"];
        $autorid = $_POST["autorid"];

        $sql = "INSERT INTO buch (`Titel`, `ISBN`, `Seitenzahl`, `Erschienen`, `Beschreibung`, `LagerplatzID`, `VerlagID`) VALUES ('$titel', '$isbn', '$seitenzahl', '$erschienen', '$description', '$lagerplatzid', '$verlagid')";
        $sqlZuordnungen = "INSERT INTO buchgenrezuordnung ( `BuchID`, `GenreID`) VALUES ((SELECT BuchID FROM buch WHERE ISBN = '$isbn'), $genreid) AND INSERT INTO autorbuchzuordnung (`BuchID`, `AutorID`) VALUES ((SELECT BuchID FROM buch WHERE ISBN = '$isbn'), $autorid) ";
        try {
            mysqli_query($dbConnection, $sql);
            mysqli_query($dbConnection, $sqlZuordnungen);
        } catch (Throwable $th) {
            $_SESSION["errorMessage"] = $th->getMessage();
        }
    }
} else if (isset($_POST["addUser"])) {
    if (isset($_POST["vorname"]) && isset($_POST["nachname"]) && isset($_POST["strasse"]) && isset($_POST["hausnummer"]) && isset($_POST["plz"]) && isset($_POST["email"]) && isset($_POST["geburtsdatum"])) {

        $vorname = $_POST["vorname"];
        $nachname = $_POST["nachname"];
        $strasse = $_POST["strasse"];
        $hausnummer = $_POST["hausnummer"];
        $plz = $_POST["plz"];
        $email = $_POST["email"];
        $geburtsdatum = $_POST["geburtsdatum"];

        $sql = "INSERT INTO kunde (`Nachname`, `Vorname`, `Straße`, `Hausnummer`, `PLZ`, `Geburtsdatum`, `Email`) VALUES ('$nachname', '$vorname', '$strasse', '$hausnummer', '$plz', '$email', '$geburtsdatum')";

        try {
            mysqli_query($dbConnection, $sql);
        } catch (Throwable $th) {
            $_SESSION["errorMessage"] = $th->getMessage();
        }
    } else {
        $_SESSION["errorMessage"] = "Alle Felder sollten gesetzt sein";
    }
}



if (isset($_POST["fehlerZuruecksetzen"])) {
    $_SESSION["errorMessage"] = null;
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>B&uuml;chereisystem</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/registration.css">
</head>
<header>
    <a href="index.php">
        <img alt="book-icon" src="/assets/images/book.png" width="25px" id="book-icon">
    </a>
    <p>B&uuml;chereisystem </p>
    <a href="<?php $_SERVER['PHP_SELF']; ?>"><img alt="book-icon" src="/assets/images/refresh.png" width="20px" id="book-icon"></a>
</header>

<body class="page-container">
    <div id=<?= $_SESSION["errorMessage"] === null ? "invisible-error-container" :  "error-container" ?>>
        <p><?= $_SESSION["errorMessage"] ?></p>
        <br>
        <form action="registration.php" method="post">
            <button type="submit" id="fehler-zuruecksetzen" name="fehlerZuruecksetzen" value="fehlerZuruecksetzen">Fehler zurücksetzen</button>
        </form>
    </div>
    <div class="form-container">
        <?php
        include($rootPath . "/includes/addUser.php");
        ?>
    </div>
    <div class="form-container">
        <?php
        include($rootPath . "/includes/addBook.php");
        ?>
    </div>
</body>

</html>