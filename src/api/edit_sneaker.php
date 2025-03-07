<?php
require_once 'db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array("status" => "error", "message" => "รองรับเฉพาะ POST เท่านั้น"));
    die();
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$brand = isset($_POST['brand']) ? $_POST['brand'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$in_stock = isset($_POST['inStock']) ? $_POST['inStock'] : '';
$new_file_name = "";

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $file_name = basename($_FILES['image']['name']);
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = uniqid('sneaker_', true) . '.' . $file_extension;

    $target_dir = "../images/products/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . $new_file_name;

    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);

    if ($check == false) {
        http_response_code(400);
        echo json_encode(array("status" => "bad request", "message" => "invalid image file"));
        die();
    }

    if ($_FILES["image"]["size"] > 5000000) {
        http_response_code(400);
        echo json_encode(array("status" => "bad request", "message" => "file to large"));
        die();
    }

    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {
        http_response_code(400);
        echo json_encode(array("status" => "bad request", "message" => "invalid image type"));
        die();
    }

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        http_response_code(500);
        echo json_encode(array("status" => "internal server error", "message" => "failed to upload file"));
        die();
    }
}

try {
    $stmt = $conn->prepare("SELECT image_name FROM sneakers WHERE id = :id");
    $stmt->bindParam(":id", $id);
    if (!$stmt->execute()) {
        http_response_code(400);
        echo json_encode(["status" => "bad request", "message" => "product not found"]);
    };
    $image_name = "";

    foreach ($stmt as $row) {
        $image_name = $row['image_name'];
    };

    $sqlQuery = "UPDATE sneakers SET name = :name, brand = :brand, description = :description, price = :price, in_stock = :in_stock";
    if ($new_file_name != "") {
        $sqlQuery = $sqlQuery . ", image_name = :image_name";
    };
    $sqlQuery = $sqlQuery . " WHERE id = :id";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":brand", $brand);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":in_stock", $in_stock);
    if ($new_file_name != "") {
        $stmt->bindParam(":image_name", $new_file_name);
    };
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
        if ($new_file_name != "") {
            unlink("../images/products/".$image_name);
        };
        header('Location: ../admin_products.php');
    } else {
        http_response_code(500);
        echo json_encode(array("status" => "internal server error", "message" => "failed to add product"));
    }
    
    $conn = null;
} catch(PDOException $e) {
    echo "error: " . $e->getMessage();
    die();
}
