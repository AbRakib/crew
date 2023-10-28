<?php 
    session_start();
    if( isset($_SESSION['username']) ) {
        header('Location: dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Code&display=swap');
        body{
            font-family: 'Fira Code', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row my-5 py-5">
            <div class="text-center text-danger">
                <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        $_SESSION['error'] = "";
                    }
                ?>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h4 class="text-center">Login Form</h4>
                <div class="card p-3">
                    <form action="login.php" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="email" class="form-label">User Name</label>
                            <input name="email" type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="text-end">
                            <button name="submit" type="submit" class="btn btn-primary btn-sm">Login</button>
                        </div>
                        <div class="text-center small">
                            If you have no account! Please 
                            <a href="register.php">registration here</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>