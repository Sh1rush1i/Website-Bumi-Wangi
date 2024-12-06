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
