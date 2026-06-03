// script.js



function addToCart(movieId, movieName, movieImage, price) {
    // Prepare the data to send
    const formData = new FormData();
    formData.append('movie_id', movieId);
    formData.append('movie_name', movieName);
    formData.append('movie_image', movieImage);
    formData.append('price', price);

    // Send data to server
    fetch('add_to_cart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update cart count display
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = data.cart_count;
                cartCount.style.display = 'inline-block';
            }
            alert('Added to cart!');
        } else {
            if (data.redirect) {
                window.location.href = data.redirect; // For login redirect
            } else {
                alert('Error: ' + (data.error || 'Failed to add to cart'));
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Network error');
    });
}