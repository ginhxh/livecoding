<?php
include_once 'config.php';
include_once 'todo.class.php';

$task =new tasks();

if(isset($_POST['task_submit'])){
    $task_content = $_POST['task_content']; 
    $task->setTask_content($task_content);
    if($task->add()){
        header("location: index.php?inserted"); 
    }else{
        header("location: index.php?failure");
    }


}

if(isset($_POST['delete_btn'])){
    $taskId = $_POST['delete_btn'];
    $task->setId($taskId);
    if($task->remove())
    {
        header("Location: index.php?completed"); 
    }
    else
    {
        header("Location: index.php?notcompleted");
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple To-Do List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
  <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">To-Do List</h1>
    
    <!-- Add Task Form -->
    <form id="taskForm" class="flex mb-4" method="post">
      <input
        type="text"
        name="task_content"
        id="taskInput"
        placeholder="Add a new task"
        class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400"
        required
      />
      <button
      name="task_submit"
        type="submit"
        class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition"
      >
        Add
      </button>
    </form>
    <?php

    $task->getAllTasks();
?>

   
  
</body>
</html>
