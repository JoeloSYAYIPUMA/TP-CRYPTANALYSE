<?php
$page_title = "Guide - Système de Chiffrement";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Chiffrement</h2>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="guide.php" class="active">Guide</a></li>
                <li><a href="cesar.php">César</a></li>
                <li><a href="affine.php">Affine</a></li>
                <li><a href="vigenere.php">Vigenère</a></li>
                <li><a href="hill.php">Hill</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Guide d'utilisation</h1>
            <div class="form-container">
                <h2>Comment chiffrer et déchiffrer</h2>

                <div style="margin-top: 25px; line-height: 1.8;">
                    <h3 style="color: #2c3e50; margin-bottom: 10px;">1. César</h3>
                    <p style="margin-bottom: 16px;">Ouvrez <strong>César</strong>, entrez un texte, choisissez le décalage (0 à 25), puis cliquez sur <strong>Chiffrer</strong> ou <strong>Déchiffrer</strong>.</p>

                    <h3 style="color: #2c3e50; margin-bottom: 10px;">2. Affine</h3>
                    <p style="margin-bottom: 16px;">Entrez le texte, puis les clés <strong>a</strong> et <strong>b</strong>. Le paramètre <strong>a</strong> doit être premier avec 26 (ex: 1,3,5,7,9,11,15,17,19,21,23,25).</p>

                    <h3 style="color: #2c3e50; margin-bottom: 10px;">3. Vigenère</h3>
                    <p style="margin-bottom: 16px;">Entrez le texte et une clé alphabétique (ex: <em>CLE</em>), puis choisissez <strong>Chiffrer</strong> ou <strong>Déchiffrer</strong>.</p>

                    <h3 style="color: #2c3e50; margin-bottom: 10px;">4. Hill (2x2)</h3>
                    <p style="margin-bottom: 16px;">Entrez le texte et la matrice 2x2. Pour déchiffrer, la matrice doit être inversible modulo 26.</p>

                    <h3 style="color: #2c3e50; margin-bottom: 10px;">Conseils</h3>
                    <p>Utilisez le bouton <strong>Effacer</strong> pour réinitialiser le formulaire. Le résultat s'affiche dans la zone <strong>Résultat</strong> sous le formulaire.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
