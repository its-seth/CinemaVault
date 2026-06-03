<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head><title>Cinema Vault</title>
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/movies.css">
        <link rel="stylesheet" href="styles/body.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=local_mall" />
        <script src="scripts/script.js"></script>

    </head>
    <body style="background-color: rgb(0, 0, 0);">
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
                    <li><a class="current" href="movies.php">MOVIES</a></li>
                    <li><a href="cart.php"><span class="material-symbols-outlined">local_mall</span></i></a></li>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li><a><span class="welcome-message"><?php echo htmlspecialchars($_SESSION['username']); ?></span></a></li>
                        <li><a href="php/logout.php"><button class="login-button">LOG OUT</button></a></li>
                    <?php else: ?>
                        <li><a href="login.html"><button class="login-button">LOG IN</button></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </section>
        <div class="divider"></div>

        <section class="bar">    
            <div class="head-div">
                <p class="head">Animations</p>
            </div>
        <section class="movie-preview">    
                <div class="whole-grid">
                    <img class="movie-image" src="images/wild robot poster.jpg">

                    <div class="info-grid">

                        <div class="movie-name-div">
                            <p class="movie-name">Wild Robot</p>
                        </div>
                        <div class="price-div">
                            <p class="price">LKR 500</p>
                        </div>
                        <div class="info-buy-buttons">
                            <div class="info-button-div">
                                <a href="wildrobot.php"><button class="info-button"> Info </button></a>
                            </div>
                            <div class="buy-button-div">
                                <button class="buy-button" data-product-id="1">Buy</button>
                            </div>
                        </div>
    
                    </div>
                </div>
        </section>
        <!----------------------------one movie box--------------------------------->    
        <section class="movie-preview">    
            <div class="whole-grid">
                <img class="movie-image" src="images/inside out poster.jpeg">

                <div class="info-grid">

                    <div class="movie-name-div">
                        <p class="movie-name">Inside Out</p>
                    </div>
                    <div class="price-div">
                        <p class="price">LKR 500</p>
                    </div>
                    <div class="info-buy-buttons">
                        <div class="info-button-div">
                            <a href="insideout.php"><button class="info-button"> Info </button></a>
                        </div>
                        <div class="buy-button-div">
                            <button class="buy-button" data-product-id="9">Buy</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!----------------------------one movie box--------------------------------->
        <section class="movie-preview">    
            <div class="whole-grid">
                <img class="movie-image" src="images/sing.jpg">

                <div class="info-grid">

                    <div class="movie-name-div">
                        <p class="movie-name">Sing</p>
                    </div>
                    <div class="price-div">
                        <p class="price">LKR 500</p>
                    </div>
                    <div class="info-buy-buttons">
                        <div class="info-button-div">
                            <a href="sing.php"><button class="info-button"> Info </button></a>
                        </div>
                        <div class="buy-button-div">
                            <button class="buy-button" data-product-id="10">Buy</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!----------------------------one movie box--------------------------------->
        <section class="movie-preview">    
            <div class="whole-grid">
                <img class="movie-image" src="images/if.jpg">

                <div class="info-grid">

                    <div class="movie-name-div">
                        <p class="movie-name">IF</p>
                    </div>
                    <div class="price-div">
                        <p class="price">LKR 500</p>
                    </div>
                    <div class="info-buy-buttons">
                        <div class="info-button-div">
                            <a href="if.php"><button class="info-button"> Info </button></a>
                        </div>
                        <div class="buy-button-div">
                            <button class="buy-button" data-product-id="11">Buy</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!----------------------------one movie box--------------------------------->
        <section class="movie-preview">    
            <div class="whole-grid">
                <img class="movie-image" src="images/monster inc.jpeg">

                <div class="info-grid">

                    <div class="movie-name-div">
                        <p class="movie-name">Monster inc</p>
                    </div>
                    <div class="price-div">
                        <p class="price">LKR 500</p>
                    </div>
                    <div class="info-buy-buttons">
                        <div class="info-button-div">
                            <a href="monsterinc.php"><button class="info-button"> Info </button></a>
                        </div>
                        <div class="buy-button-div">
                            <button class="buy-button" data-product-id="5">Buy</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
         <!----------------------------one movie box--------------------------------->
         <section class="movie-preview">    
            <div class="whole-grid">
                <img class="movie-image" src="images/moana.jpg">

                <div class="info-grid">

                    <div class="movie-name-div">
                        <p class="movie-name">Moana</p>
                    </div>
                    <div class="price-div">
                        <p class="price">LKR 500</p>
                    </div>
                    <div class="info-buy-buttons">
                        <div class="info-button-div">
                            <a href="moana.php"><button class="info-button"> Info </button></a>
                        </div>
                        <div class="buy-button-div">
                            <button class="buy-button" data-product-id="12">Buy</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
         
    </section>

    <section class="divide"></section> 
    <section class="bar">    
        <div class="head-div">
            <p class="head">Thrillers</p>
        </div>
    <section class="movie-preview">    
            <div class="whole-grid">
                <img class="movie-image" src="images/the.call.jpg">

                <div class="info-grid">

                    <div class="movie-name-div">
                        <p class="movie-name">The Call</p>
                    </div>
                    <div class="price-div">
                        <p class="price">LKR 500</p>
                    </div>
                    <div class="info-buy-buttons">
                        <div class="info-button-div">
                            <a href="thecall.php"><button class="info-button"> Info </button></a>
                        </div>
                        <div class="buy-button-div">
                            <button class="buy-button" data-product-id="2">Buy</button>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!----------------------------one movie box--------------------------------->    
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/shutter.island.poster.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Shutter Island</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="shutterisland.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="13">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!----------------------------one movie box--------------------------------->
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/oppenheimer.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Oppenheimer</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="oppenheimer.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="14">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!----------------------------one movie box--------------------------------->
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/mothers instinct.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Mothers' Instinct</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="mothersi.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="8">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!----------------------------one movie box--------------------------------->
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/split.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Split</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="split.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="15">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!----------------------------one movie box--------------------------------->
     <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/forgotten.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Forgotten</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="forgotten.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="16">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
     
    </section>

    <section class="divide"></section> 
    <section class="bar">    
        <div class="head-div">
            <p class="head">TV Series</p>
        </div>
    <section class="movie-preview">    
            <div class="whole-grid">
                <img class="movie-image" src="images/PeakyBlinders.webp">

                <div class="info-grid">

                    <div class="movie-name-div">
                        <p class="movie-name">Peaky Blinders</p>
                    </div>
                    <div class="price-div">
                        <p class="price">LKR 1500</p>
                    </div>
                    <div class="info-buy-buttons">
                        <div class="info-button-div">
                            <a href="peakyblinders.php"><button class="info-button"> Info </button></a>
                        </div>
                        <div class="buy-button-div">
                            <button class="buy-button" data-product-id="17">Buy</button>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!----------------------------one movie box--------------------------------->    
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/wednesday.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Wednesday</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 1500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="wednesday.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="18">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!----------------------------one movie box--------------------------------->
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/friends poster.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Friends</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 1500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="friends.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="3">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!----------------------------one movie box--------------------------------->
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/modern family.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Modern Family</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 1500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="modernfamily.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="19">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!----------------------------one movie box--------------------------------->
    <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/squid game poster.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Squid Game</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 1500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="squidgame.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="20">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!----------------------------one movie box--------------------------------->
     <section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/sweet home.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Sweet Home</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 1500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <a href="sweethome.php"><button class="info-button"> Info </button></a>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="21">Buy</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
     
