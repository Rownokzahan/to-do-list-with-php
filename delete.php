<?php
require_once __DIR__ . "./connect.php";

$id = $_POST["id"];

$query = "DELETE FROM tasks WHERE id = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
