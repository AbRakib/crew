<?php
session_start();
if(isset($_SESSION['username'])) {
    header('Location: dashboard.php');
}

$errorMessage = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Load user data from the JSON file.
    $json = file_get_contents('./data/user.json');
    $users = json_decode($json, true);

    echo "<pre>";
    echo count($users);
    echo "</pre>";

    for ($i=0; $i < count($users); $i++) { 
        // Check if the user exists and the password is correct.
        foreach ($users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                // Authentication successful.
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: dashboard.php');
                exit();
            }
        }
    }

    // Authentication failed.
    $errorMessage = "Invalid username or password.";
    $_SESSION['error'] = $errorMessage;
    header('Location: index.php');
}
?>
