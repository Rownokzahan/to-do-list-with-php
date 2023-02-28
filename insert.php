<?php
require_once __DIR__ . "./connect.php";

$name = $_POST["name"];
$deadline = $_POST["deadline"];

$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

if (!is_dir('images')) {
    mkdir('images');
}

if (!is_dir('images/uploads')) {
    mkdir('images/uploads');
}

$directory = 'images/uploads/';
$img_name = uniqid() . '_' . str_replace(" ", "_", $file_name);
$img_path = $directory . $img_name;

move_uploaded_file($file_tmp, $img_path);

try {
    $query = "INSERT INTO tasks (name ,attachment, deadline) VALUES (:name, :attachment, :deadline)";
    $statement = $pdo->prepare($query);
    $statement->bindValue('name', $name);
    $statement->bindValue('attachment', $img_path);
    $statement->bindValue('deadline', $deadline);
    $statement->execute();
} catch (PDOException $e) {
    echo "Insertion failed: " . $e->getMessage();
    die();
}

header("Location: index.php");
