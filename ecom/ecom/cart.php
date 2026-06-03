<?php
session_start();
require_once 'php/db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}

$cart_items = [];
$total = 0;

try {
    $sql = "SELECT p.id, p.name, p.price, p.image, c.quantity 
            FROM cart c 
            JOIN products p ON c.product_id = p.id 
            WHERE c.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['id']]);
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cart_items as $item) {
        $total += $item['price'] * $item['quantity'];
    }

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD to cart </title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=local_mall" />
    <script src="scripts/script.js"></script>
   
</head>

<body>
    <section id="header">
        <!--left section of the navigation bar-->
        <div class="left-section"> 
            <img class="logo" src="images/logo black cropped.png">
        </div>
        <!--middle section of the navigation bar-->
        <div class="middle-section">
            <input class="searchbar" type="text" placeholder="Seach Movies">
            <img class="search-icon" src="icons/search_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24 (1).svg">
        </div>
        <!--right section of the navigation bar-->
        <div class="right-section">
            <ul id="navbar">
                <li><a href="index.php">HOME</a></li>
                <li><a href="movies.php">MOVIES</a></li>
                <li><a class="current" href="cart.php"><span class="material-symbols-outlined">local_mall</span></i></a></li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li><a><span class="welcome-message"><?php echo htmlspecialchars($_SESSION['username']); ?></span></a></li>
                    <li><a href="php/logout.php"><button class="login-button">LOG OUT</button></a></li>
                <?php else: ?>
                    <li><a href="login.html"><button class="login-button">LOG IN</button></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </section>
    
    <section class="top"></section>
  
    <h1>My Cart</h1>
    
    <div class="cart-container">
        <div class="cart-items">
            <?php if (empty($cart_items)): ?>
                <p class="cart-empty-message">Your cart is empty.</p>
            <?php else: ?>
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title"><?php echo htmlspecialchars($item['name']); ?></h3>
                            <p class="product-price">RS <?php echo number_format($item['price'], 2); ?></p>
                            <p>Quantity: <?php echo $item['quantity']; ?></p>
                            <input type="hidden" class="item-quantity" value="<?php echo $item['quantity']; ?>">
                            <button class="remove-btn" data-product-id="<?php echo $item['id']; ?>">Remove</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <a href="#" class="clear-cart-link" <?php if (empty($cart_items)) echo 'style="display:none;"'; ?>>Clear Cart</a>
        </div>

        <div class="summary">
            <h3>Summary</h3>
            <div class="summary-row">
                <span>Subtotal:</span>
                <span id="subtotal-amount">RS <?php echo number_format($total, 2); ?></span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span id="total-amount">RS <?php echo number_format($total, 2); ?></span>
            </div>
            
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Cinema Vault. All rights reserved.</p>
            <div class="footer-links">
                <a href="privacy.html">Privacy Policy</a> | 
                <a href="terms.html">Terms of Service</a>
            </div>
            <div class="footer-address">
                <p>123 Awissawella Road, Colombo, Sri Lanka</p>
                <p>Phone: (+94) 712 365 470</p>
                <p>Email: hello@cinemavault.lk</p>
            </div>
            <div class="footer-slogan">
                <p>"Bringing Movies to Life!"</p>
            </div>
        </div>
    </footer>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.remove-btn');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            if (confirm('Are you sure you want to remove this item?')) {
                removeFromCart(productId, this);
            }
        });
    });

    const clearCartLink = document.querySelector('.clear-cart-link');
    if (clearCartLink) {
        clearCartLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            if (confirm('Are you sure you want to clear your entire cart?')) {
                clearCart();
            }
        });
    }
});

function clearCart() {
    fetch('php/clear_cart.php', {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const cartItems = document.querySelectorAll('.cart-item');
            cartItems.forEach(item => item.remove());
            updateCartTotals();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while clearing the cart.');
    });
}

function removeFromCart(productId, buttonElement) {
    const formData = new FormData();
    formData.append('product_id', productId);

    fetch('php/remove_from_cart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the cart item element from the DOM
            const cartItem = buttonElement.closest('.cart-item');
            cartItem.remove();
            // Recalculate and update totals
            updateCartTotals();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while removing the item.');
    });
}

function updateCartTotals() {
    let subtotal = 0;
    const cartItems = document.querySelectorAll('.cart-item');
    const cartItemsContainer = document.querySelector('.cart-items');
    const clearCartLink = document.querySelector('.clear-cart-link');

    const existingEmptyMessage = document.querySelector('.cart-empty-message');
    if (existingEmptyMessage) {
        existingEmptyMessage.remove();
    }

    if (cartItems.length === 0) {
        const emptyMessage = document.createElement('p');
        emptyMessage.textContent = 'Your cart is empty.';
        emptyMessage.className = 'cart-empty-message';
        if (cartItemsContainer) {
            cartItemsContainer.insertBefore(emptyMessage, clearCartLink);
        }
        if (clearCartLink) {
            clearCartLink.style.display = 'none';
        }
    } else {
        cartItems.forEach(item => {
            const priceText = item.querySelector('.product-price').textContent;
            const price = parseFloat(priceText.replace('RS ', '').replace(/,/g, ''));
            const quantity = parseInt(item.querySelector('.item-quantity').value);
            subtotal += price * quantity;
        });
        if (clearCartLink) {
            clearCartLink.style.display = 'block';
        }
    }

    const subtotalElement = document.getElementById('subtotal-amount');
    const totalElement = document.getElementById('total-amount');

    if(subtotalElement && totalElement){
        subtotalElement.textContent = 'RS ' + subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        totalElement.textContent = 'RS ' + subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
}
</script>
</body>
</html>