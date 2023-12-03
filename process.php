<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['loginSubmit'])) {
        // Handle login form
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        // Perform login validation (you can add more sophisticated validation here)

        // Redirect to another page after successful login
        header('Location: welcome.php');
        exit;
    } elseif (isset($_POST['signupSubmit'])) {
        // Handle signup form
        $email = $_POST['signupEmail'];
        $password = $_POST['signupPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        // Perform signup validation (you can add more sophisticated validation here)
        if ($password === $confirmPassword) {
            // Store user data in the text file
            $userData = "$email:$password\n";
            file_put_contents('users.txt', $userData, FILE_APPEND);

            // Redirect to another page after successful signup
            header('Location: welcome.php');
            exit;
        } else {
            // Password and Confirm Password do not match
            header('Location: index.html');
            exit;
        }
    }
}
?>
