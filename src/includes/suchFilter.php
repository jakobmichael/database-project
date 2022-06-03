<?php

?>

<form action="index.php" method="get" class="filter-form">

  <p class="label-and-select">
    <label for="author">Autor</label>
    <select name="author">

      <option value="-">-</option>

      <?php
      $sql = "SELECT Name, AutorID FROM Autor";

      $result = mysqli_query($dbConnection, $sql);

      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value= {$row["AutorID"]}>" . $row["Name"] . "</option>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </select>
  </p>


  <p class="label-and-select">
    <label for="genre">Genre</label>
    <select name="genre">
      <option value="-">-</option>
      <?php
      $sql = "SELECT Name, GenreID FROM genre";

      $result = mysqli_query($dbConnection, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value= {$row["GenreID"]}>" . $row["Name"] . "</option>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </select>
  </p>

  <p class="label-and-select">
    <label for="verlag">Verlag</label>
    <select name="verlag">
      <option value="-">-</option>
      <?php
      $sql = "SELECT Name, VerlagID FROM verlag";

      $result = mysqli_query($dbConnection, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value= {$row["VerlagID"]}>" . $row["Name"] . "</option>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </select>
  </p>
  <p class="label-and-select">
    <label for="verlag">&nbsp;</label>
    <button name="buchFilterZurueksetzen" value="buchFilterZurueksetzen" type="submit">Zurücksetzen</button>
  </p>
  <p class="label-and-select">
    <label for="verlag">&nbsp;</label>
    <button name="buchSuche" value="buchSuche" type="submit">Suche...</button>
  </p>
</form>

