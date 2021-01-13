<?php
ob_start();
?>

<section class="homepage">
    <h1>dégueuList</h1>
    <p>dégueuList est la pour vous-aidez à vous souvenir de certaine chose.</p>
    <p>Avec dégueuList vous pourrez créer des listes et leurs ajouter des taches.</p>
    <p>Avec dégueuList vous pourrez vomir à volonté grace a ses graphisme de merde.</p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
