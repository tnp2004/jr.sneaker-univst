<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: applicaiton/json; charset=UTF-8");
require_once 'db.php';
try {
    $sneakers = array();
    $result = $conn->query('SELECT * FROM sneakers LIMIT 4');
    foreach ($result  as $row) {
        // print_r($row);
        $sneaker = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'amount' => $row['amount'],
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