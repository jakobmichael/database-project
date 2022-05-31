<?php

function getArrayValuesAsString($array)
{
    $autorenAsString = "";

    for ($i = 0; $i < count($array); $i++) {
        if ($i === count($array) - 1) {
            $autorenAsString .=  $array[$i];
        } else {
            $autorenAsString .= $array[$i] . ", ";
        }
    }

    return $autorenAsString;
}


foreach ($allBooks as $book) : ?>
    <div class="bookContainer">
        <h3><?= $book->getTitel() ?></h3>
        <br>
        <hr>


        <p>Autor:innen: <?= getArrayValuesAsString($book->getAutoren()); ?></p>
        <br>
        <p>Genre(s): <?= getArrayValuesAsString($book->getGenres()); ?></p>
        <br>

        <p><?= $book->getVerlag(); ?></p><br>
        <p id="description"><?= $book->getBeschreibung() ?></p>
        <br>
        <table>
            <tr>
                <td>ISBN: <?= $book->getISBN() ?></td>
            </tr>
            <tr>
                <td>Seitenzahl: <?= $book->getSeitenzahl() ?></td>
            </tr>
        </table>
        <table class="lagerPlatzTable">
            <thead>
                <tr>
                    <th class="lagerPlatzTableHeader">Stockwerk</th>
                    <th class="lagerPlatzTableHeader">Regal</th>
                    <th class="lagerPlatzTableHeader">Fach</th>
                </tr>
                <br>
                <tr>
                    <td class="lagerPlatzTableItem"><?= $book->getStockwerksnummer() ?></td>
                    <td class="lagerPlatzTableItem"><?= $book->getRegalnummer() ?></td>
                    <td class="lagerPlatzTableItem"><?= $book->getRegalfach() ?></td>
                </tr>
            </thead>
        </table>
    </div>


<?php endforeach; ?>