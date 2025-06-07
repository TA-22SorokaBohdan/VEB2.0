<?php
header("Content-Type: application/json");

$filter = $_GET['filter'] ?? '';

try {
    $db = new PDO('sqlite:db.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($filter) {
        $stmt = $db->prepare("SELECT * FROM products WHERE name LIKE :filter");
        $stmt->execute([':filter' => "%$filter%"]);
    } else {
        $stmt = $db->query("SELECT * FROM products");
    }

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
