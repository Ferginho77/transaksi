document.addEventListener('DOMContentLoaded', function () {
    const BeliModal = document.getElementById('BeliModal');

    BeliModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const NamaBarang = button.getAttribute('data-nama');
        const Harga = button.getAttribute('data-harga');
        const IdBarang = button.getAttribute('data-id');
        const IdUser = button.getAttribute('data-user');

        BeliModal.querySelector('#NamaBarang').innerText = NamaBarang;
        BeliModal.querySelector('#Harga').innerText = 'Rp ' + Harga.toLocaleString('id-ID');
        BeliModal.querySelector('#IdBarang').value = IdBarang;
        BeliModal.querySelector('#IdUser').value = IdUser;
    });
});


document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('BeliModal');
        const jumlahInput = document.getElementById('jumlah');
        const totalHargaInput = document.getElementById('TotalHarga');
        const totalHargaText = document.getElementById('TotalHargaText');
        const plusButton = document.getElementById('plus');
        const minusButton = document.getElementById('minus');
        let hargaSatuan = 1;

        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const namaBarang = button.getAttribute('data-nama');
            hargaSatuan = parseInt(button.getAttribute('data-harga')) || 1;
            const idBarang = button.getAttribute('data-id');

            modal.querySelector('#NamaBarang').innerText = namaBarang;
            modal.querySelector('#Harga').innerText = 'Rp ' + hargaSatuan;
            modal.querySelector('#TotalHargaText').innerText = 'Rp ' + hargaSatuan.toLocaleString('id-ID');
            modal.querySelector('#TotalHarga').value = hargaSatuan;
            modal.querySelector('#jumlah').value = 1;
        });

        // Fungsi untuk menghitung total harga
        function updateTotal() {
            let jumlah = parseInt(jumlahInput.value) || 1;
            let totalHarga = jumlah * hargaSatuan;
            totalHargaText.innerText = 'Rp ' + totalHarga.toLocaleString('id-ID');
            totalHargaInput.value = totalHarga; 
        }

        // Code Untuk Tambah
        plusButton.addEventListener('click', function () {
            jumlahInput.value = parseInt(jumlahInput.value) + 1;
            updateTotal();
        });

      //Code Untuk Minus
        minusButton.addEventListener('click', function () {
            if (parseInt(jumlahInput.value) > 1) {
                jumlahInput.value = parseInt(jumlahInput.value) - 1;
                updateTotal();
            }
        });
    });