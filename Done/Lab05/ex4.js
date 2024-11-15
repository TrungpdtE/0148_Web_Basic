

let cartItems = [];

function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    const existingCartItem = cartItems.find(item => item.id === productId);

    if (existingCartItem) {
        existingCartItem.quantity++;
    } else {
        cartItems.push({ id: product.id, name: product.name, price: product.price, quantity: 1 });
    }
    
    updateCart();
}

function updateCart() {
    const cartTable = document.getElementById("cart-table");
    const cartBody = cartTable.getElementsByTagName("tbody")[0];
    cartBody.innerHTML = "";

    let totalPrice = 0;
    let totalQuantity = 0;

    cartItems.forEach(item => {
        const total = item.price * item.quantity;
        totalPrice += total;
        totalQuantity += item.quantity;

        const row = cartBody.insertRow();
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>${item.price.toFixed(2)}</td>
            <td><input type="number" value="${item.quantity}" onchange="updateQuantity(${item.id}, this.value)"></td>
            <td>${total.toFixed(2)}</td>
            <td><button onclick="removeFromCart(${item.id})">Remove</button></td>
        `;
    });

    document.getElementById("total-price").textContent = totalPrice.toFixed(2);
    document.getElementById("total-quantity").textContent = totalQuantity;
}

function updateQuantity(productId, newQuantity) {
    const item = cartItems.find(item => item.id === productId);
    item.quantity = parseInt(newQuantity);
    updateCart();
}

function removeFromCart(productId) {
    cartItems = cartItems.filter(item => item.id !== productId);
    updateCart();
}

const productTable = document.getElementById("product-table").getElementsByTagName("tbody")[0];
products.forEach(product => {
    const row = productTable.insertRow();
    row.innerHTML = `
        <td>${product.id}</td>
        <td>${product.name}</td>
        <td>${product.price.toFixed(2)}</td>
        <td>${product.description}</td>
        <td><button onclick="addToCart(${product.id})">Add to cart</button></td>
    `;
});
