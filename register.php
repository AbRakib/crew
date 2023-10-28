<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Read existing user data from JSON file
        $userData = [];
        $jsonFile = './data/user.json';
        if (file_exists($jsonFile)) {
            $userData = json_decode(file_get_contents($jsonFile), true);
        }
        // Get user input
        $username   = trim($_POST['username']);
        $email      = trim($_POST['email']);
        $password   = trim($_POST['password']);
        $role       = "user";
        // Check if the username is already taken
        foreach ($userData as $user) {
            if ($user['username'] === $username && $user['email'] === $email) {
                echo "Username already exists. Please choose a different one.";
                exit;
            }
        }
        // Add the user to the array
        $newUser = [
            'username'  => $username,
            'email'     => $email,
            'password'  => $password,
            'role'      => $role
        ];
        $userData[] = $newUser;
        // Save the updated user data to the JSON file
        file_put_contents($jsonFile, json_encode($userData));
        echo "Registration successful. You can now log in.";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Code&display=swap');
        body{
            font-family: 'Fira Code', monospace;
        }
    </style>
</head>
    <section class="container">
        <div class="row my-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h3 class="text-center">User Registration</h3>
                    <form action="register.php" method="post">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" required>

                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required>

                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required><br>

                        <div class="text-end">
                            <input class="btn btn-sm btn-primary" type="submit" value="Register">
                        </div>
                        <div class="text-center small">
                            If you have already account! Please 
                            <a href="index.php">sign up here</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
</body>
</html>
