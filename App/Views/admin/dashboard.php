<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tech Haven</title>
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
                linear-gradient(rgba(0, 243, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 243, 255, 0.02) 1px, transparent 1px);
            background-size: 30px 30px;
            color: #e2e8f0;
        }

        .gaming-text-gradient {
            background: linear-gradient(to right, #00f3ff, #ff00ff);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .clip-notch {
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 15px), calc(100% - 15px) 100%, 0 100%);
        }

        .clip-notch-btn {
            clip-path: polygon(0 0,
                    100% 0,
                    100% calc(100% - 10px),
                    calc(100% - 10px) 100%,
                    0 100%);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #050505;
        }

        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #00f3ff;
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-cyber-card border-r border-white/5 flex flex-col hidden md:flex">
        <!-- Logo -->
        <div class="h-20 flex items-center px-6 border-b border-white/5">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-dragon text-cyber-cyan text-xl"></i>
                <div class="flex flex-col">
                    <span class="font-display font-bold text-xl tracking-wider text-white">TECH<span class="gaming-text-gradient">HAVEN</span></span>
                    <span class="text-[9px] text-gray-500 font-mono tracking-widest uppercase">Admin Terminal</span>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1">
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 rounded-sm transition-colors group">
                <i class="fa-solid fa-chart-line w-5 text-center group-hover:text-cyber-cyan transition-colors"></i>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-white bg-cyber-cyan/10 border-l-2 border-cyber-cyan transition-colors">
                <i class="fa-solid fa-box w-5 text-center text-cyber-cyan"></i>
                Products
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 rounded-sm transition-colors group">
                <i class="fa-solid fa-cart-shopping w-5 text-center group-hover:text-cyber-pink transition-colors"></i>
                Orders
                <span class="ml-auto bg-cyber-pink text-black text-[9px] font-bold px-1.5 py-0.5 rounded-sm">5</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 rounded-sm transition-colors group">
                <i class="fa-solid fa-users w-5 text-center group-hover:text-cyber-purple transition-colors"></i>
                Customers
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 rounded-sm transition-colors group">
                <i class="fa-solid fa-sliders w-5 text-center group-hover:text-cyber-yellow transition-colors"></i>
                Settings
            </a>
        </nav>

        <!-- User -->
        <div class="p-4 border-t border-white/5">
            <div class="flex items-center gap-3">
                <img src="https://i.pravatar.cc/100?img=33" alt="Admin" class="w-8 h-8 rounded-full border border-cyber-cyan/50">
                <div class="flex flex-col">
                    <span class="text-xs font-bold text-white">Admin User</span>
                    <span class="text-[10px] text-gray-500">System Operator</span>
                </div>
                <button class="ml-auto text-gray-500 hover:text-white">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </button>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <!-- Top Bar (Mobile Only/Actions) -->
        <header class="h-16 bg-cyber-card/50 backdrop-blur border-b border-white/5 flex items-center justify-between px-6">
            <button class="md:hidden text-white">
                <i class="fa-solid fa-bars text-lg"></i>
            </button>
            <div class="flex items-center gap-4 ml-auto">
                <div class="relative">
                    <i class="fa-regular fa-bell text-gray-400 hover:text-white cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 w-2 h-2 bg-cyber-pink rounded-full animate-pulse"></span>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <div class="flex-1 overflow-y-auto p-6 lg:p-10">

            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div>
                        <h1 class="font-display text-3xl font-bold text-white uppercase italic">Product <span class="text-cyber-cyan">Management</span></h1>
                        <p class="text-sm text-gray-500 mt-1">Add new inventory items to the system database.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Left: Add New Product Form -->
                    <div class="lg:col-span-2">
                        <!-- Feedback Message Container -->
                        <div id="message-container" class="hidden mb-6 p-4 rounded bg-green-500/10 border border-green-500/20 text-green-400 text-sm flex items-center gap-3 clip-notch-btn">
                            <i class="fa-solid fa-check-circle text-lg"></i>
                            <div>
                                <strong class="font-display uppercase tracking-wide">Success</strong>
                                <p class="text-xs text-green-400/80">Product added to inventory successfully.</p>
                            </div>
                        </div>

                        <div class="bg-cyber-card border border-white/5 p-6 relative overflow-hidden clip-notch">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-cyber-cyan/5 rounded-full blur-2xl"></div>

                            <h2 class="font-display text-lg font-bold text-white uppercase mb-6 flex items-center gap-2">
                                <i class="fa-solid fa-plus text-cyber-cyan"></i> Add New Product
                            </h2>

                            <form action="../../Controllers/AdminController.php" method="post" id="addProductForm" class="space-y-6">
                                <!-- Product Name -->
                                <div class="space-y-1">
                                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Product Name</label>
                                    <input type="text" name="name" required
                                        class="w-full bg-cyber-input border border-gray-700 text-white text-sm p-3 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all placeholder-gray-600 rounded-none"
                                        placeholder="e.g. GeForce RTX 5090 Founder's Edition">
                                </div>

                                <!-- Grid: Price & Category (Extra field for realism) -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Price ($)</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-3 text-gray-500">$</span>
                                            <input type="number" name="price" step="0.01" required
                                                class="w-full bg-cyber-input border border-gray-700 text-white text-sm p-3 pl-7 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all placeholder-gray-600 rounded-none"
                                                placeholder="1999.00">
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Category</label>
                                        <div class="relative">
                                            <select name="category" required class="w-full bg-cyber-input border border-gray-700 text-white text-sm p-3 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all rounded-none appearance-none cursor-pointer">
                                                <option value="" disabled selected>Select Category</option>

                                                <option value="GPU">GPU</option>
                                                <option value="CPU">CPU</option>
                                                <option value="gaming laptop">Gaming Laptop</option>
                                                <option value="prebuilt">Prebuilt PC</option>
                                                <option value="peripheral">Peripheral</option>
                                            </select>

                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                                <i class="fa-solid fa-chevron-down text-xs"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="space-y-1">
                                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Description</label>
                                    <textarea name="description" rows="4" required
                                        class="w-full bg-cyber-input border border-gray-700 text-white text-sm p-3 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all placeholder-gray-600 rounded-none resize-none"
                                        placeholder="Enter detailed product specifications and features..."></textarea>
                                </div>

                                <!-- Image Upload (Simplified) -->
                                <div class="space-y-1">
                                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Product Image</label>
                                    <input type="file" name="image" accept="image/*" class="w-full bg-cyber-input border border-gray-700 text-gray-400 text-sm p-2 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all file:mr-4 file:py-2 file:px-4 file:rounded-none file:border-0 file:text-xs file:font-bold file:uppercase file:bg-cyber-cyan file:text-black hover:file:bg-white file:transition-colors file:cursor-pointer cursor-pointer">
                                    <p class="text-[10px] text-gray-500 pt-1">Formats: SVG, PNG, JPG (Max 3MB)</p>
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-4 border-t border-white/5 flex items-center justify-end gap-4">
                                    <button type="button" class="text-gray-400 text-xs font-bold uppercase hover:text-white transition-colors">Cancel</button>
                                    <button type="submit" id="submitBtn" class="bg-cyber-cyan text-black font-display font-bold uppercase tracking-wider px-8 py-3 clip-notch-btn hover:bg-white transition-colors shadow-[0_0_15px_rgba(0,243,255,0.4)] flex items-center gap-2">
                                        <span>Publish Product</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Right: Recent Products Preview (Context) -->
                    <div class="lg:col-span-1 space-y-6">
                        <div class="bg-cyber-card border border-white/5 p-6 clip-notch">
                            <h3 class="font-display text-sm font-bold text-white uppercase mb-4 flex items-center justify-between">
                                <span>Recent Additions</span>
                                <a href="#" class="text-[10px] text-cyber-cyan hover:underline">View All</a>
                            </h3>

                            <div class="space-y-4" id="recentProductsList">
                                <!-- Mock Item 1 -->
                                <div class="flex gap-3 items-start group">
                                    <div class="w-12 h-12 bg-cyber-input border border-gray-800 rounded-sm flex items-center justify-center flex-shrink-0 group-hover:border-cyber-cyan transition-colors">
                                        <i class="fa-solid fa-microchip text-gray-500"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-bold text-gray-200 truncate">RTX 5090 Ti</h4>
                                        <div class="flex items-center gap-2 mt-0.5">
                                            <span class="text-xs text-cyber-cyan font-mono">$2,499</span>
                                            <span class="text-[10px] text-gray-500">• GPU</span>
                                        </div>
                                    </div>
                                    <button class="text-gray-600 hover:text-cyber-pink transition-colors"><i class="fa-solid fa-pencil text-xs"></i></button>
                                </div>

                                <!-- Mock Item 2 -->
                                <div class="flex gap-3 items-start group">
                                    <div class="w-12 h-12 bg-cyber-input border border-gray-800 rounded-sm flex items-center justify-center flex-shrink-0 group-hover:border-cyber-pink transition-colors">
                                        <i class="fa-solid fa-laptop-code text-gray-500"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-bold text-gray-200 truncate">Quantum X1</h4>
                                        <div class="flex items-center gap-2 mt-0.5">
                                            <span class="text-xs text-cyber-cyan font-mono">$2,299</span>
                                            <span class="text-[10px] text-gray-500">• Laptop</span>
                                        </div>
                                    </div>
                                    <button class="text-gray-600 hover:text-cyber-pink transition-colors"><i class="fa-solid fa-pencil text-xs"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-cyber-input border border-gray-800 p-4 rounded-sm text-center">
                                <div class="text-2xl font-display font-bold text-white">1,024</div>
                                <div class="text-[10px] text-gray-500 uppercase tracking-wider">Total Items</div>
                            </div>
                            <div class="bg-cyber-input border border-gray-800 p-4 rounded-sm text-center">
                                <div class="text-2xl font-display font-bold text-cyber-yellow">12</div>
                                <div class="text-[10px] text-gray-500 uppercase tracking-wider">Low Stock</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../../public/assets/js/dashboard.js"></script>
</body>

</html>