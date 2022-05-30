<?php




foreach ($allBooks as $book) : ?>
    <div class="bookContainer">
        <h3><?= $book->getTitel() ?></h3>
        <hr>
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
                    <th class="lagerPlatzTableHeader" >Regal</th>
                    <th class="lagerPlatzTableHeader" >Fach</th>
                </tr>
                <br>
                <tr>
                    <td class="lagerPlatzTableItem"><?=$book->getStockwerksnummer()?></td>
                    <td class="lagerPlatzTableItem"><?=$book->getRegalnummer()?></td>
                    <td class="lagerPlatzTableItem"><?=$book->getRegalfach()?></td>
                </tr>
            </thead>
        </table>
        <p><?=$book->getVerlag();?></p>
    </div>


<?php endforeach; ?>