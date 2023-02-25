<?php
require_once __DIR__ . "./connect.php";

$id = $_POST["id"];

try {
    $query = "SELECT * FROM tasks WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue('id', $id);
    $statement->execute();

    $task = $statement->fetch(PDO::FETCH_OBJ);
    echo json_encode($task);
} catch (PDOException $e) {
    echo "Update failed: " . $e->getMessage();
    die();
}