<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: applicaiton/json; charset=UTF-8");
require_once 'db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array("status" => "error", "message" => "รองรับเฉพาะ POST เท่านั้น"));
    die();
}

$data = json_decode(file_get_contents("php://input"));

$product_id = $data->productID;

if (empty($product_id)) {
    http_response_code(400);
    echo json_encode(array("status" => "bad request", "message" => "product id is required"));
    die();
}

try {
    $stmt = $conn->prepare("DELETE FROM sneakers WHERE id = :id");
    $stmt->bindParam(":id", $product_id);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(array("status" => "ok", "message" => "delete product successful"));
    } else {
        http_response_code(400);
        echo json_encode(["status" => "bad request", "message" => "product not found"]);
    }

    $conn = null;
} catch(PDOException $e) {
    echo "error: " . $e->getMessage();
    die();
}
