<?php 
require_once __DIR__ . "./connect.php";

$task = $_POST["task"];

$query = "INSERT INTO tasks (task) VALUES (?)"; 
$statement = $pdo->prepare($query);
$statement->execute([$task]);

header("Location: index.php");