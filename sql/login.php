<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lagon</title>
</head>
<body>
    <form action="verific.php?miss=<?php if(isset($_GET['miss'])){echo $_GET['miss'];}?>" method="post">
        <input type="text" name="user"><br>
        <input type="password" name="pass" id="pass">
        <?php  if(isset($_GET['test'])){echo '<p>login manquant</p>';} ?>
        <br>
        <input type="submit" value="login">
    </form>
    <h3><?php if(isset($_GET['miss'])){echo "fails : ".$_GET['miss']."<br>";} ?></h3>
</body>
</html>