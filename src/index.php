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



mysqli_close($dbConnection);
?>


<head>
    <meta charset="utf-8" />
    <title>Büchereisystem</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body id="page-container">
    <div id="ausleihen-container" class="flex category-container" >
        <h2 class="header">Ausleihen</h2>
        <input class="searchbar" type="text">
        <h3 class="header">Filter</h3>
        <select>
            <option>Filter</option>
            <option>super toll</option>
        </select>

        <select>
            <option>Filter</option>
            <option>super toll</option>
        </select>

        <select>
            <option>Filter</option>
            <option>super toll</option>
        </select>

        <select>
            <option>Filter</option>
            <option>super toll</option>
        </select>

        <div>

        </div>
    </div>
    <div id="zurueckgeben-container" class="flex category-container">
        <h2 class="header">Zurueckgeben</h2>
        <input class="searchbar" type="text">

    </div>
</body>