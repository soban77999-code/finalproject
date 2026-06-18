<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once 'db.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

// 1. VIEW ALL PRODUCTS & SEARCH
if ($action == 'read') {
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if (!empty($search)) {
        $query = "SELECT * FROM products WHERE product_name LIKE :search OR description LIKE :search ORDER BY product_id DESC";
        $stmt = $conn->prepare($query);
        $search_term = "%{$search}%";
        $stmt->bindParam(':search', $search_term);
    } else {
        $query = "SELECT * FROM products ORDER BY product_id DESC";
        $stmt = $conn->prepare($query);
    }
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

// 2. VIEW DETAIL
elseif ($action == 'detail') {
    $id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
    $query = "SELECT * FROM products WHERE product_id = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}

// 3. CREATE PRODUCT
elseif ($action == 'create') {
    $name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $desc = isset($_POST['description']) ? $_POST['description'] : '';
    $image_name = '';

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image_name = time() . "_" . basename($_FILES["product_image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
    }

    if (!empty($name) && !empty($price)) {
        $query = "INSERT INTO products (product_name, description, price, image_url) VALUES (:name, :desc, :price, :img)";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':desc' => $desc,
            ':price' => $price,
            ':img' => $image_name
        ]);
        echo json_encode(["message" => "Product created successfully."]);
    } else {
        echo json_encode(["message" => "Incomplete data."]);
    }
}

// 4. UPDATE PRODUCT
elseif ($action == 'update') {
    $id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $desc = isset($_POST['description']) ? $_POST['description'] : '';
    
    if (!empty($id)) {
        if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
            $target_dir = "uploads/";
            $image_name = time() . "_" . basename($_FILES["product_image"]["name"]);
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_dir . $image_name);
            
            $query = "UPDATE products SET product_name = :name, description = :desc, price = :price, image_url = :img WHERE product_id = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':name' => $name, ':desc' => $desc, ':price' => $price, ':img' => $image_name, ':id' => $id]);
        } else {
            $query = "UPDATE products SET product_name = :name, description = :desc, price = :price WHERE product_id = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':name' => $name, ':desc' => $desc, ':price' => $price, ':id' => $id]);
        }
        echo json_encode(["message" => "Product updated successfully."]);
    }
}

// 5. DELETE PRODUCT 
elseif ($action == 'delete') {
    $id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
    if(!empty($id)) {
        $query = "DELETE FROM products WHERE product_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo json_encode(["message" => "Product deleted successfully."]);
    } else {
        echo json_encode(["message" => "Product ID is missing."]);
    }
}
?>