// Ambil modal
var modal = document.getElementById("myModal");

// Ambil elemen gambar dan elemen modal
var modalImg = document.getElementById("modalImg");

// Fungsi untuk menampilkan modal dengan gambar yang di-klik
function showModal(imgElement) {
    modal.style.display = "block";
    modalImg.src = imgElement.src;
}

// Ambil elemen close dan tambahkan event listener untuk menutup modal
var span = document.getElementsByClassName("close-img")[0];

span.onclick = function() {
    modal.style.display = "none";
}

// Tambahkan event listener untuk menutup modal jika area di luar modal diklik
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}