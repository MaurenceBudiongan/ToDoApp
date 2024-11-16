<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    

    $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->execute([$task]);
    
    header("Location: index.php");
    exit();
}
?>