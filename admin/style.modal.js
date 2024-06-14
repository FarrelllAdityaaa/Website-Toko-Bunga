// Dapatkan elemen modal dan tombol untuk membuka modal
var modal = document.getElementById("modal");
var addModalBtn = document.getElementById("addModalBtn");

// Dapatkan elemen span untuk menutup modal
var closeBtn = document.getElementsByClassName("close")[0];

// Ketika pengguna mengklik tombol, buka modal
addModalBtn.onclick = function() {
    modal.style.display = "block";
}

// Ketika pengguna mengklik tombol (x), tutup modal
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// Ketika pengguna mengklik di luar modal, tutup modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}