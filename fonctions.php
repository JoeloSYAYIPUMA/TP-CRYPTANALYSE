<?php
function nettoyerTexte($texte) {
    return preg_replace("/[^A-Za-z]/", "", strtoupper($texte));
}

function lettreEnNombre($lettre) {
    return ord($lettre) - ord('A');
}

function nombreEnLettre($nombre) {
    return chr((($nombre % 26) + 26) % 26 + ord('A'));
}

function chiffrerCesar($texte, $decalage) {
    $resultat = '';
    $texte = strtoupper($texte);

    for ($i = 0; $i < strlen($texte); $i++) {
        $char = $texte[$i];
        if (ctype_alpha($char)) {
            $resultat .= nombreEnLettre(lettreEnNombre($char) + $decalage);
        } else {
            $resultat .= $char;
        }
    }
    return $resultat;
}

function dechiffrerCesar($texte, $decalage) {
    return chiffrerCesar($texte, -$decalage);
}

function chiffrerAffine($texte, $a, $b) {
    $resultat = '';
    $texte = strtoupper($texte);

    if (pgcd($a, 26) != 1) {
        return "Erreur: 'a' doit être premier avec 26";
    }

    for ($i = 0; $i < strlen($texte); $i++) {
        $char = $texte[$i];
        if (ctype_alpha($char)) {
            $x = lettreEnNombre($char);
            $resultat .= nombreEnLettre($a * $x + $b);
        } else {
            $resultat .= $char;
        }
    }
    return $resultat;
}

function dechiffrerAffine($texte, $a, $b) {
    $resultat = '';
    $texte = strtoupper($texte);

    $invA = inverseModulaire($a, 26);
    if ($invA === null) {
        return "Erreur: 'a' n'a pas d'inverse modulo 26";
    }

    for ($i = 0; $i < strlen($texte); $i++) {
        $char = $texte[$i];
        if (ctype_alpha($char)) {
            $y = lettreEnNombre($char);
            $resultat .= nombreEnLettre($invA * ($y - $b));
        } else {
            $resultat .= $char;
        }
    }
    return $resultat;
}

function chiffrerVigenere($texte, $cle) {
    $resultat = '';
    $texte = strtoupper($texte);
    $cle = nettoyerTexte(strtoupper($cle));

    if (strlen($cle) == 0) return $texte;

    $j = 0;
    for ($i = 0; $i < strlen($texte); $i++) {
        $char = $texte[$i];
        if (ctype_alpha($char)) {
            $decalage = lettreEnNombre($cle[$j % strlen($cle)]);
            $resultat .= nombreEnLettre(lettreEnNombre($char) + $decalage);
            $j++;
        } else {
            $resultat .= $char;
        }
    }
    return $resultat;
}

function dechiffrerVigenere($texte, $cle) {
    $resultat = '';
    $texte = strtoupper($texte);
    $cle = nettoyerTexte(strtoupper($cle));

    if (strlen($cle) == 0) return $texte;

    $j = 0;
    for ($i = 0; $i < strlen($texte); $i++) {
        $char = $texte[$i];
        if (ctype_alpha($char)) {
            $decalage = lettreEnNombre($cle[$j % strlen($cle)]);
            $resultat .= nombreEnLettre(lettreEnNombre($char) - $decalage);
            $j++;
        } else {
            $resultat .= $char;
        }
    }
    return $resultat;
}

function chiffrerHill($texte, $a, $b, $c, $d) {
    $texte = nettoyerTexte($texte);
    $resultat = '';

    if (strlen($texte) % 2 != 0) {
        $texte .= 'X';
    }

    for ($i = 0; $i < strlen($texte); $i += 2) {
        $x1 = lettreEnNombre($texte[$i]);
        $x2 = lettreEnNombre($texte[$i + 1]);

        $y1 = ($a * $x1 + $b * $x2) % 26;
        $y2 = ($c * $x1 + $d * $x2) % 26;

        $resultat .= nombreEnLettre($y1) . nombreEnLettre($y2);
    }
    return $resultat;
}

function dechiffrerHill($texte, $a, $b, $c, $d) {
    $texte = nettoyerTexte($texte);
    $resultat = '';

    if (strlen($texte) % 2 != 0) {
        return "Erreur: Le texte chiffré Hill doit contenir un nombre pair de lettres";
    }

    $det = (($a * $d - $b * $c) % 26 + 26) % 26;
    $invDet = inverseModulaire($det, 26);
    if ($invDet === null) {
        return "Erreur: La matrice n'est pas inversible modulo 26";
    }

    $invA = ($d * $invDet) % 26;
    $invB = ((-$b * $invDet) % 26 + 26) % 26;
    $invC = ((-$c * $invDet) % 26 + 26) % 26;
    $invD = ($a * $invDet) % 26;

    for ($i = 0; $i < strlen($texte); $i += 2) {
        $y1 = lettreEnNombre($texte[$i]);
        $y2 = lettreEnNombre($texte[$i + 1]);

        $x1 = ($invA * $y1 + $invB * $y2) % 26;
        $x2 = ($invC * $y1 + $invD * $y2) % 26;

        $resultat .= nombreEnLettre($x1) . nombreEnLettre($x2);
    }
    return $resultat;
}

function pgcd($a, $b) {
    $a = abs((int)$a);
    $b = abs((int)$b);
    while ($b != 0) {
        $tmp = $b;
        $b = $a % $b;
        $a = $tmp;
    }
    return $a;
}

function inverseModulaire($a, $mod) {
    $a = (($a % $mod) + $mod) % $mod;
    for ($x = 1; $x < $mod; $x++) {
        if (($a * $x) % $mod == 1) {
            return $x;
        }
    }
    return null;
}
?>
