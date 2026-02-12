<?php 
session_start();
$header = 'Publier une offre'; 
require 'portion/header.php'; 
?>

<!-- Section Hero -->
<section class="relative bg-gradient-to-r from-blue-00 via-purple-700 to-pink-00 text-white py-12 shadow-2xl">
    <div class="container mx-auto text-center">
        <h1 data-aos="zoom-in" class="text-4xl md:text-6xl font-extrabold tracking-tight drop-shadow-xl">
            Publiez vos <span class="text-yellow-300">meilleures offres</span>
        </h1>
        <p data-aos="slide-up" data-aos-delay="300" class="mt-4 text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">
            Ajoutez vos promotions et attirez plus de clients avec un design premium.
        </p>
    </div>
</section>

<!-- Formulaire -->
<section class="container mx-auto px-6 mt-12">
    <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-lg mx-auto animate-fade-up">
        
        <?php if(isset($_SESSION['succes'])): ?>
            <div class="mb-4 p-3 text-green-700 bg-green-100 rounded-lg shadow">
                <?= $_SESSION['succes']; unset($_SESSION['succes']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="mb-4 p-3 text-red-700 bg-red-100 rounded-lg shadow">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="controllers/creer-offre.php" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image du produit</label>
                <input type="file" id="image" name="image" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500" required />
            </div>

            <div>
                <label for="nom_produit" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                <input type="text" id="nom_produit" name="nom_produit" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500" required />
            </div>

            <div>
                <label for="prix_initial" class="block text-sm font-medium text-gray-700">Prix initial</label>
                <input type="number" id="prix_initial" name="prix_initial" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500" required />
            </div>

            <div>
                <label for="prix_promo" class="block text-sm font-medium text-gray-700">Prix promotionnel</label>
                <input type="number" id="prix_promo" name="prix_promo" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500" required />
            </div>

            <div>
                <label for="devise" class="block text-sm font-medium text-gray-700">Devise</label>
                <select id="devise" name="devise" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500" required>
                    <option value="FC" selected>FC</option>
                    <option value="US">$</option>
                </select>
            </div>

            <div>
                <label for="magasin" class="block text-sm font-medium text-gray-700">Magasin</label>
                <select id="magasin" name="magasin" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500" required>
                    <option value="Top-Market" selected>Top-Market</option>
                    <option value="Kin-Marche">Kin-Marche</option>
                    <option value="Jambo">Jambo</option>
                    <option value="Rocheio">Rocheio</option>
                </select>
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-yellow-400 to-pink-500 text-black font-bold py-3 rounded-full shadow-lg hover:from-yellow-300 hover:to-pink-400 transition duration-300">
                 Soumettre l’offre
            </button>
        </form>
    </div>
</section>

<!-- Scripts AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: false,
    mirror: true
  });
</script>

<?php require 'portion/footer.php'; ?>
