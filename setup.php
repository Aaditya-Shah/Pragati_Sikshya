<?php
// --- Arniko Academy :: One-Time Setup & Repair Script ---
// --- Run this file once to automatically create/update all necessary database tables and sample data. ---

@require_once 'database.php';

echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Database Setup</title>";
echo "<style>body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f0f2f5; color: #333; line-height: 1.6; padding: 20px; } .container { max-width: 800px; margin: 40px auto; padding: 30px; background: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); } h1 { color: #4f46e5; } .log { border-left: 4px solid #ddd; padding-left: 15px; margin: 20px 0; font-family: 'Courier New', Courier, monospace; font-size: 14px; } .success { color: #28a745; font-weight: bold; } .error { color: #dc3545; font-weight: bold; } .info { color: #007ACC; } a { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #4f46e5; color: #fff; text-decoration: none; border-radius: 5px; } a:hover { background-color: #4338ca; }</style>";
echo "</head><body><div class='container'><h1>Arniko Academy Database Setup</h1><div class='log'>";

try {
    // --- Force a clean slate by dropping old tables ---
    $pdo->exec("SET FOREIGN_KEY_CHECKS=0;");
    echo "Foreign key checks disabled for setup.<br>";
    $tables_to_drop = ['chat_messages', 'attendance', 'live_classes', 'test_results', 'questions', 'tests', 'plugins', 'course_enrollments', 'course_instructors', 'courses', 'batch_enrollments', 'batches', 'users'];
    foreach($tables_to_drop as $table) {
        $pdo->exec("DROP TABLE IF EXISTS `$table`;");
        echo "Table `<span class='info'>$table</span>` dropped if existed.<br>";
    }
    echo "<hr style='margin: 20px 0; border: 1px solid #eee;'>";

    // --- Table Creation Queries ---
    $sql_statements = [
        "CREATE TABLE `users` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(100) NOT NULL, `email` VARCHAR(100) NOT NULL UNIQUE, `password` VARCHAR(255) NOT NULL, `role` ENUM('Admin', 'Instructor', 'Student') NOT NULL, `avatar` VARCHAR(255) DEFAULT NULL, `status` ENUM('Active', 'Suspended') NOT NULL DEFAULT 'Active', `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `batches` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(100) NOT NULL UNIQUE, `start_year` YEAR NOT NULL, `end_year` YEAR NOT NULL, `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `batch_enrollments` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `student_id` INT NOT NULL, `batch_id` INT NOT NULL, FOREIGN KEY (`student_id`) REFERENCES `users`(`id`) ON DELETE CASCADE, FOREIGN KEY (`batch_id`) REFERENCES `batches`(`id`) ON DELETE CASCADE, UNIQUE KEY `student_batch` (`student_id`, `batch_id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `courses` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `title` VARCHAR(255) NOT NULL, `description` TEXT, `category` VARCHAR(100), `image_url` VARCHAR(255) DEFAULT NULL, `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `course_instructors` ( `course_id` INT NOT NULL, `instructor_id` INT NOT NULL, PRIMARY KEY (`course_id`, `instructor_id`), FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE, FOREIGN KEY (`instructor_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `course_enrollments` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `student_id` INT NOT NULL, `course_id` INT NOT NULL, `enrollment_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, `progress` INT DEFAULT 0, FOREIGN KEY (`student_id`) REFERENCES `users`(`id`) ON DELETE CASCADE, FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE, UNIQUE KEY `student_course` (`student_id`, `course_id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `plugins` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(100) NOT NULL, `icon` VARCHAR(50) DEFAULT 'toy-brick', `is_active` TINYINT(1) NOT NULL DEFAULT 0, `role_access` JSON, `description` TEXT ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `tests` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `course_id` INT NOT NULL, `title` VARCHAR(255) NOT NULL, `duration_minutes` INT NOT NULL DEFAULT 30, `start_time` DATETIME, `status` ENUM('Draft', 'Published') NOT NULL DEFAULT 'Draft', `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `questions` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `test_id` INT NOT NULL, `question_text` TEXT NOT NULL, `options` JSON, `correct_option` INT NOT NULL, FOREIGN KEY (`test_id`) REFERENCES `tests`(`id`) ON DELETE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `test_results` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `test_id` INT NOT NULL, `student_id` INT NOT NULL, `score` DECIMAL(5,2) NOT NULL, `answers` JSON, `submitted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (`test_id`) REFERENCES `tests`(`id`) ON DELETE CASCADE, FOREIGN KEY (`student_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `live_classes` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `course_id` INT NOT NULL, `instructor_id` INT NOT NULL, `title` VARCHAR(255) NOT NULL, `class_time` DATETIME NOT NULL, `class_type` ENUM('Zoom', 'Native') NOT NULL DEFAULT 'Zoom', `meeting_url` VARCHAR(255), `meeting_password` VARCHAR(100), `is_recorded` TINYINT(1) DEFAULT 0, `recording_url` VARCHAR(255), `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE, FOREIGN KEY (`instructor_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        "CREATE TABLE `chat_messages` ( `id` INT AUTO_INCREMENT PRIMARY KEY, `sender_id` INT NOT NULL, `receiver_id` INT NOT NULL, `message` TEXT NOT NULL, `sent_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (`sender_id`) REFERENCES `users`(`id`) ON DELETE CASCADE, FOREIGN KEY (`receiver_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
    ];

    foreach ($sql_statements as $statement) {
        $pdo->exec($statement);
        $table_name = explode('`', $statement)[1];
        echo "Table `<span class='success'>{$table_name}</span>` created successfully.<br>";
    }
    echo "<hr style='margin: 20px 0; border: 1px solid #eee;'>";
    
    $users_to_seed = [['Admin Panel', 'admin@arniko.yantraiot.com', password_hash('Onlinelearning', PASSWORD_DEFAULT), 'Admin', 'uploads/default.png'], ['K.M.', 'KM@arniko.yantraiot.com', password_hash('Calculushacker', PASSWORD_DEFAULT), 'Instructor', 'uploads/default.png'], ['A.K.Y.', 'AKY@arniko.yantraiot.com', password_hash('Chemistrygod', PASSWORD_DEFAULT), 'Instructor', 'uploads/default.png'], ['P.A.', 'PA@arniko.yantraiot.com', password_hash('Physicsinblood', PASSWORD_DEFAULT), 'Instructor', 'uploads/default.png'], ['Sample Student', 'student@example.com', password_hash('student123', PASSWORD_DEFAULT), 'Student', 'uploads/default.png']];
    $stmt_user = $pdo->prepare("INSERT INTO users (name, email, password, role, avatar) VALUES (?, ?, ?, ?, ?)");
    $user_ids = [];
    foreach ($users_to_seed as $user) {
        $stmt_user->execute($user);
        $user_ids[$user[1]] = $pdo->lastInsertId();
    }
    echo "Default users seeded.<br>";
    
    $stmt_course = $pdo->prepare("INSERT INTO courses (title, description, category, image_url) VALUES (?, ?, ?, ?)");
    $stmt_course->execute(['Pre. Engineering/Medical', 'Comprehensive preparation for engineering and medical entrance exams.', 'Entrance Preparation', 'https://placehold.co/600x400/4f46e5/ffffff?text=Arniko']);
    $course_id = $pdo->lastInsertId();
    echo "Default course 'Pre. Engineering/Medical' created.<br>";
    
    $stmt_ci = $pdo->prepare("INSERT INTO course_instructors (course_id, instructor_id) VALUES (?, ?)");
    $stmt_ci->execute([$course_id, $user_ids['KM@arniko.yantraiot.com']]);
    $stmt_ci->execute([$course_id, $user_ids['AKY@arniko.yantraiot.com']]);
    $stmt_ci->execute([$course_id, $user_ids['PA@arniko.yantraiot.com']]);
    echo "All instructors assigned to the default course.<br>";

    $stmt_enroll = $pdo->prepare("INSERT INTO course_enrollments (student_id, course_id, progress) VALUES (?, ?, ?)");
    $stmt_enroll->execute([$user_ids['student@example.com'], $course_id, 10]);
    echo "Sample student enrolled in default course.<br>";
    
    $plugins_to_seed = [['Zoom Integration', 'video', 1, '["Admin", "Instructor"]', 'Allows instructors to schedule and manage Zoom classes.'], ['Mock Tests', 'file-text', 1, '["Admin", "Instructor", "Student"]', 'Enable creation and participation in mock tests.'], ['Live Chat', 'message-square', 1, '["Admin", "Instructor", "Student"]', 'Real-time chat with other users.']];
    $stmt_plugin = $pdo->prepare("INSERT INTO plugins (name, icon, is_active, role_access, description) VALUES (?, ?, ?, ?, ?)");
    foreach ($plugins_to_seed as $plugin) $stmt_plugin->execute($plugin);
    echo "Default plugins seeded.<br>";
    
    $pdo->exec("SET FOREIGN_KEY_CHECKS=1;");
    echo "Foreign key checks re-enabled.<br>";

    echo "<p class='success'>Setup complete! You may now delete this file.</p>";
    echo "<a href='login.php'>Proceed to Login</a>";

} catch (PDOException $e) {
    @$pdo->exec("SET FOREIGN_KEY_CHECKS=1;");
    echo "<p class='error'>An error occurred: " . $e->getMessage() . "</p>";
}

echo "</div></div></body></html>";
