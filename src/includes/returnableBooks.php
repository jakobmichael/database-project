<?php

$allReturnableBooks = $_SESSION["allReturnableBooks"];

if (count($allReturnableBooks) > 0) :
    
    foreach ($allReturnableBooks as $book) : ?>
        <div class="bookContainer">
            <h2><?= $book->getTitel() ?></h2>
            <br>
            <hr>


            <p>Autor:innen: <?= getArrayValuesAsString($book->getAutoren()); ?></p>
            <br>
            <p>Genre(s): <?= getArrayValuesAsString($book->getGenres()); ?></p>
            <br>
            <hr>
            <table class="lagerPlatzTable">
                <thead>
                    <tr>
                        <th class="lagerPlatzTableHeader" colspan="3">Lagerort in der Bibliothek</th>
                    </tr>
                    <tr>
                        <th class="lagerPlatzTableHeaderItem">Stockwerk</th>
                        <th class="lagerPlatzTableHeaderItem">Regal</th>
                        <th class="lagerPlatzTableHeaderItem">Fach</th>
                    </tr>
                    <br>
                    <tr>
                        <td class="tableItem"><?= $book->getStockwerksnummer() ?></td>
                        <td class="tableItem"><?= $book->getRegalnummer() ?></td>
                        <td class="tableItem"><?= $book->getRegalfach() ?></td>
                    </tr>
                </thead>
            </table>

            <hr>
            <div>
                <p>Geliehen von:<?= $book->getKunde() ?> </p>
                <br>
                <p>Rückgabe bis spätestens: <?= $book->getRueckgabe() ?></p>
            </div>
            <hr>
            <?php include($rootPath . "/includes/rueckgabe.php"); ?>
        </div>
    <?php endforeach;
else : ?>
    <div>
        <h3>Keine Ergebnisse gefunden</h3>
    </div>
<?php endif ?>