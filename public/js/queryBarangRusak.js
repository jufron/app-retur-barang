const input_barcode = document.getElementById('barcode');
const urlSearch = document.getElementById('form').getAttribute('data-url-search');
const inputNamaBarang = document.getElementById('nama_barang');
const inputKategory = document.getElementById('kategory');
const inputBarangId = document.getElementById('barang_id');

function popupAlert (obj) {
    const {
        text = "Data Berhasil Ditemukan",
        gravity = 'top',
        position = 'center',
        background = "linear-gradient(to right, #00b09b, #96c93d)"
    } = obj;

    Toastify({
        text,
        duration: 4000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity,
        position,
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background,
        },
        onClick: function(){} // Callback after click
    }).showToast();
}

function render (data) {
    const {id, nama_barang, kode_barcode, kategory} = data.data;
    inputBarangId.value = id;
    inputNamaBarang.value = nama_barang;
    inputKategory.value = kategory;

    popupAlert({
        text: "Data Berhasil Ditemukan",
    })
}

input_barcode.addEventListener('input', function() {
    alert(input_barcode.value);
    const nomor_barcode = inputBarcode.value;

    if (nomor_barcode.length === 13) {
        fetch(`${urlSearch}?keyword=${nomor_barcode}`)
            .then(response => {
                if (!response.ok) {
                if (response.status === 404) {
                    popupAlert({
                        text: "Data Tidak Ditemukan",
                        background: "linear-gradient(135deg, #EF2064, #A01326)"
                    });
                }

                return response.json().then(errorData => {
                    throw new Error(errorData.message || "Terjadi kesalahan!");
                });
                }
                return response.json();
            })
            .then(data => {
                render(data);
            })
            .catch(error => {
                popupAlert({
                    text: error.message || "Error Gagal mengambil data",
                    background: "linear-gradient(135deg, #EF2064, #A01326)"
                })
                console.error("Error:", error);
            });
    } else {
        hasilDiv.innerHTML = ''; // Kosongkan hasil jika tidak 13 digit
    }
});