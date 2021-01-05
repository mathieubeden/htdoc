<?php $titre = "Mon Blog - " . $billet['titre']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date'] ?></time>
    </header>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p> <button onclick="window.location.href='index.php?id=<?= $commentaire['id'] ?>&id2=<?= $billet['id'] ?>&action=comdel'">delete</button><br>
<?php endforeach; ?>
<form action="index.php?id=<?= (int)$_GET['id'] ?>&action=complus&id2=<?= $billet['id']?>" method="post">
    auteur : <input type="text" require name="auteur" id="auth"><br>
    comment : <textarea require cols="80" rows="5" id="commentary" name="contenu"></textarea><br>
    <input type="submit" value="soumission">
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
