const buttonInfoAdminRetur = document.querySelectorAll('#button-info');

const myModal = new bootstrap.Modal(document.getElementById('show-modal'));
const modalBody = document.querySelector('#modal-body-information');

const formDeleteAdminRetur = document.querySelectorAll('#form-delete');
const buttonDeleteAdminRetur = document.querySelectorAll('#button-delete');


// ? delete
buttonDeleteAdminRetur.forEach((button, index) => {
    button.addEventListener('click', () => {
        Swal.fire({
            icon: "warning",
            title : 'Hapus Data',
            text: 'anda yakin ingin menghapus data tersebut?',            
            showCancelButton: true,
            confirmButtonColor: "#d33", // Warna merah untuk tombol Hapus
            cancelButtonColor: "#3085d6", // Warna biru untuk tombol Batal
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                formDeleteAdminRetur[index].submit();
            }
        });
    });
});


// ? info
const getInfo = (callback) => {
    buttonInfoAdminRetur.forEach((button, index) => {
        button.addEventListener('click', () => {
            const dataUrl = button.getAttribute('data-url');

            myModal.show();
    
            getData(dataUrl, callback);
            renderLoading(true);        
        });
    });
}

const getData = (dataUrl, callback) => {
    fetch(dataUrl)
        .then(ress => {
            if (!ress.ok) {
                throw {
                    status: ress.status,
                    message: ress.statusText || 'Unknown error'
                };
            }
            return ress.json();
        })
        .then(data => {
            renderLoading(false);
            callback(
                data, 
                modalBody
            );
            // renderHTML(data);
        })
        .catch(err => {
            renderLoading(false);
            console.error('Fetch error:', err);
            renderErrorMessage(
                `An error occurred: ${err.message}`,
                `${err.status}`
            );
        });
};

const renderErrorMessage = (message, statusCode) => {
    modalBody.innerHTML = `
        <h1 class="text-center mt-3">${statusCode}</h1>
        <div class="text-center mb-3">${message}</div>
    `;
};

const renderHTML = (data) => {
    const element = `
        <img src="${data.foto}" alt="User Photo" class="img-fluid mb-3 rounded-4" style="width: 150px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Rolle
                    </div>
                    <div class="col-md-8">
                        ${data.rolle[0]}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Nama
                    </div>
                    <div class="col-md-8">
                        ${data.name}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Username
                    </div>
                    <div class="col-md-8">
                        ${data.username}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Email
                    </div>
                    <div class="col-md-8">
                        ${data.email}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Telepon
                    </div>
                    <div class="col-md-8">
                        ${data.telepon}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Tanggal Buat
                    </div>
                    <div class="col-md-8">
                        ${data.created_at}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Tanggal Perbaharui
                    </div>
                    <div class="col-md-8">
                        ${data.updated_at}
                    </div>
                </div>
            </li>
        </ul>
    `;
    modalBody.innerHTML = element;
};

const renderLoading = (data) => {
    if (data) {
        const element = `
            <div class="d-flex justify-content-center">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        `;
        modalBody.innerHTML = element;
    } else {
        modalBody.innerHTML = '';
    }
};

export default getInfo;