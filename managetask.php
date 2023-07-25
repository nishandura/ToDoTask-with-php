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
    <!-- Boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container col-lg-6 card bg-glass px-4 py-5 px-md-5 my-5">
        <table  class="table table-bordered table-striped">
            <h3 class="text-center">Manage Task</h3>
            <p class="text-center">You are login as <?php echo $_SESSION['email']; ?></p>
            <a href="logout.php" class="btn btn-sm btn-primary m-2">logout</a>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>tasktitle</th>
                    <th>taskdescription</th>
                    <th>Action</th>
                </tr>

            </thead>
            <?php
            $select_query = "select *from tasks";
            $select_result = mysqli_query($conn, $select_query);
            $i = 0;
            while ($data_row = mysqli_fetch_array($select_result)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data_row['title']; ?></td>
                    <td><?php echo $data_row['des']; ?></td>
                    <td><a  class="btn btn-sm btn-primary"href="edit.php?id=<?php echo $data_row['id']; ?>">Edit</a> &nbsp;<a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $data_row['id']; ?>">delete</a></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="create.php" class="btn btn-sm btn-primary">Create Task</a>
    </div>
</body>

</html>