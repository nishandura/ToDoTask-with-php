<?php
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container col-lg-6 card bg-glass px-4 py-5 px-md-5 my-5">

        <h1 class="text-center p-2">Login To Task Management System</h1>
        <!-- when submit button is clicked -->
        <?php
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['pass']);
            $login_query = "SELECT *FROM users WHERE email='$email' AND password='$password'";
            $login_result = mysqli_query($conn, $login_query);
            $count = mysqli_num_rows($login_result);
            if ($count == 1) {
                session_start();
                $login_row = $login_result->fetch_assoc();
                $_SESSION['id'] = $login_row['id'];
                $_SESSION['email'] = $login_row['email'];
                $_SESSION['name'] = $login_row['name'];

                echo header('Location: managetask.php?msg=loginsuccessful');
            } else {
                echo "Invalid user. Please try another credentials";
            }
        }
        ?>
        <form action="#" method="post">
            <label for="">Email</label class="form-label">
            <input type="email" name="email" class="form-control">
            <br>
            <label for="">password</label class="form-label">
            <input type="password" name="pass" class="form-control"><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <p>Donot have account?<a href="register.php">Register here</a></p>
        </form>
    </div>
</body>

</html>