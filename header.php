<header class="header-principal">
        <h1><a href="./accueil.php">
        Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
        </a></h1>      
            <nav role='navigation' id="menuToggle">
                <input type="checkbox" id="avatar"/>
                <label for="avatar"><img src="avatars/<?=$utilisateur[avatar] ?>" alt="avatar-utlisateur">  </label>                   
                <ul id="menu">
                    <li><?=bonjourAleatoire($utilisateur)?></li>
                    <li></li>
                    <li>Activer les Emojis
                        <input type="checkbox" <?php if($affichageEmoji){echo "checked";}?> id="affichage-emoji" />
                        <label onclick="modficationEtatEmoji()" for="affichage-emoji"><span class="ui"></span></label> 
                    </li>
                    <li><a href="modification-humeur.php">Personnaliser vos humeurs</a></li>
                    <li><a href="modification-avatar.php">Changer votre avatar</a></li>
                    <li><a href="annee.php">Passage au format "année"</a></li>
                    <li></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
    </header>