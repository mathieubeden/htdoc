<?php $titre = 'Mon Blog'; ?>

<?php ob_start(); ?>
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <a href="<?= "billet.php?id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a><button onclick="window.location.href='./deldel.php?id=<?= $billet['id'] ?>'">delet</button><br>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>