
    document.addEventListener("DOMContentLoaded", function() {
        // Dapatkan input pencarian
        const searchInput = document.getElementById('searchInput');
        
        // Tambahkan event listener untuk input pencarian
        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase(); // Ambil nilai input dan ubah ke huruf kecil
            
            // Dapatkan semua produk
            const products = document.querySelectorAll('.box');
            
            // Iterasi melalui setiap produk
            products.forEach(product => {
                const productName = product.querySelector('h3').textContent.toLowerCase(); // Ambil nama produk dan ubah ke huruf kecil
                
                // Periksa apakah nama produk mengandung kata kunci pencarian
                if (productName.includes(searchTerm)) {
                    product.style.display = 'block'; // Tampilkan produk jika cocok dengan pencarian
                } else {
                    product.style.display = 'none'; // Sembunyikan produk jika tidak cocok dengan pencarian
                }
            });
        });
    });