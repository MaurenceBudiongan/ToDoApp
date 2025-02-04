<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM tasks");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        /* Reset default styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .app-container {
            width: 300px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .search {
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 16px;
        }

        .search input {
            background-color: transparent;
            color: #999;
            border: none;
            width: 100%;
            outline: none;
        }

        .section-title {
            font-size: 18px;
            font-weight: normal;
            color: #999;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .todo-list, .completed-list {
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 16px;
        }

        .todo-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #fff;
            justify-content: space-between;
        }

        .todo-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .todo-item .text {
            flex-grow: 1;
        }

        .delete-button {
            color: #ff0000;
            cursor: pointer;
            font-weight: bold;
            margin-left: 10px;
        }

        .add-button {
            width: 50px;
            height: 50px;
            background-color: #ffeb3b;
            color: #000;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="app-container">
        <h1 class="title">To-do</h1>
        <div class="search">
            <form action="add_task.php" method="post">
                <input type="text" name="task" placeholder="Add To-Do Item">
                  </div>
                <button type="submit">Add</button>
            </form>
      
        
        <h2 class="section-title">Not Completed</h2>
          <div class="todo-list" id="todo-list">
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li class="todo-item">
                        <span class="text"><?php echo htmlspecialchars($task['task'] ?? ''); ?></span>
                        <div>
                            <a class="edit" href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                            <a class="delete" href="delet_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                        </div>
                    </li>
                    
                <?php endforeach; ?>
               
            </ul>
        </div>
    </div>
</body>
</html>
