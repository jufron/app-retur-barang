import getInfo from './tableScript.js';

getInfo(function (data, modalBody) {
    const element = `
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Tanggal
                    </div>
                    <div class="col-md-8">
                        ${data.tanggal}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Nomor Nota Retur Barang
                    </div>
                    <div class="col-md-8">
                        ${data.no_nota_retur_barang}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Nama Toko
                    </div>
                    <div class="col-md-8">
                        ${data.nama_toko}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Total Harga
                    </div>
                    <div class="col-md-8">
                        ${data.total_harga}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        Jumlah Barang
                    </div>
                    <div class="col-md-8">
                        ${data.jumlah_barang}
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
