<div class="w-full max-w-sm bg-white border border-gray-100 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 dark:bg-gray-900 dark:border-gray-700">
    <a href="#">
        <img class="p-6 rounded-t-xl object-cover" src="<?php echo 'images/'.$details['image']; ?>" alt="product image" />
    </a>
    <div class="px-6 pb-6">
        <a href="#">
            <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                <?php echo $produit; ?>
            </h5>
        </a>
        <div class="flex items-center mt-3 mb-4">
            <span class="bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-bold px-3 py-0.5 rounded-md shadow-sm">
                -<?php echo round($reduction); ?> %
            </span>
        </div>
        <div class="flex items-center justify-between">
            <div>
                <span class="text-2xl font-bold text-gray-900 dark:text-white">
                    <?php echo $prixPromo . " " . $devise; ?>
                </span>
                <span class="text-gray-400 line-through ml-2">
                    <?php echo $prixInitial . " " . $devise; ?>
                </span>
            </div>
            <a href="#"
               class="flex items-center gap-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors duration-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700">
                <!-- Icône WhatsApp en SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M12 .5C5.7.5.5 5.7.5 12c0 2 .5 3.9 1.5 5.6L.5 23.5l6-1.6c1.6.9 3.5 1.4 5.5 1.4 6.3 0 11.5-5.2 11.5-11.5S18.3.5 12 .5zm0 20.9c-1.7 0-3.3-.5-4.7-1.3l-.3-.2-3.5.9.9-3.4-.2-.3c-.9-1.4-1.4-3-1.4-4.6 0-5 4.1-9.1 9.1-9.1s9.1 4.1 9.1 9.1-4.1 9.1-9.1 9.1zm4.9-6.6c-.3-.2-1.7-.8-2-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-1 1.2-.2.2-.4.3-.7.1-.3-.2-1.3-.5-2.5-1.6-.9-.8-1.6-1.8-1.8-2.1-.2-.3 0-.5.1-.7.1-.1.3-.4.4-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.6s-.7-1.7-1-2.3c-.3-.6-.6-.5-.8-.5h-.7c-.2 0-.5.1-.7.3-.2.2-.9.9-.9 2.2s.9 2.6 1 2.8c.1.2 1.8 2.8 4.3 3.9.6.3 1.1.5 1.5.6.6.2 1.1.2 1.5.1.5-.1 1.7-.7 1.9-1.3.2-.6.2-1.1.1-1.2-.1-.1-.3-.2-.6-.4z"/>
                </svg>
                Profiter
            </a>
        </div>
    </div>
</div>