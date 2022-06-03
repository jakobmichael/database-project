<?php
?>
<form method="post" action="index.php">
    <button id="zurueckgeben-button"name="zurueckgeben" value=<?=$book->getBuchID() . "+" . $book->getKundenID() ?> type="submit">Jetzt zurückgeben</button>
</form>