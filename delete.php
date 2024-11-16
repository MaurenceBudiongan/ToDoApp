<?php
include 'db.php';
$id=$_GET['id'];

$sqldelete = "DELETE FROM tasks WHERE id = :id";
$stmt=$pdo->prepare($sqldelete);
$stmt->execute(['id'=>$id]);

header("Location: index.php");
exit;
?>