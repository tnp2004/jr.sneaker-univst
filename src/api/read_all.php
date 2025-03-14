<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: applicaiton/json; charset=UTF-8");
require_once 'db.php';
try {
    $sneakers = array();
    $result = $conn->query('SELECT * FROM sneakers');
    foreach ($result  as $row) {
        // print_r($row);
        $sneaker = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'brand' => $row['brand'],
            'price' => $row['price'],
            'inStock' => $row['in_stock'],
            'description' => mb_substr($row['description'], 0, 100),
            'imageName' => $row['image_name'],
        );
        array_push($sneakers, $sneaker);
    }
    echo json_encode($sneakers);
    $conn = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    die();
}