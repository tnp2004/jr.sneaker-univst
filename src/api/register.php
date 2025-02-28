<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: applicaiton/json; charset=UTF-8");
require_once 'db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array("status" => "error", "message" => "รองรับเฉพาะ POST เท่านั้น"));
    die();
}

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

if (empty($data->username) || empty($data->password)) {
    http_response_code(401);
    echo json_encode(array("status" => "unauthorized", "message" => "username and password is required"));
    die();
}

try {
    $stmt = $conn->prepare("INSERT INTO users(username, password) VALUES(:username, :password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(array("status" => "ok", "message" => "register successful"));
    }else {
        http_response_code(500);
        echo json_encode(array("status" => "error", "message" => "something went wrong"));
    }

    $conn = null;
} catch(PDOException $e) {
    echo json_encode(array("status" => "error", "message" => $e->getMessage()));
    die();
}
