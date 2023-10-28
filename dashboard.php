<?php
session_start();

// Check if the user is logged in.
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Code&display=swap');
        body{
            font-family: 'Fira Code', monospace;
        }
    </style>
</head>
<body>

    <section class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 my-5">
                <div class="card text-center">
                  <div class="card-body">
                    <h4 class="card-title">
                        <?php echo "Welcome, " . $_SESSION['username'] . "!<br>";  ?>
                    </h4>
                    <p class="card-text">
                        <div class="text-start">
                            <?php echo "User Email: <b>" . $_SESSION['email'] . "</b><br>";  ?>
                            <?php echo "User Name: <b>" . $_SESSION['username'] . "</b><br>";  ?>
                            <?php echo "User Role: <b>" . $_SESSION['role'] . "</b><br>";  ?>
                        </div>
                        <a class="btn btn-danger btn-sm mt-3" href='logout.php'>Logout</a>
                    </p>
                  </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
