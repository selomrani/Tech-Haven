<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tech Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts: Rajdhani for headings, Inter for body -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">

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
                        }
                    },
                    animation: {
                        'pulse-glow': 'pulse-glow 3s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'scanline': 'scanline 8s linear infinite',
                    },
                    keyframes: {
                        'pulse-glow': {
                            '0%, 100%': {
                                boxShadow: '0 0 15px rgba(0, 243, 255, 0.2)'
                            },
                            '50%': {
                                boxShadow: '0 0 25px rgba(189, 0, 255, 0.4)'
                            },
                        },
                        'float': {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        },
                        'scanline': {
                            '0%': {
                                transform: 'translateY(-100%)'
                            },
                            '100%': {
                                transform: 'translateY(100%)'
                            }
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
            background-size: 30px 30px;
            min-height: 100vh;
        }

        .gaming-text-gradient {
            background: linear-gradient(to right, #00f3ff, #ff00ff);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #050505;
        }

        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #00f3ff;
        }

        .glass-panel {
            background: rgba(10, 11, 16, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .clip-notch {
            clip-path: polygon(0 0,
                    100% 0,
                    100% calc(100% - 20px),
                    calc(100% - 20px) 100%,
                    0 100%);
        }

        .scanline-overlay {
            background: linear-gradient(to bottom, transparent 50%, rgba(0, 243, 255, 0.02) 50%);
            background-size: 100% 4px;
        }
    </style>
</head>

<body class="text-gray-300 flex items-center justify-center p-4">

    <!-- Glow Effect Behind Card -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-cyber-purple rounded-full mix-blend-screen filter blur-[128px] opacity-20 animate-pulse"></div>
        <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-cyber-cyan rounded-full mix-blend-screen filter blur-[128px] opacity-15 animate-pulse" style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Main Container -->
    <div class="relative w-full max-w-4xl flex flex-col md:flex-row shadow-2xl z-10 animate-fade-in-up">

        <!-- Decoration Borders -->
        <div class="absolute -inset-[1px] bg-gradient-to-r from-cyber-cyan via-cyber-purple to-cyber-pink rounded-xl opacity-50 blur-sm"></div>

        <div class="relative flex flex-col md:flex-row w-full bg-cyber-card rounded-xl overflow-hidden border border-white/10">

            <!-- Left Side: Visuals -->
            <div class="hidden md:flex md:w-5/12 bg-[#08090f] relative overflow-hidden flex-col justify-between p-8 border-r border-white/5">
                <!-- Background Image Overlay -->
                <div class="absolute inset-0 z-0 opacity-40 mix-blend-overlay"
                    style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80'); background-size: cover; background-position: center;">
                </div>

                <!-- Scanline Animation -->
                <div class="absolute inset-0 pointer-events-none scanline-overlay opacity-30"></div>

                <div class="relative z-10">
                    <!-- Dynamic Logo (Fixed Visibility) -->
                    <div class="flex items-center gap-5 mb-12 group cursor-pointer select-none">
                        <!-- Icon Container -->
                        <div class="relative w-16 h-16 flex items-center justify-center">
                            <!-- Glitch Layers (Pseudo-3D effect) -->
                            <div class="absolute inset-0 bg-cyber-cyan/20 clip-notch transform translate-x-1 translate-y-1 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-200"></div>
                            <div class="absolute inset-0 bg-cyber-pink/20 clip-notch transform -translate-x-1 -translate-y-1 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-200"></div>

                            <!-- Main Icon Box -->
                            <div class="relative w-full h-full bg-black/80 border border-cyber-cyan clip-notch flex items-center justify-center group-hover:border-cyber-pink transition-colors duration-300 shadow-[0_0_15px_rgba(0,243,255,0.15)]">
                                <i class="fa-solid fa-dragon text-3xl text-cyber-cyan group-hover:text-cyber-pink transition-all duration-300 drop-shadow-[0_0_8px_rgba(0,243,255,0.6)]"></i>
                            </div>

                            <!-- Decorative Corner -->
                            <div class="absolute -bottom-1 -right-1 w-3 h-3 border-b-2 border-r-2 border-white/30 group-hover:border-cyber-cyan transition-colors"></div>
                        </div>

                        <!-- Text -->
                        <div class="flex flex-col justify-center">
                            <h1 class="font-display text-4xl font-black tracking-widest text-white italic relative z-10 leading-none">
                                TECH
                                <span class="gaming-text-gradient group-hover:animate-pulse">HAVEN</span>
                            </h1>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="h-[1px] w-full bg-gradient-to-r from-cyber-cyan/50 to-transparent"></span>
                                <span class="text-[10px] text-cyber-cyan font-mono whitespace-nowrap tracking-widest opacity-70">EST. 2077</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h2 class="font-display text-4xl font-bold leading-none uppercase italic">
                            Welcome <br>
                            <span class="gaming-text-gradient">Back</span>
                        </h2>
                        <div class="w-12 h-1 bg-gradient-to-r from-cyber-purple to-transparent"></div>
                        <p class="text-gray-400 font-light text-sm">
                            Enter your details to access your account.
                        </p>
                    </div>
                </div>

                <!-- System Status -->
                <div class="relative z-10 animate-float mt-auto">
                    <div class="glass-panel p-3 rounded-lg border-l-4 border-green-500 max-w-[200px]">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-green-400">Server Status</span>
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse shadow-[0_0_8px_#22c55e]"></div>
                        </div>
                        <p class="text-xs text-white font-mono">US-EAST-1: <span class="text-green-400">STABLE</span></p>
                        <p class="text-[10px] text-gray-500 font-mono mt-1">Ping: 12ms</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="w-full md:w-7/12 p-8 md:p-12 relative bg-cyber-dark/95 flex flex-col justify-center">
                <!-- Decorative Corner -->
                <div class="absolute top-0 right-0 p-6 pointer-events-none opacity-20">
                    <i class="fa-solid fa-fingerprint text-6xl text-cyber-cyan"></i>
                </div>

                <div class="mb-8">
                    <h2 class="font-display text-3xl font-bold text-white mb-2 uppercase tracking-wide">Sign In</h2>
                    <p class="text-gray-500 text-sm">New user? <a href="/register" class="text-cyber-cyan hover:text-cyber-pink transition-colors font-medium hover:underline decoration-cyber-pink/50">Create an Account</a></p>
                </div>

                <!-- Feedback Container -->
                <div id="message-container" class="hidden mb-6 p-3 rounded bg-gray-900 border-l-4 text-sm relative overflow-hidden transition-all">
                    <div class="relative z-10 flex items-center gap-3">
                        <div id="msg-icon"></div>
                        <div id="msg-text"></div>
                    </div>
                </div>

                <form id="loginForm" class="space-y-6" action="/signin">

                    <!-- Email -->
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-cyber-cyan uppercase tracking-[0.1em] ml-1">Email Address</label>
                        <div class="relative group">
                            <input type="email" id="email" name="email" required
                                class="w-full bg-cyber-input border border-gray-800 text-white text-sm rounded-sm p-3 pl-10 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all placeholder-gray-600 font-medium"
                                placeholder="name@example.com">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-600 group-focus-within:text-cyber-cyan transition-colors">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <!-- Corner accent -->
                            <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-gray-600 group-focus-within:border-cyber-cyan transition-colors"></div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-1">
                        <div class="flex justify-between items-center">
                            <label class="text-[10px] font-bold text-cyber-cyan uppercase tracking-[0.1em] ml-1">Password</label>
                            <a href="#" class="text-[10px] text-gray-500 hover:text-white transition-colors">Forgot Password?</a>
                        </div>
                        <div class="relative group">
                            <input type="password" id="password" name="password" required
                                class="w-full bg-cyber-input border border-gray-800 text-white text-sm rounded-sm p-3 pl-10 pr-10 focus:outline-none focus:border-cyber-cyan focus:ring-1 focus:ring-cyber-cyan transition-all placeholder-gray-600 font-medium"
                                placeholder="••••••••">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-600 group-focus-within:text-cyber-cyan transition-colors">
                                <i class="fa-solid fa-key"></i>
                            </div>
                            <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-cyber-cyan transition-colors">
                                <i class="fa-regular fa-eye" id="password-icon"></i>
                            </button>
                            <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-gray-600 group-focus-within:border-cyber-cyan transition-colors"></div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" class="w-4 h-4 border border-gray-700 rounded bg-cyber-input checked:bg-cyber-purple checked:border-cyber-purple focus:ring-0 focus:ring-offset-0 transition-all cursor-pointer accent-purple-500">
                        <label for="remember" class="ml-2 text-xs text-gray-400 select-none cursor-pointer">Remember me</label>
                    </div>

                    <!-- Button -->
                    <button type="submit" id="submitBtn" class="clip-notch w-full relative group overflow-hidden bg-white text-black font-display font-bold text-lg uppercase tracking-wider py-4 transition-all hover:bg-cyber-cyan hover:shadow-[0_0_20px_rgba(0,243,255,0.6)]">
                            <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/50 to-transparent -translate-x-full group-hover:animate-[shimmer_1s_infinite]"></div>
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Sign In <i class="fa-solid fa-arrow-right text-xs mt-0.5"></i>
                            </span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(inputId + '-icon');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // function handleLogin(event) {
        //     event.preventDefault();
        //     const submitBtn = document.getElementById('submitBtn');
        //     const messageContainer = document.getElementById('message-container');
        //     const msgIcon = document.getElementById('msg-icon');
        //     const msgText = document.getElementById('msg-text');
        //     const email = document.getElementById('email').value;

        //     // Loading State
        //     submitBtn.disabled = true;
        //     submitBtn.querySelector('span').innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Signing In...';
        //     submitBtn.classList.add('opacity-80', 'cursor-not-allowed');

        //     setTimeout(() => {
        //         // Determine success/fail for demo purposes (fail if email contains 'fail')
        //         const isSuccess = !email.includes('fail');

        //         if (isSuccess) {
        //             submitBtn.querySelector('span').innerHTML = 'Success';
        //             submitBtn.classList.replace('bg-white', 'bg-green-500');
        //             submitBtn.classList.add('text-black');

        //             messageContainer.classList.remove('hidden', 'border-red-500');
        //             messageContainer.classList.add('flex', 'border-green-500', 'bg-green-500/10');
        //             msgIcon.innerHTML = '<i class="fa-solid fa-check text-green-400"></i>';
        //             msgText.innerHTML = '<span class="text-green-400 font-bold uppercase text-xs">Login Successful</span><br><span class="text-gray-400 text-xs">Redirecting...</span>';

        //             setTimeout(() => {
        //                 // Redirect simulation
        //                 window.location.href = '#dashboard';
        //             }, 2000);

        //         } else {
        //             // Error State
        //             submitBtn.disabled = false;
        //             submitBtn.querySelector('span').innerHTML = 'Sign In <i class="fa-solid fa-arrow-right"></i>';
        //             submitBtn.classList.remove('opacity-80', 'cursor-not-allowed');

        //             messageContainer.classList.remove('hidden', 'border-green-500', 'bg-green-500/10');
        //             messageContainer.classList.add('flex', 'border-red-500', 'bg-red-500/10');
        //             msgIcon.innerHTML = '<i class="fa-solid fa-triangle-exclamation text-red-400"></i>';
        //             msgText.innerHTML = '<span class="text-red-400 font-bold uppercase text-xs">Error</span><br><span class="text-gray-400 text-xs">Invalid credentials provided.</span>';
        //         }

        //     }, 1500);
        // }
    </script>
</body>

</html>