<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: applicaiton/json; charset=UTF-8");
require_once 'db.php';

try {
    $sneakers = array();
    $stmt = $conn->prepare('SELECT * FROM sneakers WHERE id = :id LIMIT 1');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();

    foreach ($stmt  as $row) {
        $sneaker = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'brand' => $row['brand'],
            'price' => $row['price'],
            'inStock' => $row['in_stock'],
            'description' => mb_substr($row['description'], 0, 100),
            'imageName' => $row['image_name'],
        );
        echo json_encode($sneaker);
    }
    $conn = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    die();
}