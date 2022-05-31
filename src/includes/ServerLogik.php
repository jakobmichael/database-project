<?php


$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "bibliothek";

$conn = connectToMSQL($servername, $username, $password, $databaseName);

$DEFAULT = "-";


$baseSql = "SELECT b.* FROM buch b ";
$constraints = " WHERE b.BuchID not in (select BuchID FROM ausleihe) ";

$baseTime = " 00:00:00.000000";




if (isset($_POST["buchSuche"])) {

	if ($_POST["author"] !== $DEFAULT) {
		$autor = $_POST["author"];
		$baseSql .= ", autorbuchzuordnung abz ";
		$constraints .= " AND abz.AutorID = $autor AND abz.BuchID = b.BuchID ";
	}

	if ($_POST["genre"] !== $DEFAULT) {
		$genreId = $_POST["genre"];

		$baseSql .= ", buchgenrezuordnung bgz";
		$constraints .= "AND bgz.GenreID = $genreId AND bgz.BuchID = b.BuchID";
	}

	if ($_POST["verlag"] !== $DEFAULT) {
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
} elseif (isset($_POST["buchID"])) {


	if (isset($_POST["buchID"]) && isset($_POST["kunde"]) && isset($_POST["rueckgabe"])) {

		$rueckgabe = $_POST["rueckgabe"];
		$buchId = $_POST["buchID"];
		$kundeId = $_POST["kunde"];
		$now = date("Y-m-d");
		if($rueckgabe > $now) {

			$sql = "INSERT INTO ausleihe (`Leihdatum`, `Rückgabedatum`, `BuchID`, `KundeID`) VALUES ('$now . $baseTime' , '$rueckgabe . $baseTime','$buchId','$kundeId')";
			
			try {
				 mysqli_query($conn, $sql);
				 return 1;
			} catch (Throwable $th) {
				return 0;
			}
		} else {
			return 0;
		}
	}
}


mysqli_close($conn);
