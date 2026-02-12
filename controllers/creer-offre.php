<?php
session_start();

$dossier_database = __DIR__ . '/../database/';

if (!is_dir($dossier_database)) {
    mkdir($dossier_database, 0755, true);
}

try {
    $pdo = new PDO('sqlite:' . $dossier_database . 'lshipromo.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS promotions (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom_produit TEXT NOT NULL,
        prix_initial INTEGER NOT NULL,
        prix_promo INTEGER NOT NULL,
        devise TEXT NOT NULL,
        magasin TEXT NOT NULL,
        chemin_image TEXT NOT NULL
    )");

    // Vérifier si les données POST sont présentes
    if (!isset($_POST['nom_produit'], $_POST['prix_initial'], $_POST['prix_promo'], $_POST['devise'], $_POST['magasin'])) {
        throw new Exception("Données POST manquantes.");
    }

    $nom_produit = trim($_POST['nom_produit']);
    $prix_initial = (int)$_POST['prix_initial'];
    $prix_promo = (int)$_POST['prix_promo'];
    $devise = $_POST['devise'];
    $magasin = $_POST['magasin'];

    // Vérifier les erreurs d'upload de fichier
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $upload_errors = [
            UPLOAD_ERR_INI_SIZE => 'Le fichier dépasse la taille maximale autorisée par le serveur.',
            UPLOAD_ERR_FORM_SIZE => 'Le fichier dépasse la taille maximale autorisée par le formulaire.',
            UPLOAD_ERR_PARTIAL => 'Le fichier n\'a été que partiellement téléchargé.',
            UPLOAD_ERR_NO_FILE => 'Aucun fichier n\'a été téléchargé.',
            UPLOAD_ERR_NO_TMP_DIR => 'Dossier temporaire manquant.',
            UPLOAD_ERR_CANT_WRITE => 'Échec de l\'écriture du fichier sur le disque.',
            UPLOAD_ERR_EXTENSION => 'Une extension PHP a arrêté le téléchargement du fichier.'
        ];
        $error_msg = isset($upload_errors[$_FILES['image']['error']]) ? $upload_errors[$_FILES['image']['error']] : 'Erreur inconnue lors du téléchargement.';
        throw new Exception("Erreur d'upload : " . $error_msg);
    }

    $dossier_uploads = __DIR__ . '/../uploads/' . $magasin . '/';
    if (!is_dir($dossier_uploads)) {
        mkdir($dossier_uploads, 0755, true);
    }

    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extension, $allowed_extensions)) {
        throw new Exception("Type de fichier non autorisé. Seules les images JPG, PNG et GIF sont acceptées.");
    }

    $nom_fichier = uniqid() . '.' . $extension;
    $chemin_complet = $dossier_uploads . $nom_fichier;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $chemin_complet)) {
        $chemin_image = 'uploads/' . $magasin . '/' . $nom_fichier;

        $stmt = $pdo->prepare("
            INSERT INTO promotions (nom_produit, prix_initial, prix_promo, devise, magasin, chemin_image)
            VALUES (:nom_produit, :prix_initial, :prix_promo, :devise, :magasin, :chemin_image)");
        $stmt->execute([
            ':nom_produit' => $nom_produit,
            ':prix_initial' => $prix_initial,
            ':prix_promo' => $prix_promo,
            ':devise' => $devise,
            ':magasin' => $magasin,
            ':chemin_image' => $chemin_image
        ]);

        $_SESSION['succes'] = "Promotion ajoutée avec succès!";
    } else {
        throw new Exception("Erreur lors du déplacement du fichier uploadé.");
    }
} catch (Exception $e) {
    $_SESSION['error'] = "Erreur : " . $e->getMessage();
    // Optionnel : logger l'erreur dans un fichier
    error_log("Erreur dans creer-offre.php : " . $e->getMessage(), 3, __DIR__ . '/../logs/errors.log');
}

header('Location: ../publier.php');
exit;
?>
