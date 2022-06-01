<?php

function getArrayyValuesAsString($array)
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
        <h2><?= $book->getTitel() ?></h2>
        <br>
        <hr>


        <p>Autor:innen: <?= getArrayyValuesAsString($book->getAutoren()); ?></p>
        <br>
        <p>Genre(s): <?= getArrayyValuesAsString($book->getGenres()); ?></p>
        <br>


        <div class="description">
            <h4>Beschreibung <img id="arrowDown" src="../assets/images/down-arrow.png" alt="arrow down" />
                <h4>
                    <p><?= $book->getBeschreibung() ?></p>
        </div>
        <br>
        <hr>
        <div class="tableContainer">

            <table id="bookInformationTable">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Seitenzahl</th>
                        <th>Verlag</th>
                    </tr>
                </thead>
                <tr>
                    <td class="tableItem"><?= $book->getISBN() ?></td>
                    <td class="tableItem"> <?= $book->getSeitenzahl() ?></td>
                    <td class="tableItem"> <?= $book->getVerlag(); ?></td>
                </tr>

            </table>



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
        </div>
        <hr>

        <?php include($rootPath . "/includes/ausleihe.php"); ?>
    </div>


<?php endforeach; ?>