<?php
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
            .errorColor{color:red;}
    </style>
</head>

<body>
    <div class="container col-lg-6 card bg-glass px-4 py-5 px-md-5 my-5">
        <?php
        //  error_reporting(0);
        // if (isset($_POST['submit'])) {
        //     $fullname = $_POST['fullname'];
        //     $email = $_POST['email'];
        //     $pass = md5($_POST['pass']);
        //     $confirmpass = md5($_POST['confirmpass']);
        //     if ($fullname != "" && $email != "" && $pass != "" && $confirmpass != "") {
        //         if ($pass == $confirmpass) {
        //             $register_query = "INSERT INTO users(name,email,password) values('$fullname','$email','$pass')";
        //             $register_result = mysqli_query($conn, $register_query);
        //             if ($register_result) {
        //                 echo header('Location: index.php');
        //             } else {
        //                 echo "registered failed try again";
        //             }
        //         } else {
        //             echo "input same password as above";
        //         }
        //     } else {
        //         echo "All field are necessary";
        //     }
        // }

    $nameError = $emailError = $phnnoError =  $passwordError = $confirmpasswordError = "";
    $namErr = $emaErr = $pass = $confirmpass = $phn = "";
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass =  md5($_POST['pass']);
        $confirmpass = md5($_POST['confirmpass']);
        if ($fullname != "" && $email != "" && $pass != "" && $confirmpass != "") {
          $select_email = "SELECT * FROM users Where email='$email'";
          $select_result = mysqli_query($conn, $select_email);
          $count = mysqli_num_rows($select_result);
          if ($count == 1) 
          {
            echo '<script>alert(" already registered from this email");</script>';
          }
           else 
           {
             if ($pass == $confirmpass) 
             {

                $register_query = "INSERT INTO users(name,email,password) values('$name','$email','$pass')";
                $register_result = mysqli_query($conn, $register_query);
                if ($register_result) {
                    echo '<script>alert("Registered successfully");</script>';
                    echo header('Location: managetask.php');
                } else {
                    echo '<script>alert("Registerd failed: Try again ");</script>';
                }
             } 
             else 
             {
                echo '<script>alert("password and confirm password must be same.");</script>';
                // echo "input same password as above";
             }
            }
        }
        else
        {
         // echo '<script>alert("Input the all fields in form ");</script>';
         if (empty($name)) {
            $nameError = "* Name is mandatory";
            }
         if (empty($email)) {
            $emailError = "* Email is madatory";
            }
         if (empty($phnno)) {
            $phnnoError = "* Phone number is mandatory";
           }
         if (empty($password)) {
            $passwordError = "* Password is mandatory";
            }
         if (empty($confirmpassword)) {
            $confirmpasswordError = "* Confirm password is mandatory";
           }
        }
    }
        ?>
        <h1>Register To Task Management System</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for=""  class="form-label">Name</label>
            <input type="text" name="fullname" class="form-control">
            <span class="errorColor"><?php echo $nameError; ?></span>
            <br>
            <label for=""  class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
            <span class="errorColor"><?php echo $emailError; ?></span>
            <br>
            <label for=""  class="form-label">password</label>
            <input type="password" name="pass" class="form-control">
            <span class="errorColor"><?php echo  $passwordError; ?></span>
            <br>
            <label for=""  class="form-label">confirm password</label>
            <input type="password" name="confirmpass" class="form-control"><br>
            <span class="errorColor"><?php echo $confirmpasswordError; ?></span>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <p>Have account?<a href="index.php">Login here</a></p>
        </form>
    </div>
</body>

</html>