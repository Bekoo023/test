<!-- shopping_bag.php -->
<?php
session_start();
require 'database.php';

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="fotos/achtergrond.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Winkelmand</title>
</head>
<body>
    <header>
        <h1>Winkelmand</h1>
        <?php include 'header.php'; ?>
    </header>
    <div class="container_bag">
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                echo '<div class="product_bag">';
                echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                echo '<h3>' . $item['name'] . '</h3>';
                echo '<p>Omschrijving: ' . $item['omschrijving'] . '</p>';
                echo '<p>Price: €' . number_format($item['price'], 2) . '</p>';
                echo '<button class="remove-from-cart-button" onclick="removeFromCart(' . $key . ')">Remove from Cart</button>';
                echo '</div>';
            }

            $totalAmount = array_sum(array_column($_SESSION['cart'], 'price'));
            echo '<div class="total">';
            echo 'Total Amount: $' . number_format($totalAmount, 2);
            echo '</div>';
        } else {
            echo '<p class="txtshop">Your shopping bag is empty.</p>';
        }

        mysqli_close($conn);
        ?>
    </div>
    <script src="script.js"></script>

    <?php include 'footer.php'; ?>
</body>
</html>

</body>
</html>
