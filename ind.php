<?php 
    $header = "Bienvenue sur L'shi Promo"; 
    require 'portion/header.php'; 
?>

<!-- Section Hero avec design immersif -->
<section class="relative bg-gradient-to-r from-purple-00 via-pink-700 to-yellow-00 text-white py-10 shadow-2xl">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight drop-shadow-xl animate-fade-in">
            Profitez des <span class="text-yellow-300">meilleures offres</span>
        </h1>
        <p class="mt-6 text-lg md:text-xl text-gray-200 max-w-3xl mx-auto animate-slide-in">
            Découvrez des promotions exclusives et faites des économies intelligentes chaque jour.
        </p>
        <a href="#promotions" 
           class="mt-10 inline-block px-10 py-5 bg-yellow-400 text-black font-bold rounded-full shadow-lg hover:bg-yellow-300 transition duration-300 animate-bounce">
           Voir les Offres
        </a>
    </div>
</section>

<?php require 'models/promotionData.php'; ?>

<!-- Section Promotions -->
<section id="promotions" class="container mx-auto px-6 mt-20 space-y-20">
    <?php foreach($promotions as $magasin => $produits): ?>
        <div>
            <!-- Nom du magasin -->
            <h2 class="text-4xl font-extrabold mb-10 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-green-400 animate-slide-in">
                <span class="text-pink-500">🛍️</span> <?php echo htmlspecialchars($magasin); ?>
            </h2>


            <!-- Grille des produits -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php foreach($produits as $produit => $details): ?>
                    <?php 
                        $prixInitial = $details['prix-Initial'];
                        $prixPromo   = $details['prix-promo'];
                        $devise      = $details['devise'];
                        $reduction   = (($prixInitial - $prixPromo) / $prixInitial) * 100;
                    ?>
                    
                    <!-- Carte produit -->
                    <div class="group relative transform hover:scale-105 transition duration-500 ease-in-out bg-gradient-to-br from-gray-900 via-gray-800 to-black rounded-3xl shadow-2xl p-6 animate-fade-up">
                        
                        <!-- Badge réduction -->
                        <span class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                            -<?php echo round($reduction); ?>%
                        </span>

                        <?php require 'composants/offre-card.php'; ?>

                        <!-- Texte économie -->
                        <p class="mt-3 text-sm text-gray-300 italic group-hover:text-yellow-400 transition">
                             Vous économisez <strong><?php echo round($reduction); ?>%</strong> 
                        </p>

                        <!-- Bouton CTA -->
                        <a href="#" class="mt-6 block text-center px-6 py-3 bg-yellow-400 text-black font-bold rounded-full shadow-md hover:bg-yellow-300 transition duration-300">
                            Ajouter au panier 🛒
                        </a>
                    </div>
                <?php endforeach; ?>  
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php require 'portion/footer.php'; ?>
