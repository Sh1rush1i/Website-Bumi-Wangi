// Inisialisasi Three.js
// Ambil elemen container dan data
const container = document.getElementById("three-container");
const imageSrc = container.getAttribute("data-image-src"); // Ambil sumber gambar dari PHP
const videoSrc = container.getAttribute("data-video-src"); // Ambil sumber video dari PHP

// Inisialisasi Three.js
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

// Geometri Sphere untuk 360 View
const sphereGeometry = new THREE.SphereGeometry(500, 60, 40);

// Material Gambar 360
const textureLoader = new THREE.TextureLoader();
const imageMaterial = new THREE.MeshBasicMaterial({
    map: textureLoader.load(imageSrc), // Ganti dengan gambar dari PHP
    side: THREE.BackSide,
});

// Material Video 360
const video = document.createElement("video");
video.src = videoSrc; // Path video dari PHP
video.crossOrigin = "anonymous"; // Untuk menghindari masalah CORS
video.loop = true; // Pastikan video terus mengulang
video.muted = true; // Agar autoplay berfungsi di beberapa browser

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

const videoMaterial = new THREE.MeshBasicMaterial({
    map: videoTexture,
    side: THREE.BackSide,
});

// Mesh Sphere
const sphere = new THREE.Mesh(sphereGeometry, videoMaterial);
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

// Debugging Current Time dan Durasi
setInterval(() => {
    console.log("Current Time:", video.currentTime);
}, 1000);

window.addEventListener("resize", () => {
    const width = container.clientWidth;
    const height = container.clientHeight;

    // Update renderer and camera
    renderer.setSize(width, height);
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
});
