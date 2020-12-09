function pendu(){//donné par jalil
    var body = document.getElementsByTagName("body")[0];
        var div = document.getElementById("mot");
        var rdm =  Math.floor(Math.random()*mots.length);
        var mot = div.innerHTML = mots[rdm];
        var motp = div.innerText.length;
        console.log(motp);
        var tab = [];
        for (var i = 0; i<mot.length;i++){
            tab.push(mot[i]);
        }
        console.log(tab);
        var tabp = [];
        for (var i = 0; i<motp;i++){
        tabp.push("_ ");
        }
        console.log(tabp);
        for (var i = 0; i<tabp.length;i++){
        var a = 0;
        var div2 = document.createElement("div");
        var text = document.createTextNode(tabp[a]);
        body.appendChild(div2);
        div2.appendChild(text);
        div2.setAttribute("class","div2")
        div2.setAttribute("name",i)
        a+=1;
        }

    }
    var motp=0;
function check(event){
    var body=document.getElementsByTagName("body")[0];
    var tab=document.getElementsByTagName(input);
    var input=tab.value;
    if(event.keyCode==13){
        console.log(tab)

    }
    
}