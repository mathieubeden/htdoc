<?php

if(isset($_COOKIE['username'])){

    //quelque chose

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="bg-blue-500 text-white p-4 text-center">
        <h1>TO-DO List</h1>
    </header>

    <main class="text-gray-800">
       <section class="md:w-2/3 lg:w-1/3 mx-auto mt-4">
            
        require 'traitement.php';

       </section>
    </main>

    <script>
    let buttons = document.getElementsByClassName('todo-update')
    Array.from(buttons).map(function(element, index) {
        element.addEventListener('click', function() {
            document.getElementsByClassName('todo-item')[index].style.display = 'none'
            document.getElementsByClassName('todo-input')[index].style.display = 'block'
            document.getElementsByClassName('todo-actions')[index].style.display = 'none'
            
        })
    })


        
    </script>
</body>
</html>