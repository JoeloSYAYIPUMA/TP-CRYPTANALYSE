<?php
require_once 'fonctions.php';

$page_title = "Chiffrement Vigenère";
$resultat = '';
$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texte = $_POST['texte'] ?? '';
    $cle = $_POST['cle'] ?? '';
    $action = $_POST['action'] ?? 'chiffrer';

    if (empty($texte)) {
        $erreur = "Veuillez entrer un texte à traiter.";
    } elseif (empty($cle)) {
        $erreur = "Veuillez entrer une clé.";
    } else {
        $resultat = ($action === 'dechiffrer') ? dechiffrerVigenere($texte, $cle) : chiffrerVigenere($texte, $cle);
    }
}
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
                <li><a href="guide.php">Guide</a></li>
                <li><a href="cesar.php">César</a></li>
                <li><a href="affine.php">Affine</a></li>
                <li><a href="vigenere.php" class="active">Vigenère</a></li>
                <li><a href="hill.php">Hill</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Chiffrement Vigenère</h1>
            <?php if ($erreur): ?><div class="error"><?php echo htmlspecialchars($erreur); ?></div><?php endif; ?>
            <div class="form-container">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="texte">Texte à traiter :</label>
                        <textarea id="texte" name="texte" required><?php echo isset($_POST['texte']) ? htmlspecialchars($_POST['texte']) : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cle">Clé de chiffrement :</label>
                        <input type="text" id="cle" name="cle" value="<?php echo isset($_POST['cle']) ? htmlspecialchars($_POST['cle']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="action" value="chiffrer" class="btn">Chiffrer</button>
                        <button type="submit" name="action" value="dechiffrer" class="btn btn-secondary">Déchiffrer</button>
                        <button type="reset" class="btn btn-danger">Effacer</button>
                    </div>
                </form>
                <?php if ($resultat !== ''): ?>
                    <div class="result-box"><h3>Résultat :</h3><p><?php echo htmlspecialchars($resultat); ?></p></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>