</section>

<section class="divide"></section> 
<section class="bar">    
    <div class="head-div">
        <p class="head">Romance</p>
    </div>
<section class="movie-preview">    
        <div class="whole-grid">
            <img class="movie-image" src="images/pride and prejudice poster.jpg">

            <div class="info-grid">

                <div class="movie-name-div">
                    <p class="movie-name">Pride and Prejudice</p>
                </div>
                <div class="price-div">
                    <p class="price">LKR 500</p>
                </div>
                <div class="info-buy-buttons">
                    <div class="info-button-div">
                        <button class="info-button"> Info </button>
                    </div>
                    <div class="buy-button-div">
                        <button class="buy-button" data-product-id="7">Buy</button>
                    </div>
                </div>

            </div>
        </div>
</section>
<!----------------------------one movie box--------------------------------->    
<section class="movie-preview">    
    <div class="whole-grid">
        <img class="movie-image" src="images/legally blonde.jpg">

        <div class="info-grid">

            <div class="movie-name-div">
                <p class="movie-name">Legally Blond</p>
            </div>
            <div class="price-div">
                <p class="price">LKR 500</p>
            </div>
            <div class="info-buy-buttons">
                <div class="info-button-div">
                    <button class="info-button"> Info </button>
                </div>
                <div class="buy-button-div">
                    <button class="buy-button" data-product-id="4">Buy</button>
                </div>
            </div>

        </div>
    </div>
