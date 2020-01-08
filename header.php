<header class="header-principal">
        <h1><a href="">
        Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
        </a></h1>      
        <div class="infos-utilisateur">
            <img src="avatars/<?=$utilisateur[avatar] ?>.png" alt="avatar-utlisateur">
            <nav class="menu-utilisateur hide">
                <p>Bienvenue <?=$utilisateur[pseudo]."\n"?></p>
                <ul>
                    <li>mail : <?=$utilisateur[email]."\n"?></li>
                    <li>id : <?=$utilisateur[id]."\n"?></li>
                    <li>avatar : <?=$utilisateur[avatar]."\n"?></li>
                    <li><a href="deconnexion.php">Deconnextion</a></li>
                </ul>
            </nav>
        </div>
    </header>