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
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username LIMIT 1");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
         $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($password == $user['password']) {
            http_response_code(200);
            echo json_encode(array("status" => "ok", "message" => "login successful"));
        }else {
            http_response_code(401);
            echo json_encode(array("status" => "unauthorized", "message" => "invalid username or password"));
        }

    } else {
        http_response_code(401);
        echo json_encode(["status" => "unauthorized", "message" => "user not found"]);
    }

    $conn = null;
} catch(PDOException $e) {
    echo "error: " . $e->getMessage() . "<br>";
    die();
}
