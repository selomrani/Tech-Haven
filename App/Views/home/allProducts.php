<?php
use App\Models\Product;
require_once __DIR__ . './../../../vendor/autoload.php';
$ppp = new Product();
$allproducts = $ppp->fetchAllproducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Tech Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Rajdhani:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Rajdhani', 'sans-serif'],
                    },
                    colors: {
                        cyber: {
                            dark: '#050505',
                            card: '#0a0b10',
                            input: '#12141c',
                            cyan: '#00f3ff',
                            pink: '#ff00ff',
                            purple: '#bd00ff',
                            yellow: '#facc15'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #050505;
            background-image: 
                linear-gradient(rgba(0, 243, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 243, 255, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            color: #e2e8f0;
        }
        
        .gaming-text-gradient {
            background: linear-gradient(to right, #00f3ff, #ff00ff);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .clip-notch-sm {
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%);
        }

        /* Product Card Hover Effect */
        .product-card {
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 243, 255, 0.15);
            border-color: rgba(0, 243, 255, 0.5);
        }
        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        /* Range Slider Track */
        input[type=range] {
            -webkit-appearance: none; 
            background: transparent; 
        }
        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: #00f3ff;
            cursor: pointer;
            margin-top: -6px; 
            box-shadow: 0 0 10px #00f3ff;
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 4px;
            cursor: pointer;
            background: #334155;
            border-radius: 2px;
        }
        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #050505; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00f3ff; }
    </style>
</head>
<body>

    <div class="bg-[#0a0b10] border-b border-white/5 py-10 text-center">
        <div class="max-w-7xl mx-auto px-4 flex flex-col items-center justify-center">
            <div class="flex items-center gap-3 group mb-4">
                <div class="relative w-12 h-12 flex items-center justify-center bg-black border border-cyber-cyan clip-notch-sm">
                    <i class="fa-solid fa-dragon text-2xl text-cyber-cyan"></i>
                </div>
                <div class="flex flex-col text-left">
                    <span class="font-display font-bold text-3xl tracking-wider text-white leading-none">
                        TECH<span class="gaming-text-gradient">HAVEN</span>
                    </span>
                    <span class="text-[10px] text-cyber-cyan font-mono tracking-widest opacity-70">SYSTEM INVENTORY</span>
                </div>
            </div>
            
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white uppercase italic">
                Full <span class="text-cyber-cyan">Catalog</span>
            </h1>
            <p class="text-gray-500 mt-2 max-w-xl mx-auto">Browse our complete collection of high-performance components and peripherals.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <main class="w-full">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8 pb-6 border-b border-white/5">
                <div class="text-cyber-pink font-mono text-sm">
                    <?= count($allproducts) ?> Items Found
                </div>
                <div class="flex items-center gap-2 ml-auto">
                    <span class="text-xs text-gray-500 uppercase font-bold">Sort By:</span>
                    <select class="bg-cyber-input border border-gray-700 text-gray-300 text-sm p-2 px-4 rounded-none focus:border-cyber-cyan outline-none clip-notch-sm">
                        <option>Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest Arrivals</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <?php foreach($allproducts as $product) :?>
                <div class="product-card bg-cyber-card border border-white/5 rounded-none clip-notch-sm overflow-hidden group">
                    <div class="relative h-40 bg-[#0f111a] flex items-center justify-center p-4">
                        <div class="absolute top-2 right-2 z-10">
                            <?php $stock = null;
                            $color = null;
                            if($product->getInStock()){
                                $stock = "In Stock";
                                $color = "green";
                            }
                            else{
                                $stock = "Out of stock";
                                $color = "red";
                            }
                            ?>
                            <span class="bg-<?= $color ?>-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-sm uppercase"><?= $stock ?></span>
                        </div>
                        <img src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>" class="h-full w-full object-cover product-image">
                        </div>
                    <div class="p-3 border-t border-white/5">
                        <div class="text-[10px] text-gray-500 mb-1"><?= $product->getCategory() ?></div>
                        <h3 class="text-white font-bold text-sm leading-tight mb-2 group-hover:text-cyber-cyan transition-colors line-clamp-2"><?= $product->getName() ?></h3>
                        <div class="flex items-center gap-0.5 mb-3">
                            <i class="fa-solid fa-star text-cyber-yellow text-[10px]"></i>
                            <i class="fa-solid fa-star text-cyber-yellow text-[10px]"></i>
                            <i class="fa-solid fa-star text-cyber-yellow text-[10px]"></i>
                            <i class="fa-solid fa-star text-cyber-yellow text-[10px]"></i>
                            <i class="fa-solid fa-star text-cyber-yellow text-[10px]"></i>
                            <span class="text-[10px] text-gray-500 ml-1">(42)</span>
                        </div>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-lg font-display font-bold text-white">$<?= $product->getPrice() ?></span>
                            <button class="w-7 h-7 flex items-center justify-center bg-cyber-input hover:bg-cyber-cyan hover:text-black text-cyber-cyan border border-cyber-cyan/30 rounded-sm transition-all">
                                <i class="fa-solid fa-plus text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </main>
    </div>

    <footer class="bg-cyber-dark pt-12 pb-8 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-600 text-xs">© 2077 Tech Haven Systems. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>