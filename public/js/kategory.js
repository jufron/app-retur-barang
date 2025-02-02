import getInfo from './tableScript.js';

getInfo(function (data, modalBody) {
    const element = `
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Nama Kategori Barang
                    </div>
                    <div class="col-md-8">
                        ${data.nama}
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
});
