<?php $this->titre = "stim discôrd rédit timeviewer"; ?>

<button onclick="window.location.href='index.php?action=modificateur'">chirurgien esthétique</button>

<form class="formule" action="index.php?action=incript" method="post">
    nom : <input required type="text" name="nom"><br>
    prenom : <input required type="text" name="prenom" id="pren"><br>
    intitulé de formtion : <input required type="text" name="intit" id="intit"><br>
    date de début : <input required type="date" name="debut" id="debut"><br>
    date de fin : <input required type="date" name="fin" id="fin"><br>
    adresse email : <input required type="email" name="email" id="email"><br>
    <input required type="checkbox" name="cluf" id="cluf"> j"accept les condition visible sur ce <a href="cluf.php">lien</a><br>
    <input type="submit" value="envoyer">
</form>
<hr />
<form action="index.php?action=delete" method="post">
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
<br>