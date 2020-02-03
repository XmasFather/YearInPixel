<?php
	/* Programme permettant d'afficher le code source de fichiers de son dossier
	 *
	 * Appel : source.php/nomDuFichierOuDossier
	 * 
	 ********************/

	// nom du fichier par défaut : «.» (dossier courant)
	$f = isset($_SERVER['PATH_INFO'])? $_SERVER['PATH_INFO']: '.';
	// suppression d'un «/» éventuel au début
	$f = preg_replace(':^/:', '', $f);
	// artifices pour donner un affichage particulier d'éléments dans le code
	// • /*var(*/XXX/*)*/ entoure XXX d'une balise <var> (italiques) dans le code
	// • /*invisible(*/XXX/*)*/ entoure XXX d'une balise qui rend ce contenu invisible
	// • /*secret(*/XXX/*)*/ remplace par une indication «…secret…»
	// • /*span(*/XXX/*)*/ entoure XXX d'une balise <span> (neutre) dans le code
	// • Il est possible d'ajouter des guillemets: /*'secret(*/XXX'/*)*/ ou /*"secret(*/XXX/*)"*/
	$hooks = Array(
		'span' => Array('pre'=>'<span>', 'post'=>'</span>'),
		'var' => Array('pre'=>'<var>', 'post'=>'</var>'),
		'secret' => Array('sub'=>'<span class="secret">…secret…</span>'),
		'invisible' => Array('pre'=>'<span class="invisible">', 'post'=>'</span>'),
	);
	/* type MIME et encodage (obligatoire en PHP) */
	header('Content-Type: text/html; charset=utf8');
?>
<html>
	<head>
		<meta charset="utf8" />
		<?php /* <title>Code source de fichiers PHP, HTML, CSS, JS…</title> */ ?>
		<title>Source : <?= $f ?></title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/themes/prism.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/plugins/line-numbers/prism-line-numbers.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/plugins/previewers/prism-previewers.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/plugins/autolinker/prism-autolinker.css" />
		<style>
			h1 { margin: 4px 1ex 2px; }
			p { padding: 1ex 0 1ex 1ex; margin: 0; }
			.attention { color:#F00; }
			.secret { background-color: rgba(153,153,153,0.7); border: 1px solid #666; color: #666; text-shadow: none; }
			.invisible { display: none; }
		</style>
	</head>
	<body>
		<?php
			if ( preg_match(':\.[^/]*/:', $f) ) {
				?><header><h1>Requète&nbsp;: <code><?= $f ?></code></h1></header>
				<main><p><b class="attention">Erreur&nbsp;: le point n'est pas admis dans les URI de ce programme.</b></p></main>
				<?php
			} elseif ( ! is_readable($f) ) {
				?><header><h1>Chemin&nbsp;: <code><?= $f ?></code></h1></header>
				<main><p><b class="attention">Ce document n'existe pas ou n'est pas lisible.</b></p><?php
			} elseif ( is_dir($f) ) {
				?><header><h1>Dossier&nbsp;: <code><?= $f ?></code></h1></header>
				<main><pre><?php
					foreach (scandir($f) as $entry) {
						if ( $entry != '.' and $entry != '..' ) {
							?><p><a href="<?= $_SERVER['PHP_SELF'],'/',$entry ?>"><code><?= $entry ?></code></a></p><?php
						}
					}
				?></pre></main><?php
			} else {
				$path_parts = pathinfo($f);
				$ext = $path_parts['extension'];
				$classe = ($ext == 'css')? 'css': ($ext. ' line-numbers');
				?><header><h1>Fichier&nbsp;: <code><?= $f ?></code></h1></header>
				<main><pre class="language-<?= $classe ?>"><code><?php
					echo preg_replace_callback(
						'|/\*([\'"]?)(\w+)\(\*/(.+)/\*\)([\'"]?)\*/|U',
						function ($matches) {
							global $hooks;
							if ( ! isset($hooks[$matches[2]]) ) return($matches[1].$matches[3].$matches[4]);
							$hook = $hooks[$matches[2]];
							if ( isset($hook['sub']) ) return($matches[1].$hook['sub'].$matches[4]);
							return($matches[1].$hook['pre'].$matches[3].$hook['post'].$matches[4]);
						},
						htmlentities(file_get_contents($f, FALSE))
					);
				?></code></pre><?php
			}
		?></main>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/prism.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/components/prism-php.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/components/prism-javascript.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/plugins/previewers/prism-previewers.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/plugins/line-numbers/prism-line-numbers.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/plugins/keep-markup/prism-keep-markup.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.12.2/plugins/autolinker/prism-autolinker.min.js"></script>
	</body>
</html>