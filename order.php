<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['product_id']) && !empty($_POST['quantity'])) {
        $product_id = intval($_POST['product_id']);
        $quantity = intval($_POST['quantity']);

        // קבלת פרטי המוצר
        $sql = "SELECT price FROM menu WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $price = $row['price'];
            $total_price = $price * $quantity;

            // הוספת הזמנה לטבלת ההזמנות
            $sql = "INSERT INTO orders (product_id, quantity, total_price) VALUES ($product_id, $quantity, $total_price)";
            
            if ($conn->query($sql) === TRUE) {
                echo "Order placed successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Product not found!";
        }
    } else {
        echo "No product selected or quantity is missing.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Order Confirmation</h1>
        <p><?php echo isset($message) ? $message : 'Your order has been placed successfully!'; ?></p>
        <a href="menu.php" class="btn btn-primary">Back to Menu</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

