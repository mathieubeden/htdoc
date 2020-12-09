function ajouteParagraphe(id,texte){
    document.getElementById(id).innerHTML += '<p>'+texte+"</p>";
}

function paragraphe(texte){
    document.getElementsByTagName("body")[0].innerHTML += '<p>'+texte+"</p>";
}

