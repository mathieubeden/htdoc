<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <time><?php echo $billet['date'] ?></time>
        </header>
        <p><?php echo $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
