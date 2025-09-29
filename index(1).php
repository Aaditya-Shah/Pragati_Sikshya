<?php
// Start session to check login status
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define BASE_URL if not defined, for standalone demonstration
if (!defined('BASE_URL')) {
    define('BASE_URL', '/');
}

// config.php would contain all the dynamic content in arrays.
// require_once 'config.php'; // Assuming config.php is updated with new structure

// --- MOCK CONFIG FOR HACKATHON DEMONSTRATION ---
$config['companyName'] = 'Pragati Sikshya';
$config['navLinks'] = [
    ['title' => 'Home', 'href' => '#hero'],
    ['title' => 'Tracks', 'href' => '#tracks'],
    ['title' => 'Mentors', 'href' => '#mentors'],
    ['title' => 'Why Join?', 'href' => '#why-join'],
    ['title' => 'Testimonials', 'href' => '#testimonials'],
];
$config['hero'] = [
    'tagline' => 'INNOVATE. COLLABORATE. CREATE.',
    'title' => 'Join the Ultimate Hackathon Experience Course',
    'subtitle' => 'Showcase your skills, build amazing projects, and connect with industry leaders. Your next big idea starts here with Pragati Sikshya.',
    'ctaButton' => 'Register Now',
];
$config['whyJoin'] = [
    ['icon' => 'lightbulb', 'title' => 'Intensive Workshops', 'description' => 'Learn new skills and technologies from experts in focused, hands-on sessions.'],
    ['icon' => 'target', 'title' => 'Real-World Challenges', 'description' => 'Solve meaningful problems and build a portfolio-worthy project in just 48 hours.'],
    ['icon' => 'users', 'title' => 'Networking Opportunities', 'description' => 'Connect with developers, designers, mentors, and recruiters from top tech companies.'],
    ['icon' => 'award', 'title' => 'Prizes & Recognition', 'description' => 'Win amazing prizes, gain recognition for your work, and even land job interviews.'],
];
$config['mentors'] = [
    ['name' => 'Arjan Chaudhary', 'title' => 'Hacker & Ceo of Groww Tech', 'image' => ''],
    ['name' => 'Sankalpa Baral', 'title' => 'Cyber Security Expert', 'image' => ''],
    ['name' => 'Shrijal', 'title' => 'Mentor', 'image' => ''],
    ['name' => 'Abhay Karn', 'title' => 'Computer Scientist', 'image' => ''],
];
$config['tracks'] = [
    ['title' => 'Web & App Development', 'description' => 'Build innovative web and mobile applications. Focus on UI/UX, full-stack development, and modern deployment pipelines.', 'icon' => 'layout-template'],
    ['title' => 'AI & Machine Learning', 'description' => 'Dive into the world of artificial intelligence. Work on projects involving data analysis, predictive modeling, and neural networks.', 'icon' => 'brain-circuit'],
];
$config['testimonials'] = [
    [
        'quote' => 'Pragati Sikshya\'s hackathon was a game-changer. The mentorship I received helped my team win first place!',
        'name' => 'Aisha Sharma',
        'role' => 'Winner, Hackathon 2024'
    ],
    [
        'quote' => 'An incredible experience! I connected with so many talented people and learned more in one weekend than in months of classes.',
        'name' => 'Rohan Gupta',
        'role' => 'Participant, Full-Stack Track'
    ],
    [
        'quote' => 'The energy, the innovation, the community... it was unforgettable. I highly recommend it to any aspiring developer.',
        'name' => 'Priya Singh',
        'role' => 'Participant, AI/ML Track'
    ]
];
// --- END MOCK CONFIG ---

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config['companyName']); ?> | Hackathon</title>
    <link rel="icon" type="image/png" href="/uploads/logo.png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        dark: { 
                            bg: '#0F172A',       // Slate 900
                            surface: '#1E293B', // Slate 800
                            border: '#334155',  // Slate 700
                            text: '#F1F5F9',     // Slate 100
                            'text-secondary': '#94A3B8', // Slate 400
                            primary: '#38BDF8', // Light Blue 400
                            'primary-hover': '#0EA5E9'  // Sky 500
                        },
                        light: { 
                            primary: '#2563EB', // Blue 600
                            'primary-hover': '#1D4ED8' // Blue 700
                        }
                    },
                    keyframes: {
                        pulseHeart: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.2)' },
                        }
                    },
                    animation: {
                        pulseHeart: 'pulseHeart 1.5s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        #mobile-menu { transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .hero-gradient-text {
            background: linear-gradient(to right, #2563EB, #4F46E5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .dark .hero-gradient-text {
             background: linear-gradient(to right, #38BDF8, #818CF8);
            -webkit-background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-dark-bg text-gray-800 dark:text-dark-text transition-colors duration-300">

    <header class="bg-white/90 dark:bg-dark-bg/80 backdrop-blur-lg sticky top-0 z-50 border-b border-gray-200 dark:border-dark-border">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <a href="<?php echo BASE_URL; ?>" class="flex items-center space-x-3">
                    <img src="/uploads/logo.png" alt="<?php echo htmlspecialchars($config['companyName']); ?> Logo" class="h-12 w-auto rounded-full">
                    <span class="text-lg md:text-xl font-bold text-gray-800 dark:text-white whitespace-nowrap"><?php echo htmlspecialchars($config['companyName']); ?></span>
                </a>
                
                <div class="flex items-center space-x-2 md:space-x-4">
                    <nav class="hidden md:flex items-center space-x-6">
                        <?php foreach ($config['navLinks'] as $link): ?>
                            <a href="<?php echo htmlspecialchars($link['href']); ?>" class="text-gray-600 dark:text-dark-text-secondary hover:text-light-primary dark:hover:text-dark-primary transition-colors duration-300 font-medium">
                                <?php echo htmlspecialchars($link['title']); ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>

                    <button id="theme-toggle" class="p-2 rounded-full text-gray-600 dark:text-dark-text-secondary hover:bg-gray-200 dark:hover:bg-dark-surface">
                        <i data-lucide="sun" class="h-5 w-5 hidden" id="theme-icon-sun"></i>
                        <i data-lucide="moon" class="h-5 w-5 hidden" id="theme-icon-moon"></i>
                    </button>
                    
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <a href="<?php echo BASE_URL . strtolower($_SESSION['user_role']); ?>/" class="hidden md:inline-block rounded-md bg-light-primary px-5 py-2 text-sm font-semibold text-white shadow-sm transition-colors duration-300 hover:bg-light-primary-hover dark:bg-dark-primary dark:hover:bg-dark-primary-hover">
                            Dashboard
                        </a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>login.php" class="hidden md:inline-block rounded-md bg-light-primary px-5 py-2 text-sm font-semibold text-white shadow-sm transition-colors duration-300 hover:bg-light-primary-hover dark:bg-dark-primary dark:hover:bg-dark-primary-hover">
                            Login / Register
                        </a>
                    <?php endif; ?>

                    <div class="md:hidden">
                        <button id="menu-button" class="text-gray-700 dark:text-dark-text-secondary focus:outline-none">
                            <i data-lucide="menu" id="menu-open-icon" class="h-6 w-6"></i>
                            <i data-lucide="x" id="menu-close-icon" class="h-6 w-6 hidden"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden overflow-hidden max-h-0">
                <nav class="flex flex-col space-y-4 pt-4">
                    <?php foreach ($config['navLinks'] as $link): ?>
                        <a href="<?php echo htmlspecialchars($link['href']); ?>" class="mobile-nav-link text-gray-600 dark:text-dark-text-secondary hover:text-light-primary dark:hover:text-dark-primary transition-colors duration-300 font-medium text-center py-2 rounded-lg bg-gray-100 dark:bg-dark-surface">
                            <?php echo htmlspecialchars($link['title']); ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <a href="<?php echo BASE_URL . strtolower($_SESSION['user_role']); ?>/" class="mobile-nav-link block w-full text-center rounded-md bg-light-primary px-5 py-3 font-semibold text-white shadow-sm">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>login.php" class="mobile-nav-link block w-full text-center rounded-md bg-light-primary px-5 py-3 font-semibold text-white shadow-sm">Login / Register</a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section id="hero" class="bg-white dark:bg-dark-bg py-24 md:py-32">
            <div class="container mx-auto px-6 text-center">
                <div class="max-w-4xl mx-auto">
                    <p class="font-semibold text-light-primary dark:text-dark-primary mb-2 tracking-wide"><?php echo htmlspecialchars($config['hero']['tagline']); ?></p>
                    <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 dark:text-white mb-4 leading-tight">
                        <span class="hero-gradient-text"><?php echo htmlspecialchars($config['hero']['title']); ?></span>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 dark:text-dark-text-secondary mb-10"><?php echo htmlspecialchars($config['hero']['subtitle']); ?></p>
                    
                    <div class="flex flex-wrap justify-center items-center gap-4">
                        <a href="<?php echo BASE_URL; ?>login.php" class="inline-block rounded-lg bg-blue-600 px-8 py-4 text-center text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-sky-500 dark:hover:bg-sky-600 dark:focus:ring-sky-400">
                            <?php echo htmlspecialchars($config['hero']['ctaButton']); ?>
                        </a>
                        <a href="https://hackclub.yantraiot.com/wellnesshub" target="_blank" class="inline-block rounded-lg bg-gray-700 px-8 py-4 text-center text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-500 dark:bg-slate-700 dark:hover:bg-slate-600 dark:focus:ring-slate-500">
                           Wellness HUB
                        </a>
                        <a href="https://hackclub.yantraiot.com/chemistry" target="_blank" class="inline-block rounded-lg border-2 border-blue-600 px-8 py-4 text-center text-lg font-semibold text-blue-600 shadow-lg transition-all duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-sky-500 dark:text-sky-500 dark:hover:bg-sky-500 dark:hover:text-dark-bg">
                           Chemistry LAB
                        </a>
                    </div>
                    </div>
            </div>
        </section>

        <section id="tracks" class="py-20 bg-gray-50 dark:bg-dark-surface">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Hackathon Tracks</h2>
                    <p class="text-lg text-gray-600 dark:text-dark-text-secondary mt-2">Choose your domain and start building the future.</p>
                </div>
                <div class="grid md:grid-cols-2 gap-10 max-w-4xl mx-auto">
                    <?php foreach ($config['tracks'] as $track): ?>
                    <div class="bg-white dark:bg-dark-bg rounded-xl border border-gray-200 dark:border-dark-border p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center justify-center h-20 w-20 rounded-full bg-blue-100 dark:bg-slate-700 mx-auto mb-6 ring-8 ring-white dark:ring-dark-bg">
                            <i data-lucide="<?php echo htmlspecialchars($track['icon']); ?>" class="h-10 w-10 text-light-primary dark:text-dark-primary"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3"><?php echo htmlspecialchars($track['title']); ?></h3>
                        <p class="text-gray-600 dark:text-dark-text-secondary"><?php echo htmlspecialchars($track['description']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="mentors" class="py-20 bg-white dark:bg-dark-bg">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Meet Our Mentors & Judges</h2>
                    <p class="text-lg text-gray-600 dark:text-dark-text-secondary mt-2">Get guidance from industry veterans and tech pioneers.</p>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($config['mentors'] as $mentor): ?>
                    <div class="text-center group">
                        <div class="relative w-48 h-48 mx-auto rounded-full overflow-hidden border-4 border-gray-200 dark:border-dark-border group-hover:border-light-primary dark:group-hover:border-dark-primary transition-all duration-300 transform group-hover:scale-110">
                            <?php if (!empty($mentor['image'])): ?>
                                <img src="<?php echo htmlspecialchars($mentor['image']); ?>" alt="<?php echo htmlspecialchars($mentor['name']); ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full bg-gray-200 dark:bg-dark-surface flex items-center justify-center">
                                    <span class="text-center text-sm font-semibold text-gray-600 dark:text-dark-text-secondary p-4"><?php echo htmlspecialchars($mentor['name']); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white"><?php echo htmlspecialchars($mentor['name']); ?></h3>
                        <p class="text-light-primary dark:text-dark-primary font-medium"><?php echo htmlspecialchars($mentor['title']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <section id="why-join" class="bg-gray-50 dark:bg-dark-surface py-20">
            <div class="container mx-auto px-6">
                 <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">The Hackathon Advantage</h2>
                    <p class="text-lg text-gray-600 dark:text-dark-text-secondary mt-2">More than just a competition, it's a launchpad for your career.</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($config['whyJoin'] as $feature): ?>
                    <div class="text-left p-6 bg-white dark:bg-dark-bg rounded-xl border border-gray-200 dark:border-dark-border hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                          <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-blue-100 dark:bg-slate-700 mb-5">
                            <i data-lucide="<?php echo htmlspecialchars($feature['icon']); ?>" class="h-6 w-6 text-light-primary dark:text-dark-primary"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2"><?php echo htmlspecialchars($feature['title']); ?></h3>
                        <p class="text-gray-600 dark:text-dark-text-secondary text-sm"><?php echo htmlspecialchars($feature['description']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="testimonials" class="py-20 bg-white dark:bg-dark-bg">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Success Stories</h2>
                    <p class="text-lg text-gray-600 dark:text-dark-text-secondary mt-2">Hear from past participants who built amazing things.</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($config['testimonials'] as $testimonial): ?>
                    <div class="bg-gray-50 dark:bg-dark-surface p-8 rounded-xl border border-gray-200 dark:border-dark-border flex flex-col">
                        <i data-lucide="quote" class="w-8 h-8 text-blue-400 dark:text-sky-500 mb-4"></i>
                        <p class="text-gray-600 dark:text-dark-text-secondary mb-6 italic flex-grow">"<?php echo htmlspecialchars($testimonial['quote']); ?>"</p>
                        <div class="flex items-center mt-auto">
                            <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-dark-bg">
                                <i data-lucide="user" class="h-6 w-6 text-light-primary dark:text-dark-primary"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 dark:text-white"><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                                <p class="text-sm text-light-primary dark:text-dark-primary font-medium"><?php echo htmlspecialchars($testimonial['role']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-slate-800 dark:bg-dark-surface text-white border-t border-slate-700 dark:border-dark-border">
        <div class="container mx-auto px-6 py-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white">Ready to build something amazing?</h2>
                <p class="text-gray-400 mt-2">Join a community of innovators and problem-solvers.</p>
                <div class="mt-6 flex flex-wrap justify-center items-center gap-4">
                    <a href="<?php echo BASE_URL; ?>login.php" class="inline-block rounded-lg bg-blue-600 px-8 py-3 text-center text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-sky-500 dark:hover:bg-sky-600 dark:focus:ring-sky-400">
                        Register
                    </a>
                    <a href="#tracks" class="inline-block rounded-lg bg-slate-700 px-8 py-3 text-center text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:bg-slate-600 focus:outline-none focus:ring-4 focus:ring-slate-500 dark:bg-dark-border dark:hover:bg-slate-600 dark:focus:ring-slate-500">
                        View Schedule
                    </a>
                    <a href="#mentors" class="inline-block rounded-lg border-2 border-sky-500 px-8 py-3 text-center text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:bg-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-400">
                        Contact Us
                    </a>
                </div>
            </div>
            <div class="mt-12 border-t border-slate-700 dark:border-dark-border pt-8 text-center text-gray-400 dark:text-dark-text-secondary">
                <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($config['companyName']); ?>. All Rights Reserved.</p>
                 <p class="text-sm mt-2">Designed with passion for future innovators.</p>
            
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        
        // Theme Toggler
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('theme-icon-sun');
        const moonIcon = document.getElementById('theme-icon-moon');
        const htmlEl = document.documentElement;

        function setTheme(theme) {
            if (theme === 'dark') {
                htmlEl.classList.add('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
                localStorage.setItem('theme', 'dark');
            } else {
                htmlEl.classList.remove('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
                localStorage.setItem('theme', 'light');
            }
        }

        themeToggle.addEventListener('click', () => {
            const currentTheme = localStorage.getItem('theme') || 'light';
            setTheme(currentTheme === 'light' ? 'dark' : 'light');
        });

        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (savedTheme) {
            setTheme(savedTheme);
        } else if (systemPrefersDark) {
            setTheme('dark');
        } else {
            setTheme('light');
        }

        // Mobile Menu
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');
        const navLinks = document.querySelectorAll('.mobile-nav-link');

        function toggleMenu() {
            const isOpen = mobileMenu.classList.contains('max-h-96');
            mobileMenu.classList.toggle('max-h-96', !isOpen);
            mobileMenu.classList.toggle('max-h-0', isOpen);
            mobileMenu.classList.toggle('pt-4', !isOpen);
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        }

        menuButton.addEventListener('click', toggleMenu);
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (mobileMenu.classList.contains('max-h-96')) {
                    toggleMenu();
                }
            });
        });
    </script>
</body>
</html>