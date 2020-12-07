<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserter</title>
</head>
<body>
    
    <form action="./insert.php" method="post" enctype="multipart/form-data">
        user : <input required type="text" name="user">
        <br>
        pass : <input type="password" name="pass" id="pren">
        <br>
        titre : <input required type="text" name="titre" id="title">
        <br>
        commentaire : <textarea style='width:20%;height:20%;' required id="commentary" name="comm"></textarea>
        <br>
        photo : <input type="file" name="photo" id="photo" accept="image/x-png,image/gif,image/jpeg">
        <br>
        <input type="submit" value="envoyer">
    </form>









</body>
</html>