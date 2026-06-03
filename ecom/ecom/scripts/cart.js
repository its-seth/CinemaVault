document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartItemsContainer = document.getElementById("cart-items");
    const totalPriceElement = document.getElementById("total-price");

    function updateCart() {
        cartItemsContainer.innerHTML = "";
        let total = 0;
        cart.forEach((item, index) => {
            const li = document.createElement("li");
            li.textContent = `${item.name} - $${item.price}`;
            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Remove";
            removeBtn.onclick = function () {
                cart.splice(index, 1);
                localStorage.setItem("cart", JSON.stringify(cart));
                updateCart();
            };
            li.appendChild(removeBtn);
            cartItemsContainer.appendChild(li);
            total += item.price;
        });
        totalPriceElement.textContent = `Total: $${total}`;
    }

    window.addToCart = function (name, price) {
        cart.push({ name, price });
        localStorage.setItem("cart", JSON.stringify(cart));
        alert("Item added to cart!");
    };

    window.clearCart = function () {
        cart = [];
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCart();
    };

    updateCart();
});