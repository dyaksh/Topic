<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signupSubmit'])) {
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password === $confirmPassword) {
        // Store user data in the text file
        $userData = "$email:$password\n";
        file_put_contents('users.txt', $userData, FILE_APPEND);

        // Redirect to login page after successful signup
        echo '<script>alert("Signup successful! Please login."); window.location.href = "login.html";</script>';
        exit;
    } else {
        // Password and Confirm Password do not match
        echo '<script>alert("Password and Confirm Password do not match."); window.location.href ="login.html";</script>';
        exit;
    }
}
?>
