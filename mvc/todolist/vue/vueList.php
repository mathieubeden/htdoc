  <?php extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
?>
<div class="add text-center p-2">
    <form>
        <input type="text" name="todo" value="" class="border p-2 rounded" placeholder="Nouvel item">
        <input type="submit" value="Ajouter" class="py-2 px-4 rounded bg-green-500 text-white">
    </form>
</div>
<table class="w-full mt-2

    <tr class="border-t-2">
        <td class="px-4 todo-item p-2">Une chose à faire</td>
        <td class="hidden todo-input p-2">
            <form action="traitement.php" method="post" class="text-center">
                <input type="text" name="update" class="border p-2 rounded" value="Une chose à faire">
                <input type="hidden" name="id" value="1">
                <input type="submit" value="Changer" class="py-2 px-4 rounded bg-green-500 text-white"> 
            </form>  
        </td>
        <td class="todo-actions text-center p-2 flex justify-center">
            <button class="p-2 rounded bg-yellow-500 todo-update mr-4"><i class="fas fa-pen text-white"></i></button>
            <form action="traitement.php" method="post">
                <input type="hidden" name="delete" value="Une chose à faire">
                <button class="p-2 rounded bg-red-500"><i class="fas fa-trash text-white"></i></button>
            </form>
        </td>
    </tr>
    
</table>
<?php
    // Arrêt de la temporisation et renvoi du tampon de sortie
    $contenu= ob_get_clean();
    ?>

    