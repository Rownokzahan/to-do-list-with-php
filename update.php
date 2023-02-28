<?php 
require_once __DIR__ . "./connect.php";

$id = $_POST["id"];
$name = $_POST["name"];
$deadline = $_POST["deadline"];
$status = $_POST["status"];

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
    $query = "UPDATE tasks SET name = :name, attachment = :attachment, deadline = :deadline, status = :status WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue('name', $name);
    $statement->bindValue('attachment', $img_path);
    $statement->bindValue('deadline', $deadline);
    $statement->bindValue('status', $status);
    $statement->bindValue('id', $id);
    $statement->execute();

    var_dump($statement);

} catch (PDOException $e) {
    echo "Update failed: " . $e->getMessage();
    die();
}

header("Location: index.php");