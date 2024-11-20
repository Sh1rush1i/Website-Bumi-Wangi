import './bootstrap';


document.querySelector('form').addEventListener('submit', function (e) {
    const uploadPhoto = document.getElementById('uploadPhoto');
    const uploadVideo = document.getElementById('uploadVideo');

    // Validasi Foto
    if (uploadPhoto.files[0] && uploadPhoto.files[0].size > 10 * 1024 * 1024) {
    e.preventDefault();
    alert('Ukuran file foto maksimal 10 MB!');
    return;
    }

    // Validasi Video (Jika Ada)
    if (uploadVideo.files[0] && uploadVideo.files[0].size > 50 * 1024 * 1024) {
    e.preventDefault();
    alert('Ukuran file video maksimal 50 MB!');
    return;
    }
});

document.addEventListener("DOMContentLoaded", function(event) {

    // Select all menu links
    const menuDashboard = document.getElementById('menu-dashboard');
    const menuInputProduk = document.getElementById('menu-input-produk');
    const menuInputWisata = document.getElementById('menu-input-wisata');
    const menuPembelian = document.getElementById('menu-pembelian');

    // Select all content sections
    const dashboardContent = document.getElementById('dashboard-content');
    const produkContent = document.getElementById('produk-content');
    const wisataContent = document.getElementById('wisata-content');
    const pembelianContent = document.getElementById('pembelian');

    // Group all content sections in an array
    const allSections = [dashboardContent, produkContent, wisataContent, pembelianContent];

    // Function to handle visibility
    const showContent = (contentToShow) => {
        allSections.forEach((section) => {
            if (section === contentToShow) {
                section.classList.remove('d-none'); // Show the selected section
            } else {
                section.classList.add('d-none'); // Hide the other sections
            }
        });
    };

    // Add event listeners for menu items
    menuDashboard.addEventListener('click', (event) => {
        event.preventDefault();
        showContent(dashboardContent);
    });

    menuInputProduk.addEventListener('click', (event) => {
        event.preventDefault();
        showContent(produkContent);
    });

    menuInputWisata.addEventListener('click', (event) => {
        event.preventDefault();
        showContent(wisataContent);
    });

    menuPembelian.addEventListener('click', (event) => {
        event.preventDefault();
        showContent(pembelianContent);
    });

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready
    });