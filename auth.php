<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';

// Check for "Remember Me" cookie on every page load
if (isset($_COOKIE['remember_me']) && !isset($_SESSION['loggedin'])) {
    $token = $_COOKIE['remember_me'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE remember_token = ? AND status = 'Active'");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_avatar'] = $user['avatar'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember_me = isset($_POST['remember_me']);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND status = 'Active'");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_avatar'] = $user['avatar'];

            if ($remember_me) {
                $token = bin2hex(random_bytes(32));
                $stmt_token = $pdo->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
                $stmt_token->execute([$token, $user['id']]);
                setcookie('remember_me', $token, time() + (86400 * 30), "/");
            }

            redirect_to_dashboard($user['role']);
        } else {
            header("Location: login.php?error=invalid_credentials");
            exit;
        }
    }
    if ($_POST['action'] === 'register') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'] ?? 'Student';

        if (empty($name) || empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: login.php?error=invalid_input");
            exit;
        }
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            header("Location: login.php?error=email_exists");
            exit;
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $avatar = 'uploads/default.png';
        
        $stmt_user = $pdo->prepare("INSERT INTO users (name, email, password, role, avatar) VALUES (?, ?, ?, ?, ?)");
        if ($stmt_user->execute([$name, $email, $hashed_password, $role, $avatar])) {
            $new_user_id = $pdo->lastInsertId();
            
            if ($role === 'Student') {
                $stmt_course = $pdo->query("SELECT id FROM courses ORDER BY id ASC LIMIT 1");
                $default_course = $stmt_course->fetch();
                if ($default_course) {
                    $course_id = $default_course['id'];
                    $stmt_enroll = $pdo->prepare("INSERT INTO course_enrollments (student_id, course_id) VALUES (?, ?)");
                    $stmt_enroll->execute([$new_user_id, $course_id]);
                }
            }

            header("Location: login.php?success=registered");
            exit;
        } else {
            header("Location: login.php?error=registration_failed");
            exit;
        }
    }
    if ($_POST['action'] === 'logout') {
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL . "login.php");
        exit;
    }
}

function redirect_to_dashboard($role) {
    header("Location: " . BASE_URL . strtolower($role) . "/");
    exit;
}
function require_login($allowed_roles = []) {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: " . BASE_URL . "login.php");
        exit;
    }
    if (!empty($allowed_roles) && !in_array($_SESSION['user_role'], $allowed_roles)) {
        redirect_to_dashboard($_SESSION['user_role']);
    }
}
function redirect_if_logged_in() {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        redirect_to_dashboard($_SESSION['user_role']);
    }
}
?>
