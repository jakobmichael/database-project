<?php


$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "bibliothek";

$conn = connectToMSQL($servername, $username, $password, $databaseName);

$DEFAULT = "-";


$baseSql = "SELECT b.* FROM buch b ";
$constraints = " WHERE b.BuchID not in (select BuchID FROM ausleihe) ";






if (isset($_POST["author"]) && $_POST["author"] !== $DEFAULT) {
	$autor = $_POST["author"];
	$baseSql .= ", autorbuchzuordnung abz ";
	$constraints .= " AND abz.AutorID = $autor AND abz.BuchID = b.BuchID ";
}

if (isset($_POST["genre"]) && $_POST["genre"] !== $DEFAULT) {
	$genreId = $_POST["genre"];

	$baseSql .= ", buchgenrezuordnung bgz";
	$constraints .= "AND bgz.GenreID = $genreId AND bgz.BuchID = b.BuchID";
}

if (isset($_POST["verlag"]) && $_POST["verlag"] !== $DEFAULT) {
	$verlagId = $_POST["verlag"];

	$constraints .= "AND b.VerlagID = $verlagId";
}


$sql = $baseSql . $constraints;


try {
	$result = mysqli_query($conn, $sql);
	return $result;
} catch (Throwable $th) {
	return 0;
}

mysqli_close($conn);
