<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginSubmit'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // Read user credentials from the text file
    $lines = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($storedEmail, $storedPassword) = explode(':', $line);
        if ($email === $storedEmail && $password === $storedPassword) {
            // Login successful
            session_start();
            $_SESSION['user_email'] = $email;  // Store user's email in the session
            echo '<script>alert("Login successful!"); window.location.href = "home.php";</script>';
            exit;
        }
    }

    // Login failed
    echo '<script>alert("Login failed. Please check your email and password."); window.location.href = "index.html";</script>';
    exit;
}
?>
