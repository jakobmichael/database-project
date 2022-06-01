<?php
?>
<form method="post">
    <button name="rueckgabe" value=<?=$book->getBuchID() . "+" . $book->getKundenID() ?> type="submit">Jetzt zurückgeben</button>
</form>