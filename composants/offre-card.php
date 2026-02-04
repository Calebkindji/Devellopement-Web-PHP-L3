

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="p-8 rounded-t-lg" src="/images/products/apple-watch.png" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"> <?php echo $produit; ?></h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
          
            <span class="bg-red-500 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-red-200 dark:text-red-800 ">-<?php echo round($reduction); ?> %</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $prixPromo . " " . $devise; ?></span>
            <span class="text-gray-400 line-through"><?php echo $prixInitial . " " . $devise; ?></span>
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Profiter</a>
        </div>
    </div>
</div>
