<?php $header = "Bienvenu sur L'shi promo"; ?>
<?php require 'portion/header.php' ?>
<h1 class="text-3xl font-bold text-center mt-10 text-white">Profiter des meilleurs offres</h1>
<?php require 'models/promotionData.php'; ?>
<?php foreach($promotions as $magasin => $produits): ?>
    <div class="text-white">
        <h1><?php echo $magasin; ?></h1>
        <?php foreach($produits as $produit => $details): ?>
            <?php 
                $prixInitial = $details['prix-Initial'];
                $prixPromo   = $details['prix-promo'];
                $devise      = $details['devise'];
                // Calcul de la réduction en pourcentage
                $reduction = (($prixInitial - $prixPromo) / $prixInitial) * 100;
            ?>
            <p>Nom de l'article : <?php echo $produit; ?></p>
            <p>Le prix initial : <?php echo $prixInitial . " " . $devise; ?></p>
            <p>Le prix en promotion : <?php echo $prixPromo . " " . $devise; ?></p>
            <p>Réduction : -<?php echo round($reduction, 2); ?> %</p>
            <br>
        <?php endforeach; ?>  
    </div>
<?php endforeach; ?>
<?php require 'portion/footer.php' ?>
