<?php
require_once 'auth.php';
redirect_if_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login / Register - <?php echo htmlspecialchars($config['academyName']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = { 
            darkMode: 'class', 
            theme: { 
                extend: { 
                    fontFamily: { 
                        sans: ['Inter', 'sans-serif'] 
                    }, 
                    colors: { 
                        dark: { 
                            bg: '#1E1E1E', 
                            surface: '#252526', 
                            border: '#333333', 
                            text: '#D4D4D4', 
                            'text-secondary': '#A9A9A9', 
                            primary: '#007ACC', 
                            'primary-hover': '#005f9e' 
                        }, 
                        light: { 
                            primary: '#4f46e5', 
                            'primary-hover': '#4338ca' 
                        } 
                    } 
                } 
            } 
        }
    </script>
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior-y: none;
        }
        .tab-content { 
            transition: opacity 0.3s ease-in-out; 
        }
        .mobile-menu {
            transition: transform 0.3s ease-in-out;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 50;
            transform: translateX(-100%);
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
        @media (max-width: 768px) {
            .container {
                padding-left: 16px;
                padding-right: 16px;
            }
        }
        input, button {
            -webkit-tap-highlight-color: transparent;
        }
        * {
            -webkit-touch-callout: none;
            touch-action: manipulation;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-dark-bg text-gray-800 dark:text-dark-text">
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <a href="<?php echo BASE_URL; ?>" class="flex items-center space-x-2 mb-8">
            <i data-lucide="graduation-cap" class="h-10 w-10 text-light-primary dark:text-dark-primary"></i>
            <span class="text-3xl font-bold text-gray-800 dark:text-white"><?php echo htmlspecialchars($config['academyName']); ?></span>
        </a>
        <div class="w-full max-w-md bg-white dark:bg-dark-surface rounded-xl border border-gray-200 dark:border-dark-border shadow-2xl overflow-hidden">
            <div class="flex border-b border-gray-200 dark:border-dark-border">
                <button id="login-tab-button" class="tab-button flex-1 p-4 font-semibold text-center border-b-2 border-light-primary dark:border-dark-primary text-light-primary dark:text-dark-primary">Login</button>
                <button id="register-tab-button" class="tab-button flex-1 p-4 font-semibold text-center text-gray-500 dark:text-dark-text-secondary">Register</button>
            </div>
            <div class="p-8">
                <!-- Error & Success Messages -->
                <?php if(isset($_GET['error'])): ?>
                    <div class="bg-red-100 dark:bg-red-500/20 border border-red-400 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg mb-6" role="alert">
                        <strong class="font-bold">Error:</strong> <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_GET['success'])): ?>
                     <div class="bg-green-100 dark:bg-green-500/20 border border-green-400 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg mb-6" role="alert">
                        <strong class="font-bold">Success!</strong> Registration complete. Please log in.
                    </div>
                <?php endif; ?>
                
                <div id="login-tab-content">
                    <form action="auth.php" method="POST" class="space-y-6">
                        <input type="hidden" name="action" value="login">
                        <div>
                            <label for="login-email" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary mb-1">Email</label>
                            <input type="email" id="login-email" name="email" class="w-full p-3 rounded-lg bg-gray-100 dark:bg-dark-bg border border-gray-300 dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-light-primary dark:focus:ring-dark-primary" required>
                        </div>
                        <div>
                            <label for="login-password" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary mb-1">Password</label>
                            <input type="password" id="login-password" name="password" class="w-full p-3 rounded-lg bg-gray-100 dark:bg-dark-bg border border-gray-300 dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-light-primary dark:focus:ring-dark-primary" required>
                        </div>
                        <button type="submit" class="w-full bg-light-primary dark:bg-dark-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-light-primary-hover dark:hover:bg-dark-primary-hover">Sign In</button>
                    </form>
                </div>
                <div id="register-tab-content" class="hidden">
                    <form action="auth.php" method="POST" class="space-y-6">
                         <input type="hidden" name="action" value="register">
                         <div>
                            <label for="register-name" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary mb-1">Full Name</label>
                            <input type="text" id="register-name" name="name" class="w-full p-3 rounded-lg bg-gray-100 dark:bg-dark-bg border border-gray-300 dark:border-dark-border" required>
                        </div>
                        <div>
                            <label for="register-email" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary mb-1">Email</label>
                            <input type="email" id="register-email" name="email" class="w-full p-3 rounded-lg bg-gray-100 dark:bg-dark-bg border border-gray-300 dark:border-dark-border" required>
                        </div>
                        <div>
                            <label for="register-password" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary mb-1">Password</label>
                            <input type="password" id="register-password" name="password" class="w-full p-3 rounded-lg bg-gray-100 dark:bg-dark-bg border border-gray-300 dark:border-dark-border" required>
                        </div>
                        <button type="submit" class="w-full bg-light-primary dark:bg-dark-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-light-primary-hover dark:hover:bg-dark-primary-hover">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
        <p class="mt-8 text-center text-sm text-gray-500 dark:text-dark-text-secondary"><a href="<?php echo BASE_URL; ?>" class="hover:underline">← Back to Home</a></p>
    </div>
    <script>
        lucide.createIcons();
        const htmlEl = document.documentElement;
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            htmlEl.classList.add('dark');
        }
        const loginTab = document.getElementById('login-tab-button'), registerTab = document.getElementById('register-tab-button');
        const loginContent = document.getElementById('login-tab-content'), registerContent = document.getElementById('register-tab-content');
        const setActiveTab = (isLogin) => {
            loginTab.classList.toggle('border-light-primary', isLogin);
            loginTab.classList.toggle('dark:border-dark-primary', isLogin);
            loginTab.classList.toggle('text-light-primary', isLogin);
            loginTab.classList.toggle('dark:text-dark-primary', isLogin);
            loginTab.classList.toggle('text-gray-500', !isLogin);
            loginTab.classList.toggle('dark:text-dark-text-secondary', !isLogin);
            registerTab.classList.toggle('border-light-primary', !isLogin);
            registerTab.classList.toggle('dark:border-dark-primary', !isLogin);
            registerTab.classList.toggle('text-light-primary', !isLogin);
            registerTab.classList.toggle('dark:text-dark-primary', !isLogin);
            registerTab.classList.toggle('text-gray-500', isLogin);
            registerTab.classList.toggle('dark:text-dark-text-secondary', isLogin);
            loginContent.classList.toggle('hidden', !isLogin);
            registerContent.classList.toggle('hidden', isLogin);
        };
        loginTab.addEventListener('click', () => setActiveTab(true));
        registerTab.addEventListener('click', () => setActiveTab(false));
    </script>
</body>
</html>
