const container = document.getElementById("three-container");
const imageSrc = container.getAttribute("data-image-src");
const videoSrc = container.getAttribute("data-video-src");

// Geometri Sphere untuk 360 View
const sphereGeometry = new THREE.SphereGeometry(500, 60, 40);

let material; // Variabel untuk menyimpan material yang akan digunakan

if (imageSrc) {
    // Jika imageSrc tersedia, gunakan gambar sebagai material
    const textureLoader = new THREE.TextureLoader();
    material = new THREE.MeshBasicMaterial({
        map: textureLoader.load(imageSrc),
        side: THREE.BackSide,
    });
    console.log("Menampilkan gambar 360.");
} else if (videoSrc) {
    // Jika videoSrc tersedia, gunakan video sebagai material
    const video = document.createElement("video");
    video.src = videoSrc;
    video.crossOrigin = "anonymous";
    video.loop = true;
    video.muted = true;

    video.addEventListener("loadeddata", () => {
        console.log("Video loaded. Duration:", video.duration);
        video.play(); // Putar video setelah data siap
    });

    video.addEventListener("ended", () => {
        console.log("Video ended. Restarting...");
        video.play(); // Memastikan loop berfungsi
    });

    const videoTexture = new THREE.VideoTexture(video);
    videoTexture.minFilter = THREE.LinearFilter;
    videoTexture.magFilter = THREE.LinearFilter;
    videoTexture.format = THREE.RGBFormat;

    material = new THREE.MeshBasicMaterial({
        map: videoTexture,
        side: THREE.BackSide,
    });
    console.log("Menampilkan video 360.");
} else {
    console.error("Tidak ada sumber gambar atau video yang tersedia.");
}

// Jika ada material, tambahkan ke mesh dan render scene
if (material) {
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(
        75,
        container.clientWidth / container.clientHeight,
        0.1,
        1000
    );
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Mesh Sphere
    const sphere = new THREE.Mesh(sphereGeometry, material);
    scene.add(sphere);

    // Kontrol Orbit
    const controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableZoom = true;
    controls.enablePan = false;
    controls.minDistance = 1;
    controls.maxDistance = 1000;

    // Atur posisi kamera
    camera.position.set(0, 0, 0.1);

    // Animasi
    function animate() {
        requestAnimationFrame(animate);
        controls.update();
        renderer.render(scene, camera);
    }
    animate();

    // Penanganan Resize
    window.addEventListener("resize", () => {
        const width = container.clientWidth;
        const height = container.clientHeight;

        renderer.setSize(width, height);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
    });
}
