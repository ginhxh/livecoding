<?php
include_once 'todo.class.php';

$task = new TaskManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task_submit'])) {
        $task->setTaskContent($_POST['task_content']);
        $task->createTask();
    }

    if (isset($_POST['delete_btn'])) {
        $task->setId($_POST['delete_btn']);
        $task->deleteTask();
    }

    header("Location: index.php");
    exit;
}

$tasks = $task->getAllTasks();
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
    <form class="flex mb-4" method="post">
      <input type="text" name="task_content" placeholder="Add a new task" required
        class="flex-1 px-4 py-2 border rounded-l-md focus:outline-none" />
      <button type="submit" name="task_submit"
        class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition">Add</button>
    </form>
    <ul>
      <?php foreach ($tasks as $row): ?>
        <li class="py-4 flex justify-between items-center bg-gray-50 rounded-md shadow mb-2">
          <p><?= htmlspecialchars($row['task_content']) ?></p>
          <form method="post" class="ml-4">
            <!-- <button name="delete_btn" value="<?= $row['id'] ?>" class="bg-red-500 px-3 py-1 text-white">Delete</button> -->
          </form>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>