</section>
<!----------------------------one movie box--------------------------------->
<section class="movie-preview">    
    <div class="whole-grid">
        <img class="movie-image" src="images/mean girls.jpg">

        <div class="info-grid">

            <div class="movie-name-div">
                <p class="movie-name">Mean Girls</p>
            </div>
            <div class="price-div">
                <p class="price">LKR 500</p>
            </div>
            <div class="info-buy-buttons">
                <div class="info-button-div">
                    <button class="info-button"> Info </button>
                </div>
                <div class="buy-button-div">
                    <button class="buy-button" data-product-id="2">Buy</button>
                </div>
            </div>

        </div>
    </div>
</section>
<!----------------------------one movie box--------------------------------->
<section class="movie-preview">    
    <div class="whole-grid">
        <img class="movie-image" src="images/easy a.jpg">

        <div class="info-grid">

            <div class="movie-name-div">
                <p class="movie-name">Easy A</p>
            </div>
            <div class="price-div">
                <p class="price">LKR 500</p>
            </div>
            <div class="info-buy-buttons">
                <div class="info-button-div">
                    <button class="info-button"> Info </button>
                </div>
                <div class="buy-button-div">
                    <button class="buy-button" data-product-id="3">Buy</button>
                </div>
            </div>

        </div>
    </div>
</section>
<!----------------------------one movie box--------------------------------->
<section class="movie-preview">    
    <div class="whole-grid">
        <img class="movie-image" src="images/it ends with us.jpg">

        <div class="info-grid">

            <div class="movie-name-div">
                <p class="movie-name">It Ends With Us</p>
            </div>
            <div class="price-div">
                <p class="price">LKR 500</p>
            </div>
            <div class="info-buy-buttons">
                <div class="info-button-div">
                    <button class="info-button"> Info </button>
                </div>
                <div class="buy-button-div">
                    <button class="buy-button" data-product-id="4">Buy</button>
                </div>
            </div>

        </div>
    </div>
</section>
 <!----------------------------one movie box--------------------------------->
 <section class="movie-preview">    
    <div class="whole-grid">
        <img class="movie-image" src="images/clueless.avif">

        <div class="info-grid">

            <div class="movie-name-div">
                <p class="movie-name">Clueless</p>
            </div>
            <div class="price-div">
                <p class="price">LKR 500</p>
            </div>
            <div class="info-buy-buttons">
                <div class="info-button-div">
                    <button class="info-button"> Info </button>
                </div>
                <div class="buy-button-div">
                    <button class="buy-button" data-product-id="6">Buy</button>
                </div>
            </div>

        </div>
    </div>
</section>

 
</section>

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
    const buyButtons = document.querySelectorAll('.buy-button');
    buyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            if (productId) {
                addToCart(productId);
            }
        });
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