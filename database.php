<?php
    $db = mysqli_connect('localhost', 'root', '','to-do');
if(isset($_POST['submit']))
{
    $task = $_POST['task'];

    mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
    header('location: index.php');


}

    $task = mysqli_query($db, "SELECT * FROM tasks");



?>