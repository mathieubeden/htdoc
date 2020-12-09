<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserter</title>
</head>
<body>
    
    <form action="./insert.php" method="post" enctype="multipart/form-data">
        <?php if(!isset($_COOKIE['user'])){echo 'user : ';} ?>
        <input <?php if(isset($_COOKIE['user'])){echo "hidden value='".$_COOKIE['user']."'";}else{echo 'required';} ?> type="text" name="user">
        <br>
        titre : <input required type="text" name="titre" id="title">
        <br>
        commentaire : <textarea style='width:20%;height:20%;' id="commentary" name="comm"></textarea>
        <br>
        photo : <input type="file" name="photo" id="photo" accept="image/x-png,image/gif,image/jpeg">
        <br>
        <input type="submit" value="envoyer"><br>
        <br><?php if(isset($_GET['ok'])){echo 'votre article a été ajouté';}?>
    </form>
    <br>
    <button onclick="window.location.href='./blogoo.php'">aller au blog</button>









</body>
</html>