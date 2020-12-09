window.onload = choosePic;

var myPix = new Array("images/animal_alphabet_A.png","images/animal_alphabet_B.png","images/animal_alphabet_C.png","images/animal_alphabet_D.png","images/animal_alphabet_E.png","images/animal_alphabet_F.png","images/animal_alphabet_G.png","images/animal_alphabet_H.png","images/animal_alphabet_I.png","images/animal_alphabet_J.png","images/animal_alphabet_K.png","images/animal_alphabet_L.png","images/animal_alphabet_M.png","images/animal_alphabet_N.png","images/animal_alphabet_O.png","images/animal_alphabet_P.png","images/animal_alphabet_Q.png","images/animal_alphabet_R.png","images/animal_alphabet_S.png","images/animal_alphabet_T.png","images/animal_alphabet_U.png","images/animal_alphabet_V.png","images/animal_alphabet_W.png","images/animal_alphabet_X.png","images/animal_alphabet_Y.png","images/animal_alphabet_Z.png");

function choosePic() {
	randomNum = Math.floor((Math.random() * myPix.length));
	document.getElementById("myPicture").src = myPix[randomNum];
   if ( window.innerWidth > window.innerHeight )
        document.getElementById("myPicture").height = window.innerHeight;
    else
         document.getElementById("myPicture").width = window.innerWidth;
}
