<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=local_mall" />
        <link rel="stylesheet" href="styles/info.css">
        <link rel="stylesheet" href="styles/header.css">

    </head>
    <body>
        <section id="header">
            <!--left section of the navigation bar-->
            <div class="left-section" > 
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
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="movies.html">MOVIES</a></li>
                    <li><a href="cart.html"><span class="material-symbols-outlined">local_mall</span></i></a></li>
                    <li><a href="login.html"><button class="login-button">LOG IN</button></a></li>
                    
                </ul>
            </div>
        </section>
        <section class="top-section"></section>
        <section class="name-poster">
            <h1 class="movie-name">The Call</h1>
            <img class="movie-poster" src="images/the.call.jpg">
        
            <div class="info-points-div">
                <p class="info-points">Released Year: 2020<br><br>
                Duration: 1h 52m<br><br>
                IMDb Rating: 7.6<br><br>
                Distributed by: Universal Picturs<br><br>
                Director:Chung-Hyun Lee.<br><br>
                Writers: Sergio Casci, Chung-Hyun Lee<br><br>
                Stars: Park Shin-hye, Jeon Jong-seo, Kim Sung-ryung<br><br>
                Genre: Crime, Horror, Thriller.
                </p>
            </div>
            <p class="description">
                Two people live in different times. Seo-Yeon lives in the present and Young-Sook lives in the past. One phone call connects the two, and their lives are changed irrevocably.
            </p>
        </section>
        <section class="trailer-section">
            <div class="trailer-head-div">
                <h2 class="trailer-head">Watch Trailer</h2>
            </div>
            <div class="trailer">
                <iframe width="800" height="465" src="https://www.youtube.com/embed/hM_Kj_t4aB4?si=rXpW9f_wBwRzB8_Z" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>
        <section class="btn-section">
            <button class="atc-btn" data-product-id="2">ADD TO CART </button>
        </section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const buyButton = document.querySelector('.atc-btn');
    buyButton.addEventListener('click', function() {
        const productId = this.getAttribute('data-product-id');
        if (productId) {
            addToCart(productId);
        }
    });
});

function addToCart(productId) {
    const formData = new FormData();
    formData.append('product_id', productId);

    fetch('php/add_to_cart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.status === 401) {
            alert('Please log in to add items to your cart.');
            window.location.href = 'login.html';
            return;
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert(data.message);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while adding the item to the cart.');
    });
}
</script>
    </body>
</html>