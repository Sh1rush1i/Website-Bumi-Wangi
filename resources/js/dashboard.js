import "./bootstrap";

document.querySelector("form").addEventListener("submit", function (e) {
    const uploadPhoto = document.getElementById("uploadPhoto");
    const uploadVideo = document.getElementById("uploadVideo");

    // Validasi Foto
    if (uploadPhoto.files[0] && uploadPhoto.files[0].size > 10 * 1024 * 1024) {
        e.preventDefault();
        alert("Ukuran file foto maksimal 10 MB!");
        return;
    }

    // Validasi Video (Jika Ada)
    if (uploadVideo.files[0] && uploadVideo.files[0].size > 50 * 1024 * 1024) {
        e.preventDefault();
        alert("Ukuran file video maksimal 50 MB!");
        return;
    }
});

document.addEventListener("DOMContentLoaded", function (event) {
    // Mapping between menu IDs and content sections
    const menuToContentMap = {
        "menu-dashboard": "dashboard-content",
        "menu-input-produk": "produk-content",
        "menu-input-wisata": "wisata-content",
        "menu-input-beranda": "beranda-content",
        "menu-input-tentang": "about-content",
        "menu-input-info": "info-content",
        "menu-input-bayar": "info-bayar",
        "menu-pembelian": "pembelian",
    };

    // Select all content sections
    const allSections = Object.values(menuToContentMap).map((id) =>
        document.getElementById(id)
    );

    // Function to handle visibility
    const showContent = (contentToShow) => {
        allSections.forEach((section) => {
            if (section.id === contentToShow) {
                section.classList.remove("d-none"); // Show the selected section
            } else {
                section.classList.add("d-none"); // Hide the other sections
            }
        });
    };

    // Add event listeners for menu items dynamically
    Object.keys(menuToContentMap).forEach((menuId) => {
        const menuElement = document.getElementById(menuId);
        const contentId = menuToContentMap[menuId];

        if (menuElement) {
            menuElement.addEventListener("click", (event) => {
                event.preventDefault();
                showContent(contentId);
            });
        }
    });

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener("click", () => {
                // show navbar
                nav.classList.toggle("show2");
                // change icon
                toggle.classList.toggle("bx-x");
                // add padding to body
                bodypd.classList.toggle("body-pd");
                // add padding to header
                headerpd.classList.toggle("body-pd");
            });
        }
    };

    showNavbar("header-toggle", "nav-bar", "body-pd", "header");

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll(".nav_link");

    function colorLink() {
        if (linkColor) {
            linkColor.forEach((l) => l.classList.remove("active"));
            this.classList.add("active");
        }
    }
    linkColor.forEach((l) => l.addEventListener("click", colorLink));

    // Your code to run since DOM is loaded and ready
});

document.addEventListener("DOMContentLoaded", function () {
    const updateModal = document.getElementById("updateModal");
    const updateForm = document.getElementById("updateForm");

    updateModal.addEventListener("show.bs.modal", function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget;

        // Extract data attributes
        const type = button.getAttribute("data-type");
        const id = button.getAttribute("data-id");
        const nama = button.getAttribute("data-nama");
        const deskripsi = button.getAttribute("data-deskripsi");
        const harga = button.getAttribute("data-harga");
        const satuan = button.getAttribute("data-satuan");

        // Populate the form fields
        document.getElementById("update-id").value = id;
        document.getElementById("update-nama").value = nama;
        document.getElementById("update-deskripsi").value = deskripsi;
        document.getElementById("update-harga").value = harga;
        document.getElementById("update-satuan").value = satuan;

        // Set the form's action dynamically based on type
        if (type === "wisata") {
            updateForm.action = `/api/update-wisata/${id}`;
        } else if (type === "produk") {
            updateForm.action = `/api/update-produk/${id}`;
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const updateModal = document.getElementById("updateModalPembayaran");
    const updateForm = document.getElementById("updateFormPembayaran");

    updateModal.addEventListener("show.bs.modal", function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget;

        // Extract data attributes
        const id = button.getAttribute("data-id");
        const nama = button.getAttribute("data-name");
        const pemilik = button.getAttribute("data-pemilik");
        const no_rek = button.getAttribute("data-no_rek");

        // Populate the form fields
        document.getElementById("update-id").value = id;
        document.getElementById("update-nama").value = nama;
        document.getElementById("update-pemilik").value = pemilik;
        document.getElementById("update-no_rek").value = no_rek;

        updateForm.action = `/api/metode/update/${id}`;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const updateModal = document.getElementById("updateModalCarousel");
    const updateForm = document.getElementById("updateFormCarousel");

    updateModal.addEventListener("show.bs.modal", function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget;

        // Extract data attributes
        const id = button.getAttribute("data-id");
        const caption = button.getAttribute("data-caption");

        // Populate the form fields
        document.getElementById("update-id").value = id;
        document.getElementById("update-caption").value = caption;

        updateForm.action = `/api/carousel/update/${id}`;
    });
});

$(document).ready(function () {
    $(".delete-produk").on("click", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the corresponding form
                $(`#deleteFormProduk-${id}`).submit();
            }
        });
    });
});

$(document).ready(function () {
    $(".delete-wisata").on("click", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the corresponding form
                $(`#deleteFormWisata-${id}`).submit();
            }
        });
    });
});

$(document).ready(function () {
    $(".delete-pembayaran").on("click", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the corresponding form
                $(`#deleteFormPembayaran-${id}`).submit();
            }
        });
    });
});

$(document).ready(function () {
    $(".delete-carousel").on("click", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the corresponding form
                $(`#deleteFormCarousel-${id}`).submit();
            }
        });
    });
});
