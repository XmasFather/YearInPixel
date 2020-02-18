function modificationAffichageEmoji(){
  var listeEmojis, i;
  listeEmojis = document.querySelectorAll(".emoji");
  var affichage = listeEmojis[0].classList;
  if (affichage == "emoji"){
    for (i = 0; i < listeEmojis.length; ++i) {
      listeEmojis[i].classList.add("hide");
    }
  }else{
    for (i = 0; i < listeEmojis.length; ++i) {
      listeEmojis[i].classList.remove("hide");
    }
  }  
}

var boutonAffichageEmoji = document.getElementById("affichage-emoji");
boutonAffichageEmoji.addEventListener('click', modificationAffichageEmoji);



function modficationEtatEmoji(){
  function reqListener () {
    console.log(this.responseText);
  }
  
    var reqEmoji = new XMLHttpRequest();
    reqEmoji.onload = reqListener;
    reqEmoji.open("GET", "envoi-etat-emoji.php", true);
    reqEmoji.send();
}


function changerPackEmoji(monBouton){
  var sibling = monBouton.nextElementSibling;
  var tousBoutons = document.querySelectorAll('.emoji-picker ul');

  for (var i = 0; i < tousBoutons.length; i++) {
      tousBoutons[i].classList.add('hide');
  }
  
  sibling.classList.remove('hide');
  }

var item = document.querySelectorAll(".emoji-picker li ul li");

item.forEach(element => element.addEventListener("click", function(){
  document.querySelector('#emoji-selectionne-affichage').value = element.textContent;
}, false));
