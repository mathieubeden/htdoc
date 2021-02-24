<?php $this->titre = "steem discôrd réddit timeviewer"; ?>

<button onclick="window.location.href='index.php'">retour chez le boucher</button><br><br>
<hr />


<form action="index.php?action=modif" method="post">
    <?php foreach ($billets as $billet) : ?>
        <article>
            <header>
                <input type="text" name="nom[]" value="<?= $billet["nom"] ?>">
                <input type="text" name="prenom[]" value="<?= $billet["prenom"] ?>"><br>
                a choisi la formation de : <input type="text" name="intit[]" value="<?= $billet["intit"] ?>"><br>
                commence le <input type="date" name="debut[]" value="<?= $billet["debut"] ?>"><br>
                termine le <input type="date" name="fin[]" value="<?= $billet["fin"] ?>"><br>
                <input type="hidden" name="id[]" value="<?= $billet["id"] ?>">
            </header>
            e-mail : <input type="email" name="email[]" value="<?= $billet["email"] ?>"><br>
        </article>
        <hr />
    <?php endforeach; ?>
    <input type="submit" value="chérie, ca va couper !">
</form>