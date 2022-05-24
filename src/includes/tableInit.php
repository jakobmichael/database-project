<?php
include("tableClasses.php");

$cityAttributes = [
    new TableAttribute("plz", "VARCHAR(30)", "NOT NULL", "", "PRIMARY KEY", ""),
    new TableAttribute("name", "VARCHAR(30)", "NOT NULL", "", "", ""),
    new TableAttribute("country", "VARCHAR(30)", "NOT NULL", "", "", ""),
];

$customerAttributes = [
    new TableAttribute("id", "INT", "NOT NULL", "AUTO_INCREMENT", "PRIMARY KEY", ""),
    new TableAttribute("nachname", "VARCHAR(30)", "NOT NULL", "", "", ""),
    new TableAttribute("vorname", "VARCHAR(30)", "NOT NULL", "", "", ""),
    new TableAttribute("email", "VARCHAR(30)", "NOT NULL", "", "", ""),
    new TableAttribute("straße", "VARCHAR(30)", "NOT NULL", "", "", ""),
    new TableAttribute("hausnummer", "INT", "NOT NULL", "", "", ""),
    new TableAttribute("geburtsdatum", "DATE", "NOT NULL", "", "", ""),
    new TableAttribute("plz", "VARCHAR(30)", "NOT NULL", "", "", ""),
    new TableAttribute("", "", "", "", "", "CONSTRAINT fk_cu_city FOREIGN KEY (plz) REFERENCES cities(plz)"),
];





$cities = new LibraryTable("cities", $cityAttributes);
$customers = new LibraryTable("customers", $customerAttributes);

function createTable($conn, $database, $table)
{

    $sql = "CREATE TABLE IF NOT EXISTS " . $database . "." . $table->tableName . " (";

    foreach ($table->attributes as $attr) {


        foreach ($attr as $value) {


            $sql .= " " . $value;
        }
        $sql .= ",";
    }

    $sql = substr($sql, 0, -1) . ")";


    if ($conn->query($sql) === TRUE) {
        //pass
    } else {
        //pass
    }
}
