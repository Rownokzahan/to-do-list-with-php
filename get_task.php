<?php
require_once __DIR__ . "./connect.php";

$id = $_POST["id"];

$query = "SELECT * FROM tasks WHERE id = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
$task = $statement->fetch(PDO::FETCH_OBJ);
echo json_encode($task->task);
