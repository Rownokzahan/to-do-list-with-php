<?php 
require_once __DIR__ . "./connect.php";

$task = $_POST["task"];
$id = $_POST ["id"];

$query = "UPDATE tasks SET task=? WHERE id=?"; 
$statement = $pdo->prepare($query);
$statement->execute([$task,$id]);

header("Location: index.php");