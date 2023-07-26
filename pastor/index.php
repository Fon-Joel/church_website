<?php
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['pastor']) && $_SESSION['pastor'] === true) {
    // Redirect the admin to the index.php page
    header("Location: index.php");
    exit;
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication logic here (e.g., check against database records)
    // Replace the following with your own authentication logic
    if ($username === 'Pastor' && $password === 'Pastor') {
        // Authentication successful, set admin session variable
        $_SESSION['pastor'] = true;

        // Redirect the admin to the index.php page
        header("Location: /index.php");
        exit;
    } else {
        // Authentication failed, show error message
        $errorMessage = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link type="text/css" href="/style.css" rel="stylesheet">
</head>
<body> <div class="admin-form">
    <h2>Admin Login</h2>
    <?php if (isset($errorMessage)) : ?>
        <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <div>
</body>
</html>
