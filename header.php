<header class="header-principal">
        <h1><a href="./">
        Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
        </a></h1>      
        <div class="infos-utilisateur">
            <img src="avatars/<?=$utilisateur[avatar] ?>" alt="avatar-utlisateur">
            <nav class="menu-utilisateur hide">
                <p>Bienvenue <?=$utilisateur[pseudo]."\n"?></p>
                <ul>
                    <li>mail : <?=$utilisateur[email]."\n"?></li>
                    <li>id : <?=$utilisateur[id]."\n"?></li>
                    <li>avatar : <?=$utilisateur[avatar]."\n"?></li>
                    <li><a href="modification-humeur.php">Personnaliser vos humeurs</a></li>
                    <li><a href="modification-avatar.php">Changer votre avatar</a></li>
                    <li><a href="reset-humeurs.php">Remise à zéro des couleurs</a></li>
                    <li></li>
                    <li><a href="deconnexion.php">Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>