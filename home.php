<?php 
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>manage task</h1>
    <table>
        <thead>
            <th>S.N.</th>
            <th>Task Title</th>
            <th>Task Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
             $select_query= "select *from tasks";
             $select_result= mysqli_query($conn,$select_query);
             $i=0;
             while($data_row = mysqli_fetch_array($select_result)){
               $i++;
                ?>
                 <tr>
                <td><?php echo $i; ?></td>
                <td><?php  echo $data_row['title'];?></td>
                <td><?php echo $data_row['des']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data_row['id']; ?>" type="button">edit</a>
                    
                    <a href="delete.php?id=<?php echo $data_row['id']; ?>" type="button">delete</a>
                </td>
            </tr>
                <?php
             }
            ?>
            
        </tbody>
    </table>
</body>
</html>