// Sample products
const products = [
    { id: 1, name: "Product 1", price: 10 },
    { id: 2, name: "Product 2", price: 20 },
    { id: 3, name: "Product 3", price: 30 }
];

let cartItems = [];

// Add product to cart
function addToCart(productId) {
    const product = products.find(item => item.id === productId);
    cartItems.push(product);
    renderCart();
}

// Render cart items
function renderCart() {
    const cartElement = document.getElementById("cart-items");
    cartElement.innerHTML = "";
    cartItems.forEach(item => {
        const div = document.createElement("div");
        div.classList.add("cart-item");
        div.innerHTML = `<span>${item.name}</span><span>$${item.price}</span>`;
        cartElement.appendChild(div);
    });
    calculateTotal();
}

// Calculate total price
function calculateTotal() {
    const totalPriceElement = document.getElementById("total-price");
    const totalPrice = cartItems.reduce((acc, item) => acc + item.price, 0);
    totalPriceElement.textContent = `Total: $${totalPrice}`;
}

// Checkout function (just an example, doesn't actually do anything)
function checkout() {
    alert("Thank you for your purchase!");
}

// Initial render
renderCart();
