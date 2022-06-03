<?php

?>

<form action="index.php" method="get" class="filter-form">

  <p class="label-and-select">
    <label for="kunde">Kunde</label>
    <select name="kunde">

      <option value="-">-</option>

      <?php
      $sql = "SELECT Vorname, Nachname, KundenID FROM Kunde";

      $result = mysqli_query($dbConnection, $sql);

      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value= {$row["KundenID"]}>" . $row["Vorname"] . " " . $row["Nachname"] . "</option>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </select>
  </p>
  <p class="label-and-select">
    <label for="kundenSuche">&nbsp;</label>
    <button name="kundenSuche" value="kundenSuche" type="submit">Suche...</button>
  </p>
</form>