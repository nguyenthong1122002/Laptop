// Variables to track pagination
let currentPage = 1;
const laptopsPerPage = 20;
let totalLaptops = 0;

// Function to update pagination buttons based on the current page and total laptops count
function updatePaginationButtons() {
    const prevPageBtn = document.getElementById("prevPageBtn");
    const nextPageBtn = document.getElementById("nextPageBtn");

    prevPageBtn.disabled = currentPage === 1;
    nextPageBtn.disabled = currentPage >= Math.ceil(totalLaptops / laptopsPerPage);
}

function getProductDetailsLink(laptopId) {
    return `/layout/product_details.php?id=${laptopId}`;
}

// Function to fetch laptops data based on the filter and display them on the current page
function fetchLaptops(filterData) {
    // Convert form data to URLSearchParams
    const formData = new URLSearchParams(filterData);
    fetch("/action/fetch_laptops.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Save the total number of laptops retrieved
            totalLaptops = data.length;
            // Update pagination buttons based on the current page and total laptops count
            updatePaginationButtons();
            // Calculate the start and end index for the current page
            const startIndex = (currentPage - 1) * laptopsPerPage;
            const endIndex = Math.min(startIndex + laptopsPerPage, totalLaptops);
            // Get the container where laptops will be displayed
            const laptopsContainer = document.getElementById("laptopsContainer");
            // Clear previous data
            laptopsContainer.innerHTML = ""; // Clear previous data before appending new data
            if (data.length > 0) {
                for (let i = startIndex; i < endIndex; i++) {
                    const laptop = data[i];
                    const laptopCard = document.createElement("div");

                    // Create an anchor tag linking to the product_details.php page with the laptop ID
                    const laptopLink = document.createElement("a");
                    laptopLink.href = getProductDetailsLink(laptop.id);

                    // Create the content for the laptop card
                    laptopLink.innerHTML = `
                    <img src="/action/${laptop.image_url}" alt="${laptop.laptop_name}">
                    <h2 class='filter-laptop'>${laptop.laptop_name}</h2>
                    <p class='filter-laptop'> ${laptop.price_range} đ</p>
                `;

                    // Append the laptop card to the laptops container
                    laptopCard.appendChild(laptopLink);
                    laptopsContainer.appendChild(laptopCard);
                }
            } else {
                laptopsContainer.innerHTML = "Không tìm thấy sản phẩm phù hợp.";
            }
        })
        .catch(error => console.error("Error fetching laptops:", error));
}

// Event listener for the filter form submission
document.getElementById("filterForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    currentPage = 1; // Reset to the first page when a new filter is applied
    fetchLaptops(formData);
});

// Event listener for the "Previous Page" button
document.getElementById("prevPageBtn").addEventListener("click", function() {
    if (currentPage > 1) {
        currentPage--;
        fetchLaptops(new FormData(document.getElementById("filterForm")));
    }
});

// Event listener for the "Next Page" button
document.getElementById("nextPageBtn").addEventListener("click", function() {
    if (currentPage < Math.ceil(totalLaptops / laptopsPerPage)) {
        currentPage++;
        fetchLaptops(new FormData(document.getElementById("filterForm")));
    }
});