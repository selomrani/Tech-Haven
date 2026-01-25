<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Haven - Ultimate Gaming Store</title>
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
                    },
                    animation: {
                        'pulse-glow': 'pulse-glow 3s infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
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

        .clip-notch {
            clip-path: polygon(
                0 0, 
                100% 0, 
                100% calc(100% - 15px), 
                calc(100% - 15px) 100%, 
                0 100%
            );
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

        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #050505; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00f3ff; }
    </style>
</head>
<body>

    <nav class="sticky top-0 z-50 bg-cyber-dark/80 backdrop-blur-lg border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <a href="/" class="flex items-center gap-3 group">
                    <div class="relative w-10 h-10 flex items-center justify-center bg-black border border-cyber-cyan clip-notch-sm group-hover:border-cyber-pink transition-colors">
                        <i class="fa-solid fa-dragon text-xl text-cyber-cyan group-hover:text-cyber-pink transition-colors"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-display font-bold text-2xl tracking-wider text-white leading-none">
                            TECH<span class="gaming-text-gradient">HAVEN</span>
                        </span>
                    </div>
                </a>

                <div class="hidden md:flex flex-1 max-w-lg mx-8">
                    <div class="relative w-full group">
                        <input type="text" placeholder="Search components, laptops, gear..." 
                            class="w-full bg-cyber-input border border-gray-800 text-gray-300 text-sm rounded-none clip-notch-sm py-2.5 pl-10 pr-4 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all placeholder-gray-600">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500 group-focus-within:text-cyber-cyan transition-colors">
                            <i class="fa-solid fa-search"></i>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="hidden md:flex items-center gap-4 group">
                            <div class="flex flex-col text-right leading-none">
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">Operator</span>
                                <span class="text-cyber-cyan font-display font-bold text-lg tracking-wide uppercase drop-shadow-[0_0_5px_rgba(0,243,255,0.5)]">
                                    <?php echo htmlspecialchars($_SESSION['firstname'] ?? 'User'); ?>
                                </span>
                            </div>

                            <div class="w-10 h-10 border border-cyber-cyan bg-cyber-card flex items-center justify-center rounded-sm shadow-[0_0_10px_rgba(0,243,255,0.2)]">
                                <i class="fa-solid fa-user-astronaut text-cyber-pink"></i>
                            </div>

                            <a href="/logout" class="ml-2 text-gray-500 hover:text-red-500 transition-colors text-sm" title="Sign Out">
                                <i class="fa-solid fa-power-off"></i>
                            </a>
                        </div>
                    <?php else: ?>
                        <a href="/login" class="hidden md:flex items-center gap-2 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                            <i class="fa-regular fa-user"></i> Sign In
                        </a>
                    <?php endif; ?>

                    <a href="#" class="relative group">
                        <i class="fa-solid fa-cart-shopping text-gray-400 group-hover:text-cyber-cyan text-lg transition-colors"></i>
                        <span class="absolute -top-2 -right-2 bg-cyber-pink text-white text-[10px] font-bold px-1.5 py-0.5 rounded-sm">2</span>
                    </a>
                    
                    <button class="md:hidden text-gray-400 hover:text-white">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative overflow-hidden h-[500px] md:h-[600px] flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1593305841991-05c297ba4575?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" 
                 class="w-full h-full object-cover opacity-40" alt="Gaming Setup">
            <div class="absolute inset-0 bg-gradient-to-r from-cyber-dark via-cyber-dark/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-cyber-dark to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 w-full">
            <div class="max-w-2xl animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-cyber-cyan/10 border border-cyber-cyan/30 rounded-full mb-6">
                    <span class="w-2 h-2 rounded-full bg-cyber-cyan animate-pulse"></span>
                    <span class="text-cyber-cyan text-xs font-bold tracking-wider uppercase">New Arrival</span>
                </div>
                
                <h1 class="font-display text-5xl md:text-7xl font-black text-white leading-none mb-6 uppercase italic">
                    Beyond <br>
                    <span class="gaming-text-gradient">Limits</span>
                </h1>
                
                <p class="text-gray-400 text-lg mb-8 max-w-lg leading-relaxed border-l-2 border-cyber-pink pl-4">
                    Experience the next generation of computing. The RTX 50-Series is here, redefining performance for creators and gamers alike.
                </p>

                </div>
        </div>

        <div class="absolute bottom-0 right-0 p-10 hidden lg:block animate-float">
             <div class="relative">
                <div class="absolute inset-0 bg-cyber-cyan blur-[60px] opacity-20"></div>
                <img src="https://assets.nvidia.partners/images/png/geforce-rtx-4090-product-photo.png" alt="GPU" class="relative z-10 w-[500px] drop-shadow-[0_10px_20px_rgba(0,0,0,0.5)] opacity-90 grayscale hover:grayscale-0 transition-all duration-500">
             </div>
        </div>
    </div>

    <div class="py-12 bg-cyber-card border-y border-white/5">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="#" class="group relative h-32 overflow-hidden clip-notch-sm bg-cyber-input border border-white/5 hover:border-cyber-cyan transition-colors">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
                    <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-500" alt="Components">
                    <div class="absolute bottom-3 left-4 z-20">
                        <i class="fa-solid fa-microchip text-cyber-cyan mb-1 text-xl"></i>
                        <h3 class="font-display font-bold text-white text-lg uppercase tracking-wide">Components</h3>
                    </div>
                </a>
                
                <a href="#" class="group relative h-32 overflow-hidden clip-notch-sm bg-cyber-input border border-white/5 hover:border-cyber-pink transition-colors">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
                    <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-500" alt="Laptops">
                    <div class="absolute bottom-3 left-4 z-20">
                        <i class="fa-solid fa-laptop text-cyber-pink mb-1 text-xl"></i>
                        <h3 class="font-display font-bold text-white text-lg uppercase tracking-wide">Laptops</h3>
                    </div>
                </a>

                <a href="#" class="group relative h-32 overflow-hidden clip-notch-sm bg-cyber-input border border-white/5 hover:border-cyber-purple transition-colors">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
                    <img src="https://images.unsplash.com/photo-1612287232817-60286063d270?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-500" alt="Peripherals">
                    <div class="absolute bottom-3 left-4 z-20">
                        <i class="fa-solid fa-keyboard text-cyber-purple mb-1 text-xl"></i>
                        <h3 class="font-display font-bold text-white text-lg uppercase tracking-wide">Peripherals</h3>
                    </div>
                </a>

                <a href="#" class="group relative h-32 overflow-hidden clip-notch-sm bg-cyber-input border border-white/5 hover:border-cyber-yellow transition-colors">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
                    <img src="https://images.unsplash.com/photo-1531297425971-ec8ca8bc9c07?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-500" alt="Gadgets">
                    <div class="absolute bottom-3 left-4 z-20">
                        <i class="fa-solid fa-headset text-cyber-yellow mb-1 text-xl"></i>
                        <h3 class="font-display font-bold text-white text-lg uppercase tracking-wide">Gadgets</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div id="products" class="py-16 max-w-7xl mx-auto px-4">
        <div class="flex items-end justify-between mb-10 border-b border-white/10 pb-4">
            <div>
                <h2 class="font-display text-3xl font-bold text-white uppercase italic">Featured <span class="text-cyber-cyan">Gear</span></h2>
                <p class="text-gray-500 text-sm mt-1">High-performance equipment for elite setups.</p>
            </div>
            <a href="/allproducts" class="text-cyber-cyan hover:text-white text-sm font-medium uppercase tracking-wider flex items-center gap-2">
                View All <i class="fa-solid fa-chevron-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="product-card bg-cyber-card border border-white/5 rounded-none clip-notch-sm overflow-hidden group">
                <div class="relative h-48 bg-[#0f111a] flex items-center justify-center p-4">
                    <div class="absolute top-2 right-2 z-10">
                        <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-sm uppercase">Hot</span>
                    </div>
                    <i class="fa-solid fa-microchip text-6xl text-gray-700 group-hover:text-cyber-cyan transition-colors duration-300 drop-shadow-[0_0_15px_rgba(0,243,255,0.3)] product-image"></i>
                </div>
                <div class="p-4 border-t border-white/5">
                    <div class="text-xs text-gray-500 mb-1">Graphics Cards</div>
                    <h3 class="text-white font-bold text-lg leading-tight mb-2 group-hover:text-cyber-cyan transition-colors">NVIDIA GeForce RTX 5090</h3>
                    <div class="flex items-center gap-1 mb-3">
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <span class="text-xs text-gray-500 ml-1">(42)</span>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-display font-bold text-white">$1,999.00</span>
                        <button class="w-8 h-8 flex items-center justify-center bg-cyber-input hover:bg-cyber-cyan hover:text-black text-cyber-cyan border border-cyber-cyan/30 rounded-sm transition-all">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="product-card bg-cyber-card border border-white/5 rounded-none clip-notch-sm overflow-hidden group">
                <div class="relative h-48 bg-[#0f111a] flex items-center justify-center p-4">
                     <i class="fa-solid fa-laptop-code text-6xl text-gray-700 group-hover:text-cyber-pink transition-colors duration-300 drop-shadow-[0_0_15px_rgba(255,0,255,0.3)] product-image"></i>
                </div>
                <div class="p-4 border-t border-white/5">
                    <div class="text-xs text-gray-500 mb-1">Laptops</div>
                    <h3 class="text-white font-bold text-lg leading-tight mb-2 group-hover:text-cyber-pink transition-colors">Quantum X1 Carbon</h3>
                    <div class="flex items-center gap-1 mb-3">
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-regular fa-star text-gray-600 text-xs"></i>
                        <span class="text-xs text-gray-500 ml-1">(18)</span>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-display font-bold text-white">$2,499.00</span>
                        <button class="w-8 h-8 flex items-center justify-center bg-cyber-input hover:bg-cyber-pink hover:text-black text-cyber-pink border border-cyber-pink/30 rounded-sm transition-all">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="product-card bg-cyber-card border border-white/5 rounded-none clip-notch-sm overflow-hidden group">
                <div class="relative h-48 bg-[#0f111a] flex items-center justify-center p-4">
                    <i class="fa-solid fa-keyboard text-6xl text-gray-700 group-hover:text-cyber-purple transition-colors duration-300 drop-shadow-[0_0_15px_rgba(189,0,255,0.3)] product-image"></i>
                </div>
                <div class="p-4 border-t border-white/5">
                    <div class="text-xs text-gray-500 mb-1">Peripherals</div>
                    <h3 class="text-white font-bold text-lg leading-tight mb-2 group-hover:text-cyber-purple transition-colors">CyberDeck Mechanical</h3>
                    <div class="flex items-center gap-1 mb-3">
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <span class="text-xs text-gray-500 ml-1">(124)</span>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-display font-bold text-white">$199.00</span>
                        <button class="w-8 h-8 flex items-center justify-center bg-cyber-input hover:bg-cyber-purple hover:text-black text-cyber-purple border border-cyber-purple/30 rounded-sm transition-all">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="product-card bg-cyber-card border border-white/5 rounded-none clip-notch-sm overflow-hidden group">
                <div class="relative h-48 bg-[#0f111a] flex items-center justify-center p-4">
                     <div class="absolute top-2 right-2 z-10">
                        <span class="bg-cyber-cyan text-black text-[10px] font-bold px-2 py-0.5 rounded-sm uppercase">New</span>
                    </div>
                    <i class="fa-solid fa-vr-cardboard text-6xl text-gray-700 group-hover:text-cyber-cyan transition-colors duration-300 drop-shadow-[0_0_15px_rgba(0,243,255,0.3)] product-image"></i>
                </div>
                <div class="p-4 border-t border-white/5">
                    <div class="text-xs text-gray-500 mb-1">VR / AR</div>
                    <h3 class="text-white font-bold text-lg leading-tight mb-2 group-hover:text-cyber-cyan transition-colors">Neural Link Headset</h3>
                    <div class="flex items-center gap-1 mb-3">
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-solid fa-star text-cyber-yellow text-xs"></i>
                        <i class="fa-regular fa-star text-gray-600 text-xs"></i>
                        <span class="text-xs text-gray-500 ml-1">(5)</span>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-display font-bold text-white">$599.00</span>
                        <button class="w-8 h-8 flex items-center justify-center bg-cyber-input hover:bg-cyber-cyan hover:text-black text-cyber-cyan border border-cyber-cyan/30 rounded-sm transition-all">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-gradient-to-r from-cyber-card to-[#0f111a] py-16 border-y border-white/5">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <i class="fa-solid fa-envelope-open-text text-4xl text-cyber-pink mb-4"></i>
            <h2 class="font-display text-3xl font-bold text-white uppercase italic mb-2">Join the <span class="text-cyber-pink">Inner Circle</span></h2>
            <p class="text-gray-400 mb-8">Get exclusive access to restocks, secret drops, and build guides.</p>
            
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto" onsubmit="event.preventDefault(); alert('Subscribed!')">
                <input type="email" placeholder="Enter email coordinates..." 
                    class="flex-1 bg-cyber-input border border-gray-700 text-white text-sm rounded-none clip-notch-sm p-3 focus:outline-none focus:border-cyber-pink focus:ring-1 focus:ring-cyber-pink transition-all">
                <button type="submit" class="bg-cyber-pink text-white font-display font-bold uppercase tracking-wider px-8 py-3 clip-notch-sm hover:bg-purple-600 transition-colors shadow-[0_0_15px_rgba(255,0,255,0.4)]">
                    Subscribe
                </button>
            </form>
        </div>
    </div>

    <footer class="bg-cyber-dark pt-12 pb-8 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fa-solid fa-dragon text-cyber-cyan text-xl"></i>
                    <span class="font-display font-bold text-xl text-white">TECH<span class="text-cyber-cyan">HAVEN</span></span>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Forging the future of high-performance computing. We equip the elite.
                </p>
                <div class="flex gap-4 mt-6">
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded bg-white/5 text-gray-400 hover:bg-cyber-cyan hover:text-black transition-all">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded bg-white/5 text-gray-400 hover:bg-cyber-pink hover:text-black transition-all">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded bg-white/5 text-gray-400 hover:bg-cyber-purple hover:text-black transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold uppercase tracking-wider text-sm mb-4">Shop</h4>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Components</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Laptops</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Peripherals</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Pre-builts</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold uppercase tracking-wider text-sm mb-4">Support</h4>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Order Status</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Shipping Policy</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Warranty</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Contact Ops</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold uppercase tracking-wider text-sm mb-4">Legal</h4>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Privacy Protocols</a></li>
                    <li><a href="#" class="hover:text-cyber-cyan transition-colors">Cookie Data</a></li>
                </ul>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-600 text-xs">© 2077 Tech Haven Systems. All rights reserved.</p>
            <div class="flex items-center gap-2">
                <i class="fa-brands fa-cc-visa text-gray-500 text-xl"></i>
                <i class="fa-brands fa-cc-mastercard text-gray-500 text-xl"></i>
                <i class="fa-brands fa-cc-paypal text-gray-500 text-xl"></i>
                <i class="fa-brands fa-bitcoin text-gray-500 text-xl"></i>
            </div>
        </div>
    </footer>

</body>
</html>