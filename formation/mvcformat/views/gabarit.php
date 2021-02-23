<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <title><?php echo $titre ?></title>
</head>

<body>
    <div id="global">
        <header>
            <a href="index.php">
                <h1 id="titreBlog">Mon Blog</h1>
            </a>

        </header>
        <div id="contenu">
            <?php if (isset($contenu)) {
                echo $contenu;
            } ?>
        </div> <!-- #contenu -->
        <footer id="piedBlog">
            ne pas cliquer <a href="https://youtu.be/2ocykBzWDiM">ici</a>.
        </footer>
    </div><br> <!-- #global -->
</body>

</html>