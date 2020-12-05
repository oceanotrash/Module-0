<?php
    $error ="";

    $db = mysqli_connect('localhost', 'root', '','to-do');
if(isset($_POST['submit']))
{
    $task = $_POST['task'];
    if (empty($task))
    {
      $error = "Please Fill the blank Before you press Add Task.";
    }
    else
    {
      mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
      header('location: index.php');
    }

}
    if (isset($_GET['del_task']))
    {
    $id = $_GET['del_task'];
    mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
    header('location: index.php');
    }
    $task = mysqli_query($db, "SELECT * FROM tasks");

?> 

<!DOCTYPE html>
<html>
  <head>
    <title>To-do-list</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
    <body>

<div class="heading">
  <h2>CRUD, to-do-list application</h2>
</div>



<form method="POST" action="index.php">
  <?php if (isset($error)) {?>
    <p><?php echo $error; ?></p>
    <?php } ?>


  <input type="text" name = "task" class="task_input">
  <button type="submit" class="btn btn-primary" name="submit">Add Task</button>
</form>

<table>
  <thead>

    <tr>

      <th>N</th>
      <th>Task</th>
      <th>Action</th>

    </tr>
  </thead>

  <tbody>

    <?php $i =1; while ($row = mysqli_fetch_array($task)){ ?>
      <tr>
      <td><?php echo $i; ?></td>
         <td class ="task"><?php echo $row['task']?></td>
         <td class="btn btn-danger">
         <a href="index.php?del_task=<?php echo $row['id']; ?>">x</a>
       </td>
    </tr>

   <?php $i++;} ?>
    
   

  </tbody>

</table>

    </body>
</html>