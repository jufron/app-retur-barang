import getInfo from './tableScript.js';

getInfo(function (data, modalBody) {
    const element = `
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">
                        Nama Barang
                    </div>
                    <div class="col-md-3">
                        ${data.nama_barang}
                    </div>
                    <div class="col-md-3 font-weight-bold">
                        Barcode
                    </div>
                    <div class="col-md-3">
                        ${data.barcode}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">
                        Nomor Nota Retur Barang
                    </div>
                    <div class="col-md-9">
                        ${data.nomor_nota_retur_barang}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">
                        Quantity Pcs
                    </div>
                    <div class="col-md-3">
                        ${data.quantity_pcs}
                    </div>
                    <div class="col-md-3 font-weight-bold">
                        Quantity Carton
                    </div>
                    <div class="col-md-3">
                        ${data.quantity_carton}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">
                        Tanggal Expired
                    </div>
                    <div class="col-md-3">
                        ${data.tanggal_expired}
                    </div>
                    <div class="col-md-3 font-weight-bold">
                        Tanggal Retur
                    </div>
                    <div class="col-md-3">
                        ${data.tanggal_retur}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">
                        Reasson Retur
                    </div>
                    <div class="col-md-3">
                        ${data.reasson_retur}
                    </div>
                    <div class="col-md-3 font-weight-bold">
                        Nama Penginput
                    </div>
                    <div class="col-md-3">
                        ${data.nama_penginput}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">
                        Tanggal Buat
                    </div>
                    <div class="col-md-3">
                        ${data.created_at}
                    </div>
                    <div class="col-md-3 font-weight-bold">
                        Tanggal Perbaharui
                    </div>
                    <div class="col-md-3">
                        ${data.updated_at}
                    </div>
                </div>
            </li>
        </ul>
    `;
    modalBody.innerHTML = element;
});
