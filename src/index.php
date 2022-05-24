<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

include($rootPath . "/includes/databaseInit.php");
include($rootPath . "/includes/tableInit.php");
include($rootPath . "/includes/tableFunctions.php");

$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "library";

$dbConnection = connectToMSQL($servername, $username, $password, $databaseName);

$result = insertIntoTable($dbConnection, "cities", ["plz", "name", "country"], ["77836", "Stollhofen", "DE"]);

print($result);

if($result == 1) {
    print("success");
} else {
    print("fail");
}

mysqli_close($dbConnection);
?>


<head>
    <meta charset="utf-8" />
    <title>Büchereisystem</title>
</head>

<body>
    <h1>TEST</h1>

</body>