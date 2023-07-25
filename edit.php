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
    <title>Edit Task</title>
     <!-- Latest compiled and minified CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Latest compiled JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container col-lg-6 card bg-glass px-4 py-5 px-md-5 my-5">
    <h1 class="text-center">Edit Task</h1>

    <!-- <?php
    // if(isset($_GET['id'])){
    //     $id = $_GET['id'];
    //     $select_query = "select *from tasks where id =$id ";
    //     // echo $select_query;
    //     $select_result = mysqli_query($conn,$select_query);
    //     $select_row = $select_result->fetch_assoc();
    //     $select_title = $select_row['title'];
    //     $select_des = $select_row['des'];
    // }
    // ?>
    // <?php
    
    //  if(isset($_POST['submit'])){
    //     $title = $_POST['title'];
    //     $des = $_POST['des'];

    //     $update_query = "update tasks set title='$title', des='$des' where id=$id";
    //     $update_result = mysqli_query($conn,$update_query);
    //  }
    ?> -->
      <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select_query = "select *from tasks where id =$id ";
        // echo $select_query;
        $select_result = mysqli_query($conn,$select_query);
        $select_row = $select_result->fetch_assoc();
        $select_title = $select_row['title'];
        $select_des = $select_row['des'];
    }
    ?>
    <?php
    
     if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $des = $_POST['des'];

        $update_query = "update tasks set title='$title', des='$des' where id=$id";
        $update_result = mysqli_query($conn,$update_query);
        if($update_result){
            echo header('Location: managetask.php');
        }
        else{
            echo "task failed to update";
        }
     }
    ?>
    <form action="#" method="post">
        <label for="" class="form-label">Title</label>
        <input type="text" name="title" value="<?php echo $select_title; ?>"  class="form-control">
        <label for="" class="form-label">Descripton</label>
        <input type="textarea" name="des" value="<?php echo  $select_des; ?>"  class="form-control">
        <button type="submit" class="btn-sm btn-primary m-2" name="submit">Submit</button>
        <a href="managetask.php" class="btn btn-sm btn-primary">Manage Task</a>
    </form>
</div>
</body>
</html>