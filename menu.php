

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-item {
            margin-bottom: 15px;
        }
        .card {
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Menu</h1>
        <div class="row">
            <?php
            include 'db.php';

            $sql = "SELECT id, name, price, description FROM menu";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 menu-item">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['name'] . ' - $' . number_format($row['price'], 2) . '</h5>';
                    echo '<p class="card-text">' . $row['description'] . '</p>';
                    echo '<form action="order.php" method="post">';
                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                    echo '<div class="mb-3">';
                    echo '<label for="quantity" class="form-label">Quantity:</label>';
                    echo '<input type="number" name="quantity" min="1" class="form-control" value="1">';
                    echo '</div>';
                    echo '<button type="submit" class="btn btn-primary">Order</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

