document.getElementById("image").addEventListener("change", function (event) {
    const imagePreview = document.getElementById("imagePreview");
    const file = event.target.files[0]; // Get the first selected file

    if (file) {
        const reader = new FileReader();

        // Clear previous content
        imagePreview.innerHTML = "";

        // Load the file and display it as an image
        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result; // Set the image source
            img.alt = "Preview";
            img.style.maxWidth = "100%";
            img.style.maxHeight = "100%";
            img.style.objectFit = "cover";
            imagePreview.appendChild(img); // Add the image to the preview container
        };

        reader.readAsDataURL(file); // Read the file as a Data URL
    } else {
        // Reset preview if no file is selected
        imagePreview.innerHTML =
            '<span class="text-muted">Preview Gambar</span>';
    }
});

function increaseQuantity(button) {
    const input = button.previousElementSibling; // Ambil input yang berada sebelum tombol +
    input.value = parseInt(input.value) + 1; // Tambah nilai
    updateTotal(input); // Update total jika berhasil ditambah
}

function decreaseQuantity(button) {
    const input = button.nextElementSibling; // Ambil input yang berada setelah tombol -
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1; // Kurangi nilai jika lebih dari 0
        updateTotal(input); // Update total jika berhasil dikurangi
    }
}

function updateTotal(input) {
    // Get the price from the data attribute
    const price = parseFloat(input.dataset.price);

    // Calculate the total
    const quantity = parseInt(input.value, 10);
    const total = price * quantity;

    // Update the total display
    document.getElementById("total").textContent =
        total.toLocaleString("id-ID");

    const quantityInput = document.getElementById("quantity-input");
    const totalHargaInput = document.getElementById("total-harga-input");
    if (quantityInput) quantityInput.value = quantity;
    if (totalHargaInput) totalHargaInput.value = total;
}
