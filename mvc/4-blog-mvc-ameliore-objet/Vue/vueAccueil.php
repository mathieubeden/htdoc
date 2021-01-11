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
        <button onclick="window.location.href='index.php?action=debilleter&id=<?= $billet['id'] ?>'">supprimer</button>
    </article>
    <hr />
<?php endforeach; ?>
<br><form method="post" action="index.php?action=billeter">
    <input id="auteur" name="titre" type="text" placeholder="Votre titre" 
           required /><br>
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre truc à dire" required></textarea><br>
    <input type="submit" value="billeter" />
</form>
