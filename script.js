function affichageEmoji(){
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
  boutonAffichageEmoji.addEventListener('click', affichageEmoji);