function updateQuantity(laptopId, action) {
    const quantityElement = document.querySelector(`.quantity-value[data-laptop-id='${laptopId}']`);
    let currentQuantity = parseInt(quantityElement.textContent);

    if (action === 'increase') {
        currentQuantity++;
    } else if (action === 'decrease') {
        currentQuantity = Math.max(1, currentQuantity - 1);
    }

    // Send an AJAX request to update the quantity in the database
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/action/update_quantity.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Update the quantity displayed on the page
            quantityElement.textContent = currentQuantity;

            // Update the total price
            updateTotalPrice();
        }
    };

    // Prepare the data to be sent in the POST request
    const data = `laptop_id=${encodeURIComponent(laptopId)}&quantity=${encodeURIComponent(currentQuantity)}`;

    // Send the POST request
    xhr.send(data);
}

// Function to update the total price
function updateTotalPrice() {
    const quantityElements = document.querySelectorAll('.quantity-value');
    let totalPrice = 0;

    quantityElements.forEach(quantityElement => {
        const laptopId = quantityElement.getAttribute('data-laptop-id');
        const priceElement = quantityElement.closest('tr').querySelector('td:nth-child(2)'); // Find the corresponding price element in the row
        const priceRange = parseFloat(priceElement.textContent); // Parse the price as a float

        if (!isNaN(priceRange)) {
            const quantity = parseInt(quantityElement.textContent);
            totalPrice += priceRange * quantity;
        }
    });

    // Update the total price displayed on the page
    const totalPriceDisplay = document.getElementById('totalPriceDisplay');
    totalPriceDisplay.textContent = isNaN(totalPrice) ? "Tổng tiền: NaN" : `Tổng tiền: ${totalPrice.toFixed(0)}`;
}

// Event listener to handle the quantity button clicks
const quantityButtons = document.querySelectorAll('.quantity-action-btn-increase, .quantity-action-btn-decrease');
quantityButtons.forEach(button => {
    button.addEventListener('click', function() {
        const laptopId = this.getAttribute('data-laptop-id');
        const action = this.getAttribute('data-action');
        updateQuantity(laptopId, action);
    });
});

function openmodalpay(modalId) {
    // Display the specified modal
    const modal = document.getElementById(`modal-${modalId}`);
    modal.style.display = "block";
}

function closemodalpay(modalId) {
    // Hide the specified modal
    const modal = document.getElementById(`modal-${modalId}`);
    modal.style.display = "none";
}

// Close modal when clicking outside the content
window.addEventListener('click', function(event) {
    const modals = document.getElementsByClassName('modal-pay');
    for (const modal of modals) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
});
// Calculate and display the initial total price
updateTotalPrice();