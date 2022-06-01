<?php

?>

<form action="" method="get" class="filter-form">
<h3 class="header filter-header" style="display: inline">Filter: </h3>

 <select name="kunde">

    <option value="-">-</option>

    <?php
        $sql = "SELECT Vorname, Nachname, KundenID FROM Kunde";

        $result = mysqli_query($dbConnection, $sql);

        if (mysqli_num_rows($result) > 0) {
       
          while($row = mysqli_fetch_assoc($result)) {
            echo "<option value= {$row["KundenID"]}>". $row["Vorname"] . " " .$row["Nachname"] . "</option>";
          }
        } else {
            echo "0 results";
        }
        ?>
</select>
    <button name="kundenSuche" value="kundenSuche" type="submit">Suche...</button>
</form>

