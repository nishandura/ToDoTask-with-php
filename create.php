<?php
require('config.php');
session_start();
require('secureuser.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container col-lg-6 card bg-glass px-4 py-5 px-md-5 my-5">
    <h1 class="text-center">Create Task</h1>
        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $des = $_POST['des'];
            // echo $title;
            // echo $des;

            $insert_query = "INSERT INTO tasks(title,des) values('$title','$des')";
            // echo $insert_query;
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {
                // echo" task suceesful";
            } else {
                echo "task unsuccesful";
            }
        }
        ?>
        <form action="#" method="post">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title"  class="form-control">
            <label for="" class="form-label">Descripton</label>
            <input type="textarea" name="des"  class="form-control">
            <button type="submit"  class="btn-sm btn-primary m-2" name="submit">Submit</button>
        </form>
        <a href="managetask.php" class="btn btn-sm btn-primary">Manage Task</a>
    </div>
</body>

</html>