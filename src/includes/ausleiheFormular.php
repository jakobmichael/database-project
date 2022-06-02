<?php

?>
<form method="post" action="index.php">
    <input type="date" name="rueckgabe">
    <select class='selectMenu'  name="kunde">

        <option value="-">-</option>

        <?php
        $sql = "SELECT Nachname, Vorname, KundenID FROM kunde";

        $result = mysqli_query($dbConnection, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option class='selectOption' value= {$row["KundenID"]}>" . $row["Nachname"] . ", " . $row["Vorname"] . "</option>";
            }
        }
        ?>
    </select>
    <button type="submit" name="buchID" value=<?= $book->getBuchID() ?>>Ausleihen</button>
</form>
