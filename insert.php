<?php
require_once __DIR__ . "./connect.php";

$name = $_POST["name"] ?? 'task';
$deadline = $_POST["deadline"] ?? "2023-02-25";

$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

// set the directory to save the image
$directory = "./images/";

// move the uploaded file to the permanent location
move_uploaded_file($file_tmp, $directory . $file_name);

try {
    $query = "INSERT INTO tasks (name ,attachment, deadline) VALUES (:name, :attachment, :deadline)";
    $statement = $pdo->prepare($query);
    $statement->bindValue('name', $name);
    $statement->bindValue('attachment', $file_name);
    $statement->bindValue('deadline', $deadline);
    $statement->execute();

    var_dump("success");
} catch (PDOException $e) {
    echo "Insertion failed: " . $e->getMessage();
    die();
}

header("Location: index.php");
