<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - System Malfunction</title>
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
                            danger: '#ef4444'
                        }
                    },
                    animation: {
                        'glitch': 'glitch 1s linear infinite',
                    },
                    keyframes: {
                        'glitch': {
                            '2%, 64%': { transform: 'translate(2px,0) skew(0deg)' },
                            '4%, 60%': { transform: 'translate(-2px,0) skew(0deg)' },
                            '62%': { transform: 'translate(0,0) skew(5deg)' },
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
            background-size: 40px 40px;
            color: #e2e8f0;
        }

        .gaming-text-gradient {
            background: linear-gradient(to right, #00f3ff, #ff00ff);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .clip-notch-btn {
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%);
        }

        /* Glitch Text Effect */
        .glitch-text {
            position: relative;
        }
        .glitch-text::before,
        .glitch-text::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #050505;
        }
        .glitch-text::before {
            left: 2px;
            text-shadow: -1px 0 #ff00ff;
            clip: rect(24px, 550px, 90px, 0);
            animation: glitch-anim-2 3s infinite linear alternate-reverse;
        }
        .glitch-text::after {
            left: -2px;
            text-shadow: -1px 0 #00f3ff;
            clip: rect(85px, 550px, 140px, 0);
            animation: glitch-anim 2.5s infinite linear alternate-reverse;
        }
        @keyframes glitch-anim {
            0% { clip: rect(11px, 9999px, 81px, 0); }
            20% { clip: rect(74px, 9999px, 14px, 0); }
            40% { clip: rect(25px, 9999px, 95px, 0); }
            60% { clip: rect(66px, 9999px, 36px, 0); }
            80% { clip: rect(3px, 9999px, 63px, 0); }
            100% { clip: rect(54px, 9999px, 11px, 0); }
        }
        @keyframes glitch-anim-2 {
            0% { clip: rect(62px, 9999px, 3px, 0); }
            20% { clip: rect(18px, 9999px, 59px, 0); }
            40% { clip: rect(89px, 9999px, 25px, 0); }
            60% { clip: rect(9px, 9999px, 86px, 0); }
            80% { clip: rect(41px, 9999px, 20px, 0); }
            100% { clip: rect(76px, 9999px, 53px, 0); }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen relative overflow-x-hidden p-4 py-10">

    <!-- Background Glows -->
    <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-cyber-purple/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="fixed top-1/4 left-1/4 w-[300px] h-[300px] bg-cyber-cyan/5 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="text-center relative z-10 w-full max-w-xl">
        
        <!-- Logo -->
        <div class="flex items-center justify-center gap-4 mb-12 select-none animate-fade-in-up">
            <div class="relative w-12 h-12 flex items-center justify-center bg-black border border-cyber-cyan clip-notch-btn shadow-[0_0_10px_rgba(0,243,255,0.3)]">
                <i class="fa-solid fa-dragon text-2xl text-cyber-cyan"></i>
            </div>
            <div class="flex flex-col text-left">
                <span class="font-display font-bold text-3xl tracking-wider text-white leading-none">
                    TECH<span class="gaming-text-gradient">HAVEN</span>
                </span>
                <span class="text-[10px] text-cyber-cyan font-mono tracking-widest opacity-70">SYSTEM_ERROR_LOG</span>
            </div>
        </div>

        <!-- Large 404 -->
        <div class="relative mb-12 select-none">
            <h1 class="glitch-text font-display text-[120px] md:text-[180px] font-black leading-none text-white tracking-tighter drop-shadow-[0_0_20px_rgba(255,255,255,0.15)]" data-text="404">
                404
            </h1>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[120%] h-[1px] bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
        </div>
        
        <!-- Open Layout Content (No Box) -->
        <div class="space-y-8">
            
            <!-- Floating Icon -->
            <div class="flex justify-center">
                <div class="w-16 h-16 flex items-center justify-center rounded-full bg-cyber-danger/10 border border-cyber-danger/30 shadow-[0_0_30px_rgba(239,68,68,0.2)] animate-pulse">
                    <i class="fa-solid fa-triangle-exclamation text-cyber-danger text-2xl"></i>
                </div>
            </div>

            <!-- Error Message -->
            <div class="space-y-4">
                <h2 class="font-display text-3xl font-bold text-white uppercase tracking-[0.2em] text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-500">
                    System Malfunction
                </h2>
                
                <div class="flex flex-col items-center gap-3">
                    <div class="h-px w-32 bg-gradient-to-r from-transparent via-cyber-danger to-transparent opacity-60"></div>
                    <p class="text-cyber-cyan font-mono text-lg tracking-wide uppercase">
                        >> Coordinates Invalid <<
                    </p>
                    <div class="h-px w-32 bg-gradient-to-r from-transparent via-cyber-danger to-transparent opacity-60"></div>
                </div>

                <p class="text-gray-400 text-base leading-relaxed max-w-md mx-auto">
                    The sector you are attempting to access does not exist in this dimension. It may have been purged or moved.
                </p>
            </div>

            <!-- Actions -->
            <div class="pt-8 flex flex-col sm:flex-row gap-6 justify-center">
                <a href="/" class="inline-flex items-center justify-center gap-2 bg-cyber-cyan text-black font-display font-bold uppercase tracking-wider px-10 py-4 clip-notch-btn hover:bg-white transition-all shadow-[0_0_20px_rgba(0,243,255,0.4)] hover:shadow-[0_0_30px_rgba(0,243,255,0.6)] group">
                    <i class="fa-solid fa-house-signal text-sm group-hover:scale-110 transition-transform"></i> Return Home
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 border border-gray-700 text-gray-300 font-display font-bold uppercase tracking-wider px-10 py-4 clip-notch-btn hover:border-cyber-purple hover:text-cyber-purple hover:shadow-[0_0_15px_rgba(189,0,255,0.3)] transition-all">
                    <i class="fa-solid fa-bug text-sm"></i> Report Glitch
                </a>
            </div>
        </div>
        
        <div class="mt-16 text-[10px] text-gray-600 font-mono">
            ERROR_CODE: 0x404_NOT_FOUND | TECH_HAVEN_SYSTEMS | TERMINAL_ID_882
        </div>

    </div>

</body>
</html>