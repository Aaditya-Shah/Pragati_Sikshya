<?php
// --- DATABASE & SITE CONSTANTS ---
define('DB_HOST', 'localhost');
define('DB_NAME', 'u443217448_Hackclub');
define('DB_USER', 'u443217448_Hackclub');
define('DB_PASS', 'U443217448_Hackclub');
define('SITE_NAME', 'Pragati Sikshya');
// IMPORTANT: Make sure this ends with a forward slash /
define('BASE_URL', 'https://hackclub.yantraiot.com/');

// --- NOTE: The dummy user and plugin arrays have been removed. ---
// --- All data is now intended to be fetched from the database via database.php ---



// --- Main Site Configuration Array ---
$config = [
    'baseUrl' => BASE_URL,
    'academyName' => SITE_NAME,
    'navLinks' => [
        ['title' => "Courses", 'href' => "#courses"],
        ['title' => "About Us", 'href' => "#about"],
        ['title' => "Testimonials", 'href' => "#testimonials"],
        ['title' => "Contact", 'href' => "#contact"],
    ],
    'hero' => [
        'title' => "Unlock Your Potential with " . SITE_NAME,
        'subtitle' => "Join thousands of learners in mastering new skills, advancing your career, and exploring your passions with our expert-led online courses.",
        'ctaButton' => "Explore Courses",
    ],
    'features' => [
        ['icon' => 'book-open', 'title' => "Expert-Led Courses", 'description' => "Learn from industry leaders and certified professionals."],
        ['icon' => 'monitor-play', 'title' => "Flexible Learning", 'description' => "Access your courses anytime, anywhere, on any device."],
        ['icon' => 'users', 'title' => "Vibrant Community", 'description' => "Connect with fellow learners and collaborate on projects."],
    ],
    'courses' => [ // This remains as static content for the landing page for now.
        ['title' => "Full-Stack Web Development", 'description' => "Master front-end and back-end technologies.", 'image' => "https://placehold.co/600x400/3b82f6/ffffff?text=Web+Dev", 'category' => "Development", 'duration' => "12 Weeks", 'rating' => 4.8],
        ['title' => "Advanced Data Science", 'description' => "Dive deep into machine learning and data visualization.", 'image' => "https://placehold.co/600x400/10b981/ffffff?text=Data+Science", 'category' => "Data Science", 'duration' => "16 Weeks", 'rating' => 4.9],
        ['title' => "UI/UX Design Fundamentals", 'description' => "Learn the principles of user-centric design.", 'image' => "https://placehold.co/600x400/8b5cf6/ffffff?text=UI/UX+Design", 'category' => "Design", 'duration' => "8 Weeks", 'rating' => 4.7],
        ['title' => "Digital Marketing Mastery", 'description' => "Understand SEO, SEM, and content marketing.", 'image' => "https://placehold.co/600x400/f59e0b/ffffff?text=Marketing", 'category' => "Marketing", 'duration' => "10 Weeks", 'rating' => 4.8],
    ],
    'testimonials' => [ // This remains as static content for the landing page.
        ['name' => "Sarah Johnson", 'role' => "Web Developer", 'quote' => "The Full-Stack course at " . SITE_NAME . " was a game-changer for my career.", 'avatar' => "https://i.pravatar.cc/150?u=a042581f4e29026704d"],
        ['name' => "Michael Chen", 'role' => "Data Analyst", 'quote' => "I was able to transition into a data science role thanks to the comprehensive curriculum.", 'avatar' => "https://i.pravatar.cc/150?u=a042581f4e29026704e"],
        ['name' => "Emily Rodriguez", 'role' => "UX Designer", 'quote' => "The UI/UX fundamentals course provided me with the strong foundation I needed.", 'avatar' => "https://i.pravatar.cc/150?u=a042581f4e29026704f"],
    ],
    'footer' => [
        'about' => "is dedicated to providing high-quality, accessible education for everyone.",
        'copyright' => "© " . date("Y") . " " . SITE_NAME . ". All Rights Reserved."
    ]
];
?>
