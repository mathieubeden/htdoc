<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post">
    nom :<input type="text" name="nom" >
    <br>
    prenom :<input type="text" name="prenom">
    <br>
    pass :<input type="password" name="maze" id="aze">
    <br>
    pass : <textarea name="txt" id="t" cols="30" rows="10"></textarea>
    <input type="checkbox" name="pays[]" value="Fr" />France<br />
    <input type="checkbox" name="pays[]" value="Es" />Espagne<br />
    <input type="checkbox" name="pays[]" value="Ru" />Russie<br />
    <input type="checkbox" name="pays[]" value="de" />Allemagne<br />
    <br>
    <select name="pays">
        <option value="F" selected="selected">France</option>
        <option value="E">Espagne</option>
        <option value="R">Russie</option>
    </select>
    <br>
    <input type="submit" name='fraz' value="ok">
    </form>

    <p>nom : <?php echo $_POST['nom']; ?></p>
    <p>prenom : <?php echo $_POST['prenom']; ?></p>
    <p>prenom : <?php echo $_POST['maze']; ?></p>
    <p>prenom : <?php echo $_POST['txt']; ?></p>
    <p>prenom : <?php if (isset($_POST["pays"])) {echo $_POST['pays'];} ?></p>
    <p> <?php if (isset($_POST["pays"])) {
echo "Les pays sélectionnés sont:";
print_r ($_POST["pays"]);
} else {
echo "aucun pays sélectionné.";
}
 ?></p>
<p> <?php echo $_POST['fraz']; ?> </p>
</body>
</html>
<?php
if (isset($_REQUEST["nom"])) {
echo "<br>Votre nom est:".$_REQUEST['nom']."<br />";
}
if (isset($_REQUEST["prenom"])) {
echo "<br>Votre prénom est : ".$_REQUEST['prenom'];
}
?>