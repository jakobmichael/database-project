<?php

//---------------------------------------------
// WARNING: this doesn't include sanitization
// and validation
//---------------------------------------------
if (isset($_POST['ausleihe-suche'], $_POST['filter1'], $_POST['filter2'], $_POST['filter3'], $_POST['filter4'])) {
	$ausleiheSuche = $_POST['ausleihe-suche'];
	$filter1 = $_POST['filter1'];
	$filter2 = $_POST['filter2'];
	$filter3 = $_POST['filter3'];
	$filter4 = $_POST['filter4'];

	// show the $name and $email
	echo "Gesucht wurde $ausleiheSuche.<br>";
	echo "mit den Filtern: $filter1 , $filter2 , $filter3 , $filter4";
} else {
	echo 'You need to fill all input field.';
}