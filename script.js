function menuUtilisateur(){
    var menuUtilisateur = document.querySelector(".menu-utilisateur");
    var affichage = menuUtilisateur.classList;

    if(affichage == "hide"){
        menuUtilisateur.classList.remove("hide");
    }
    else{
        menuUtilisateur.classList.add("hide");
    }
}

document.querySelector(".infos-utilisateur img").addEventListener('click', menuUtilisateur);