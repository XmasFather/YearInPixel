/* Affichage du menu quand on clique sur l'avatar */

function affichageMenuUtilisateur(){
    var menuUtilisateur = document.querySelector(".menu-utilisateur");
    var affichage = menuUtilisateur.classList;

    if(affichage == "menu-utilisateur hide"){
        menuUtilisateur.classList.remove("hide");
    }
    else{
        menuUtilisateur.classList.add("hide");
    }
}

document.querySelector(".infos-utilisateur img").addEventListener('click', affichageMenuUtilisateur);

/* Changement de l'affichage mois à année */

function swap(){
    var nomJours = document.getElementById("nom-jours");
    var nomMois = document.getElementById("nom-mois");
    var numeroJours = document.getElementById("numero-jours");
    var listeJours = document.getElementById("liste-jours");
    var affichage = listeJours.classList;

    if(affichage=="mois"){
      affichage = "annee";
      nomJours.classList.add("hide");
      nomMois.classList.remove("hide");
      numeroJours.classList.remove("hide");
      listeJours.classList.remove("mois");
      listeJours.classList.add("annee");
    }else{
      affichage = "mois";
      nomJours.classList.remove("hide");
      nomMois.classList.add("hide");
      numeroJours.classList.add("hide");
      listeJours.classList.remove("annee");
      listeJours.classList.add("mois");
    }

  }

  document.querySelector("h2").addEventListener('click', swap);  