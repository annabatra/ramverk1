<?php

namespace Anax\View;

/**
 * Frontpage for books
 */

?>
<h1>Böcker</h1>

<?php
$urlToView = url("book");
$urlToCreate = url("book/create");
?>
<div style="height: 550px;">
    <h3>En sida om böcker, för böcker, av böcker...</h3>
    <p>De olika böckerna hittar du här:
        <br>
        <b><a href="<?= $urlToView ?>">Boklista</a></b>
    <p>
    <p>Vill du lägga till en egen bok görs det här:
        <br>
        <b><a href="<?= $urlToCreate ?>">Lägg till bok</a></b>
    </p>
</div>
