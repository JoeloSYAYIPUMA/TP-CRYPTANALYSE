<?php
require_once 'fonctions.php';

$page_title = "Chiffrement de Hill";
$resultat = '';
$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texte = $_POST['texte'] ?? '';
    $a = intval($_POST['a'] ?? 1);
    $b = intval($_POST['b'] ?? 0);
    $c = intval($_POST['c'] ?? 0);
    $d = intval($_POST['d'] ?? 1);
    $action = $_POST['action'] ?? 'chiffrer';

    if (empty($texte)) {
        $erreur = "Veuillez entrer un texte à traiter.";
    } else {
        $resultat = ($action === 'dechiffrer') ? dechiffrerHill($texte, $a, $b, $c, $d) : chiffrerHill($texte, $a, $b, $c, $d);
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
                <li><a href="vigenere.php">Vigenère</a></li>
                <li><a href="hill.php" class="active">Hill</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Chiffrement de Hill (Matrice 2x2)</h1>
            <?php if ($erreur): ?><div class="error"><?php echo htmlspecialchars($erreur); ?></div><?php endif; ?>
            <div class="form-container">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="texte">Texte à traiter :</label>
                        <textarea id="texte" name="texte" required><?php echo isset($_POST['texte']) ? htmlspecialchars($_POST['texte']) : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Matrice de chiffrement (2x2) :</label>
                        <div class="matrix-input">
                            <input type="number" name="a" placeholder="a" value="<?php echo isset($_POST['a']) ? intval($_POST['a']) : 1; ?>" required>
                            <input type="number" name="b" placeholder="b" value="<?php echo isset($_POST['b']) ? intval($_POST['b']) : 0; ?>" required>
                            <input type="number" name="c" placeholder="c" value="<?php echo isset($_POST['c']) ? intval($_POST['c']) : 0; ?>" required>
                            <input type="number" name="d" placeholder="d" value="<?php echo isset($_POST['d']) ? intval($_POST['d']) : 1; ?>" required>
                        </div>
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

