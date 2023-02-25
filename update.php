<?php 
require_once __DIR__ . "./connect.php";

$id = $_POST["id"];
$name = $_POST["name"];
$deadline = $_POST["deadline"];
$status = $_POST["status"];

$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

// set the directory to save the image
$directory = "./images/";

// move the uploaded file to the permanent location
move_uploaded_file($file_tmp, $directory . $file_name);

try {
    $query = "UPDATE tasks SET name = :name, attachment = :attachment, deadline = :deadline, status = :status WHERE id= :id";
    $statement = $pdo->prepare($query);
    $statement->bindValue('name', $name);
    $statement->bindValue('attachment', $file_name);
    $statement->bindValue('deadline', $deadline);
    $statement->bindValue('status', $status);
    $statement->bindValue('id', $id);
    $statement->execute();

    var_dump("success");
} catch (PDOException $e) {
    echo "Update failed: " . $e->getMessage();
    die();
}

header("Location: index.php");