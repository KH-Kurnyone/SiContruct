//JavaScript untuk membuka/tutup sidebar
const sidebar = document.getElementById("sidebar");
const hamburger = document.getElementById("hamburger");
const closeSidebar = document.getElementById("closeSidebar");
// const sectionDashboard = document.getElementById("sectionDashboard");
const sectionDashboard = document.querySelector(".sectionDashboard");


// Fungsi untuk toggle sidebar
function toggleSidebar() {
    sidebar.classList.toggle("-translate-x-full");

    // Hanya di layar lg (>= 1024px), toggle class lg:ms-72
    if (window.innerWidth >= 1024) {
        hamburger.classList.toggle("lg:ms-72");
    }
    if (window.innerWidth >= 1024) {
        sectionDashboard.classList.toggle("lg:ml-[285px]");
    }
}

// Fungsi untuk menutup sidebar di layar lg
function closeSidebarOnResize() {
    if (window.innerWidth >= 1024) {
        sidebar.classList.remove("-translate-x-full"); // Pastikan sidebar tetap terbuka di layar besar
        sidebar.classList.remove("lg:hidden");
    } else {
        sidebar.classList.add("-translate-x-full"); // Tutup sidebar di layar kecil jika sebelumnya terbuka
        sidebar.classList.add("lg:hidden");
    }
}

// Event listener untuk klik hamburger
hamburger.addEventListener("click", toggleSidebar);

// Event listener untuk perubahan ukuran layar
window.addEventListener("resize", closeSidebarOnResize);

// Pastikan sidebar tertutup saat pertama kali di layar kecil
closeSidebarOnResize();

// Menutup sidebar ketika tombol closeSidebar diklik
if (closeSidebar) {
    closeSidebar.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");

        // Pastikan class "lg:ms-72" dikembalikan jika sidebar tertutup di layar lg
        if (window.innerWidth >= 1024) {
            hamburger.classList.add("lg:ms-72");
        }
        if (window.innerWidth >= 1024) {
            sectionDashboard.classList.add("lg:ml-[285px]");
        }
    });
}

// Membuka sidebar ketika tombol hamburger diklik
// hamburger.addEventListener("click", () => {
//     sidebar.classList.toggle("-translate-x-full");
//     sidebar.classList.remove("translate-x");
// });
// document.addEventListener("click", (event) => {
//     if (!sidebar.contains(event.target) && !hamburger.contains(event.target)) {
//         sidebar.classList.add("-translate-x-full");
//     }
// });

// Dropdown Header
document.addEventListener("DOMContentLoaded", function () {
    const dropdownHeader = document.getElementById("dropdownH");
    const cardHeader = document.getElementById("cardH");
    const chevronHeader = document.getElementById("chevronH");

    dropdownHeader.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah perilaku default tautan
        const isHidden = cardHeader.classList.contains("hidden");

        if (isHidden) {
            cardHeader.classList.remove("hidden");
            setTimeout(() => {
                cardHeader.classList.remove("opacity-0");
            }, 10); // Delay for the fade-in effect
            // chevronHeader.classList.remove("fa-chevron-down");
            // chevronHeader.classList.add("fa-chevron-up");
            chevronHeader.classList.add("rotate-180"); // Rotate chevron
        } else {
            cardHeader.classList.add("opacity-0");
            setTimeout(() => {
                cardHeader.classList.add("hidden");
            }, 300); // Delay for the fade-out effect
            // chevronHeader.classList.remove("fa-chevron-up");
            // chevronHeader.classList.add("fa-chevron-down");
            chevronHeader.classList.remove("rotate-180"); // Reset rotation
        }
    });
});

//Dropdown Master Data
document
    .getElementById("master-data")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default link behavior

        // Toggle dropdown menu
        const dropdown = document.getElementById("dropdown-menu");
        const icon = document.getElementById("chevron-icon");

        if (dropdown.classList.contains("hidden")) {
            // If the dropdown is hidden, we open it
            dropdown.classList.remove("hidden");
            dropdown.style.maxHeight = dropdown.scrollHeight + "px"; // Set maxHeight for animation
            // Change icon to up
            icon.classList.add("rotate-180");
        } else {
            // If the dropdown is open, we close it
            dropdown.style.maxHeight = "0"; // Set maxHeight to 0 for closing animation
            // Change icon to down
            icon.classList.remove("rotate-180");
            // Wait for the closing animation to finish before hiding it completely
            dropdown.addEventListener(
                "transitionend",
                function () {
                    dropdown.classList.add("hidden"); // Add hidden class after the transition
                },
                { once: true }
            ); // Ensure the event is only fired once
        }
    });
    
