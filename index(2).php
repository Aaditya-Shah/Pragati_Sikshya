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
                            bg: '#0D1117',      // Darker Background (GitHub Dark)
                            surface: '#161B22', // Card Surface
                            border: '#30363D',  // Border
                            text: '#E6EDF3',    // Light Text
                            'text-secondary': '#A8B3CF', // Secondary Text
                            primary: '#38BDF8', // Light Blue 400 (Accent)
                            'primary-hover': '#0EA5E9'  // Sky 500 (Hover)
                        },
                        light: { 
                            primary: '#2563EB', // Blue 600 (Accent)
                            'primary-hover': '#1D4ED8' // Blue 700 (Hover)
                        }
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-20px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        }
                    },
                    animation: {
                        fadeInUp: 'fadeInUp 0.6s ease-out forwards',
                        slideInLeft: 'slideInLeft 0.5s ease-out forwards',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        #mobile-menu { transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .hero-gradient-text {
            background: linear-gradient(to right, #2563EB, #4F46E5); /* Light Mode Gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .dark .hero-gradient-text {
             background: linear-gradient(to right, #38BDF8, #818CF8); /* Dark Mode Gradient */
            -webkit-background-clip: text;
        }
        .reveal-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .reveal-item.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-dark-bg text-gray-800 dark:text-dark-text transition-colors duration-500">

    <header class="bg-white/95 dark:bg-dark-bg/95 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200 dark:border-dark-border shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="<?php echo BASE_URL; ?>" class="flex items-center space-x-3 transition-transform duration-300 hover:scale-[1.02]">
                    <img src="/uploads/logo.png" alt="<?php echo htmlspecialchars($config['companyName']); ?> Logo" class="h-10 w-auto rounded-full shadow-lg">
                    <span class="text-xl font-extrabold text-gray-900 dark:text-white whitespace-nowrap tracking-wider"><?php echo htmlspecialchars($config['companyName']); ?></span>
                </a>
                
                <div class="flex items-center space-x-4">
                    <nav class="hidden md:flex items-center space-x-6">
                        <?php foreach ($config['navLinks'] as $link): ?>
                            <a href="<?php echo htmlspecialchars($link['href']); ?>" class="relative text-gray-600 dark:text-dark-text-secondary hover:text-light-primary dark:hover:text-dark-primary transition-colors duration-300 font-medium group py-1">
                                <?php echo htmlspecialchars($link['title']); ?>
                                <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-light-primary dark:bg-dark-primary transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        <?php endforeach; ?>
                    </nav>

                    <button id="theme-toggle" class="p-2 rounded-full text-gray-600 dark:text-dark-text-secondary hover:bg-gray-200 dark:hover:bg-dark-surface transition-colors duration-300 transform hover:scale-110">
                        <i data-lucide="sun" class="h-5 w-5 hidden" id="theme-icon-sun"></i>
                        <i data-lucide="moon" class="h-5 w-5 hidden" id="theme-icon-moon"></i>
                    </button>
                    
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <a href="<?php echo BASE_URL . strtolower($_SESSION['user_role']); ?>/" class="hidden md:inline-block rounded-full bg-light-primary px-5 py-2 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:bg-light-primary-hover dark:bg-dark-primary dark:hover:bg-dark-primary-hover hover:-translate-y-0.5 transform focus:ring-4 focus:ring-blue-300 dark:focus:ring-sky-400">
                            Dashboard
                        </a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>login.php" class="hidden md:inline-block rounded-full bg-light-primary px-5 py-2 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:bg-light-primary-hover dark:bg-dark-primary dark:hover:bg-dark-primary-hover hover:-translate-y-0.5 transform focus:ring-4 focus:ring-blue-300 dark:focus:ring-sky-400">
                            Login / Register
                        </a>
                    <?php endif; ?>

                    <div class="md:hidden">
                        <button id="menu-button" class="text-gray-700 dark:text-dark-text-secondary focus:outline-none p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-dark-surface transition-colors duration-300">
                            <i data-lucide="menu" id="menu-open-icon" class="h-6 w-6"></i>
                            <i data-lucide="x" id="menu-close-icon" class="h-6 w-6 hidden"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden overflow-hidden max-h-0">
                <nav class="flex flex-col space-y-3 pt-4 pb-2">
                    <?php foreach ($config['navLinks'] as $link): ?>
                        <a href="<?php echo htmlspecialchars($link['href']); ?>" class="mobile-nav-link text-gray-600 dark:text-dark-text-secondary hover:text-light-primary dark:hover:text-dark-primary transition-colors duration-300 font-medium text-center py-3 rounded-xl bg-gray-100 dark:bg-dark-surface hover:shadow-md">
                            <?php echo htmlspecialchars($link['title']); ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <a href="<?php echo BASE_URL . strtolower($_SESSION['user_role']); ?>/" class="mobile-nav-link block w-full text-center rounded-xl bg-light-primary px-5 py-3 font-semibold text-white shadow-lg mt-3 transition-colors duration-300 hover:bg-light-primary-hover dark:bg-dark-primary dark:hover:bg-dark-primary-hover">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>login.php" class="mobile-nav-link block w-full text-center rounded-xl bg-light-primary px-5 py-3 font-semibold text-white shadow-lg mt-3 transition-colors duration-300 hover:bg-light-primary-hover dark:bg-dark-primary dark:hover:bg-dark-primary-hover">Login / Register</a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section id="hero" class="bg-white dark:bg-dark-bg py-24 md:py-36 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 dark:opacity-20 pointer-events-none" style="background-image: radial-gradient(#e5e7eb 1px, transparent 1px); background-size: 20px 20px;"></div>

            <div class="container mx-auto px-6 text-center relative z-10">
                <div class="max-w-4xl mx-auto">
                    <p class="font-bold text-light-primary dark:text-dark-primary mb-3 tracking-widest animate-slideInLeft" style="animation-delay: 0.1s;"><?php echo htmlspecialchars($config['hero']['tagline']); ?></p>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 dark:text-white mb-6 leading-tight animate-fadeInUp" style="animation-delay: 0.2s;">
                        <span class="hero-gradient-text"><?php echo htmlspecialchars($config['hero']['title']); ?></span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-600 dark:text-dark-text-secondary mb-12 animate-fadeInUp" style="animation-delay: 0.4s;"><?php echo htmlspecialchars($config['hero']['subtitle']); ?></p>
                    
                    <div class="flex flex-wrap justify-center items-center gap-4 animate-fadeInUp" style="animation-delay: 0.6s;">
                        <a href="<?php echo BASE_URL; ?>login.php" class="inline-block rounded-full bg-blue-600 dark:bg-sky-500 px-10 py-4 text-center text-xl font-bold text-white shadow-xl transition-all duration-300 hover:scale-[1.05] hover:bg-blue-700 dark:hover:bg-sky-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-sky-400">
                            <?php echo htmlspecialchars($config['hero']['ctaButton']); ?> &nbsp; <i data-lucide="chevron-right" class="inline h-6 w-6 transition-transform group-hover:translate-x-1"></i>
                        </a>
                        <a href="https://hackclub.yantraiot.com/wellnesshub" target="_blank" class="inline-block rounded-full bg-gray-700 dark:bg-slate-700 px-8 py-4 text-center text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:bg-gray-600 dark:hover:bg-slate-600 transform hover:scale-[1.02]">
                            Wellness HUB
                        </a>
                        <a href="https://hackclub.yantraiot.com/chemistry" target="_blank" class="inline-block rounded-full border-2 border-blue-600 dark:border-sky-500 px-8 py-4 text-center text-lg font-semibold text-blue-600 dark:text-sky-500 transition-all duration-300 hover:bg-blue-600 hover:text-white dark:hover:bg-sky-500 dark:hover:text-dark-bg transform hover:scale-[1.02]">
                            Chemistry LAB
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        <hr class="border-gray-200 dark:border-dark-border">

        <section id="tracks" class="py-20 lg:py-28 bg-gray-50 dark:bg-dark-surface">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16 reveal-item">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">Hackathon Tracks</h2>
                    <p class="text-xl text-gray-600 dark:text-dark-text-secondary mt-4">Choose your domain and start building the future.</p>
                </div>
                <div class="grid md:grid-cols-2 gap-10 max-w-5xl mx-auto">
                    <?php foreach ($config['tracks'] as $index => $track): ?>
                    <div class="bg-white dark:bg-dark-bg rounded-2xl shadow-xl border border-gray-200 dark:border-dark-border p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group reveal-item" style="animation-delay: <?php echo 0.2 * $index + 0.1; ?>s;">
                        <div class="flex items-center justify-center h-24 w-24 rounded-full bg-blue-100 dark:bg-slate-700 mx-auto mb-6 ring-8 ring-blue-50 dark:ring-dark-surface group-hover:ring-blue-200 dark:group-hover:ring-slate-600 transition-all duration-300">
                            <i data-lucide="<?php echo htmlspecialchars($track['icon']); ?>" class="h-12 w-12 text-light-primary dark:text-dark-primary transition-transform duration-300 group-hover:scale-110"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-3"><?php echo htmlspecialchars($track['title']); ?></h3>
                        <p class="text-gray-600 dark:text-dark-text-secondary"><?php echo htmlspecialchars($track['description']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <hr class="border-gray-200 dark:border-dark-border">

        <section id="mentors" class="py-20 lg:py-28 bg-white dark:bg-dark-bg">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16 reveal-item">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">Meet Our Mentors & Judges</h2>
                    <p class="text-xl text-gray-600 dark:text-dark-text-secondary mt-4">Get guidance from industry veterans and tech pioneers.</p>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">
                    <?php foreach ($config['mentors'] as $index => $mentor): ?>
                    <div class="text-center group p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-dark-surface transition-all duration-300 reveal-item" style="animation-delay: <?php echo 0.1 * $index + 0.1; ?>s;">
                        <div class="relative w-40 h-40 mx-auto rounded-full overflow-hidden border-4 border-light-primary/50 dark:border-dark-primary/50 group-hover:border-light-primary dark:group-hover:border-dark-primary transition-all duration-500 transform group-hover:scale-105 shadow-xl">
                            <?php if (!empty($mentor['image'])): ?>
                                <img src="<?php echo htmlspecialchars($mentor['image']); ?>" alt="<?php echo htmlspecialchars($mentor['name']); ?>" class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-90">
                            <?php else: ?>
                                <div class="w-full h-full bg-gray-200 dark:bg-slate-700 flex flex-col items-center justify-center p-3">
                                    <i data-lucide="user-square" class="h-10 w-10 text-gray-500 dark:text-gray-400 mb-2"></i>
                                    <span class="text-center text-sm font-semibold text-gray-600 dark:text-dark-text-secondary"><?php echo htmlspecialchars($mentor['name']); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white transition-colors duration-300 group-hover:text-light-primary dark:group-hover:text-dark-primary"><?php echo htmlspecialchars($mentor['name']); ?></h3>
                        <p class="text-sm text-gray-500 dark:text-dark-text-secondary font-medium mt-1 italic"><?php echo htmlspecialchars($mentor['title']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <hr class="border-gray-200 dark:border-dark-border">
        
        <section id="why-join" class="bg-gray-50 dark:bg-dark-surface py-20 lg:py-28">
            <div class="container mx-auto px-6">
                 <div class="text-center mb-16 reveal-item">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">The Hackathon Advantage</h2>
                    <p class="text-xl text-gray-600 dark:text-dark-text-secondary mt-4">More than just a competition, it's a launchpad for your career.</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($config['whyJoin'] as $index => $feature): ?>
                    <div class="text-left p-6 bg-white dark:bg-dark-bg rounded-2xl shadow-lg border border-gray-200 dark:border-dark-border hover:shadow-2xl hover:border-light-primary dark:hover:border-dark-primary transition-all duration-500 transform hover:-translate-y-1 reveal-item" style="animation-delay: <?php echo 0.15 * $index + 0.1; ?>s;">
                          <div class="flex items-center justify-center h-14 w-14 rounded-xl bg-blue-100 dark:bg-slate-700 mb-5 shadow-inner">
                            <i data-lucide="<?php echo htmlspecialchars($feature['icon']); ?>" class="h-7 w-7 text-light-primary dark:text-dark-primary animate-pulseHeart-slow"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2"><?php echo htmlspecialchars($feature['title']); ?></h3>
                        <p class="text-gray-600 dark:text-dark-text-secondary text-sm"><?php echo htmlspecialchars($feature['description']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <hr class="border-gray-200 dark:border-dark-border">

        <section id="testimonials" class="py-20 lg:py-28 bg-white dark:bg-dark-bg">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16 reveal-item">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">Success Stories</h2>
                    <p class="text-xl text-gray-600 dark:text-dark-text-secondary mt-4">Hear from past participants who built amazing things.</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($config['testimonials'] as $index => $testimonial): ?>
                    <div class="bg-gray-50 dark:bg-dark-surface p-8 rounded-2xl shadow-xl border-t-4 border-light-primary dark:border-dark-primary flex flex-col transition-all duration-500 transform hover:shadow-2xl reveal-item" style="animation-delay: <?php echo 0.15 * $index + 0.1; ?>s;">
                        <i data-lucide="quote" class="w-8 h-8 text-blue-400 dark:text-sky-500 mb-4 transform rotate-180"></i>
                        <p class="text-gray-700 dark:text-dark-text-secondary mb-6 italic flex-grow text-lg leading-relaxed">"<?php echo htmlspecialchars($testimonial['quote']); ?>"</p>
                        <div class="flex items-center mt-auto border-t pt-4 border-gray-200 dark:border-dark-border">
                            <div class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-full bg-blue-100 dark:bg-dark-bg ring-2 ring-light-primary/50 dark:ring-dark-primary/50">
                                <i data-lucide="user" class="h-7 w-7 text-light-primary dark:text-dark-primary"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-lg text-gray-900 dark:text-white"><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                                <p class="text-sm text-light-primary dark:text-dark-primary font-medium"><?php echo htmlspecialchars($testimonial['role']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <a id="floating-cta" href="<?php echo BASE_URL; ?>login.php" class="fixed bottom-6 right-6 lg:bottom-10 lg:right-10 rounded-full bg-red-600 dark:bg-red-500 px-6 py-3 text-center text-lg font-bold text-white shadow-2xl z-40 transition-all duration-300 hover:bg-red-700 dark:hover:bg-red-600 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-400 opacity-0 hidden">
            <i data-lucide="zap" class="inline h-5 w-5 mr-2"></i> Register Now!
        </a>
        
    </main>

    <footer class="bg-slate-900 dark:bg-dark-surface text-white border-t border-slate-700 dark:border-dark-border">
        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white">Ready to build something amazing?</h2>
                <p class="text-gray-400 mt-4 text-lg">Join a community of innovators and problem-solvers. Your journey starts now.</p>
                <div class="mt-8 flex flex-wrap justify-center items-center gap-4">
                    <a href="<?php echo BASE_URL; ?>login.php" class="inline-block rounded-full bg-blue-600 dark:bg-sky-500 px-8 py-3 text-center text-lg font-bold text-white shadow-xl transition-all duration-300 hover:scale-[1.05] hover:bg-blue-700 dark:hover:bg-sky-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-sky-400">
                        <i data-lucide="send" class="inline h-5 w-5 mr-2"></i> Register Today
                    </a>
                    <a href="/planner" class="inline-block rounded-full border-2 border-slate-500 px-8 py-3 text-center text-lg font-semibold text-gray-300 transition-all duration-300 hover:bg-slate-700 dark:hover:bg-slate-600 hover:text-white transform hover:scale-[1.02]">
                        Day Planner
                    </a>
                    <a href="#mentors" class="inline-block rounded-full border-2 border-sky-500 px-8 py-3 text-center text-lg font-semibold text-sky-400 transition-all duration-300 hover:bg-sky-500 hover:text-white transform hover:scale-[1.02]">
                        Contact Us
                    </a>
                </div>
            </div>
            <div class="mt-12 border-t border-slate-700 dark:border-dark-border pt-8 text-center text-gray-400 dark:text-dark-text-secondary">
                <p class="text-sm">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($config['companyName']); ?>. All Rights Reserved.</p>
                <p class="text-xs mt-2 italic">Designed with passion for future innovators using Tailwind CSS and Lucide Icons.</p>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        
        // --- Theme Toggler ---
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

        // Initialize theme
        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (savedTheme) {
            setTheme(savedTheme);
        } else if (systemPrefersDark) {
            setTheme('dark');
        } else {
            setTheme('light');
        }

        // --- Mobile Menu ---
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');
        const navLinks = document.querySelectorAll('.mobile-nav-link');

        function toggleMenu() {
            const isOpen = mobileMenu.classList.contains('max-h-[30rem]'); // Increased max-height for content
            mobileMenu.classList.toggle('max-h-[30rem]', !isOpen);
            mobileMenu.classList.toggle('max-h-0', isOpen);
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        }

        menuButton.addEventListener('click', toggleMenu);
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (mobileMenu.classList.contains('max-h-[30rem]')) {
                    toggleMenu();
                }
            });
        });
        
        // --- Scroll Reveal Animation ---
        const revealItems = document.querySelectorAll('.reveal-item');
        
        const observerOptions = {
            root: null, // viewport
            rootMargin: '0px',
            threshold: 0.1 // visibility percentage
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        revealItems.forEach(item => {
            observer.observe(item);
        });
        
        // --- Floating CTA Visibility ---
        const floatingCta = document.getElementById('floating-cta');
        const heroSection = document.getElementById('hero');

        const ctaObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                // If hero section is visible, hide CTA. If it leaves the view, show CTA.
                if (entry.isIntersecting) {
                    floatingCta.classList.add('hidden');
                    floatingCta.classList.remove('opacity-100');
                    floatingCta.classList.add('opacity-0');
                } else {
                    floatingCta.classList.remove('hidden');
                    // Add a small delay for a smooth fade-in
                    setTimeout(() => {
                        floatingCta.classList.add('opacity-100');
                        floatingCta.classList.remove('opacity-0');
                    }, 100);
                }
            });
        }, { threshold: 0.1 }); // Show when less than 10% of hero is visible

        // Ensure the button is visible on page load if not at the top
        if (heroSection) {
            ctaObserver.observe(heroSection);
        }
        
    </script>
</body>
</html>