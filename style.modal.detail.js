document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal');
    const closeModal = document.querySelector('.close');
    const detailButtons = document.querySelectorAll('.detail-btn');

    detailButtons.forEach(button => {
        button.addEventListener('click', function () {
            const kodeProduk = this.getAttribute('data-kode');

            
            fetch(`modal.detail.php?kode_produk=${kodeProduk}`)
                .then(response => response.text())
                .then(data => {
                    
                    document.querySelector('.modal-content .table-container').innerHTML = data;
                    modal.style.display = 'block';
                })
                .catch(error => console.error('Error fetching product details:', error));
        });
    });

    closeModal.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});
