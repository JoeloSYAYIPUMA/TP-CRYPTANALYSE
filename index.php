<?php
$page_title = "Accueil - Système de Chiffrement";
$active_page = "accueil";
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
                <li><a href="index.php" class="active">Accueil</a></li>
                <li><a href="guide.php">Guide</a></li>
                <li><a href="cesar.php">César</a></li>
                <li><a href="affine.php">Affine</a></li>
                <li><a href="vigenere.php">Vigenère</a></li>
                <li><a href="hill.php">Hill</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Bienvenue sur le Système de Chiffrement</h1>
            <div class="form-container">
                <h2>Présentation des algorithmes</h2>
                <div style="margin-top: 30px;">
                    <h3 style="color: #2c3e50; margin-bottom: 15px;">Chiffrement de César</h3>
                    <p style="margin-bottom: 20px; line-height: 1.6;">Le chiffrement par décalage, aussi connu comme le code de César ou le chiffrement par décalage, est une méthode de chiffrement très simple utilisée par Jules César dans ses correspondances secrètes.</p>

                    <h3 style="color: #2c3e50; margin-bottom: 15px;">Chiffrement Affine</h3>
                    <p style="margin-bottom: 20px; line-height: 1.6;">Le chiffrement affine est une généralisation du chiffrement de César. Il utilise une fonction mathématique de la forme E(x) = (ax + b) mod 26, où a et b sont des clés. Pour que le déchiffrement soit possible, a doit être premier avec 26.</p>

                    <h3 style="color: #2c3e50; margin-bottom: 15px;">Chiffrement de Vigenère</h3>
                    <p style="margin-bottom: 20px; line-height: 1.6;">Le chiffre de Vigenère est une méthode de chiffrement par substitution polyalphabétique utilisant une clé. Il a été inventé par Blaise de Vigenère au XVIe siècle. Sa force réside dans l'utilisation de plusieurs alphabets de César différents en fonction de la position des lettres.</p>

                    <h3 style="color: #2c3e50; margin-bottom: 15px;">Chiffrement de Hill</h3>
                    <p style="margin-bottom: 20px; line-height: 1.6;">Le chiffrement de Hill est un chiffrement par substitution polygraphique basé sur l'algèbre linéaire. Inventé par Lester S. Hill en 1929, il utilise une matrice comme clé pour chiffrer des blocs de lettres. Notre implémentation utilise une matrice 2x2..</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

