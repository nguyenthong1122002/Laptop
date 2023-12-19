document.getElementById("loadMoreBtn").addEventListener("click", function() {
    let laptops = document.getElementsByClassName("laptop");
    for (let i = 20; i < laptops.length; i++) {
        laptops[i].style.display = "block";
    }
    this.style.display = "none"; // Ẩn nút "Xem thêm" sau khi hiển thị tất cả sản phẩm
});