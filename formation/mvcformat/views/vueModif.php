<?php $this->titre = "stim discôrd rédit timeviewer"; ?>

<button onclick="window.location.href='index.php'">bucher</button>


<form action="index.php?action=modif" method="post">
    <?php foreach ($billets as $billet) : ?>
        <article>
            <header>
                <h1 class="titreBillet"><?= $billet["nom"] . " " . $billet["prenom"] ?></h1>
                <p>a choisi la formation de : <?php echo $billet["intit"] ?></p>
                commence le <time><?php echo $billet["debut"] ?></time><br>
                termine le <time><?php echo $billet["fin"] ?></time>
                <div style="margin-left:80%"><input type="checkbox" name="id[]" value="<?= $billet["id"] ?>">à exécuter</div>
            </header>
            <p>e-mail : <?php echo $billet["email"] ?></p>
        </article>
        <hr />
    <?php endforeach; ?>
    <input type="submit" value="boureau, fait ton office !">
</form>