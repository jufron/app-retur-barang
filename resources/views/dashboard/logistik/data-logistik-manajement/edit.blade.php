.<x-dashboard.app title="Ubah Data Logistik">
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Ubah Data Logistik</h3>
      </div>
  </x-slot:header>

  <section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                      <form action="{{ route('logistik.data-logistik.update', $dataLogistik) }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row">
                          <div class="col-md-5">
                            <x-dashboard.input.form-input
                              label="Nomor Nota Retur Barang"
                              name="no_nota_retur_barang"
                              placeholder="Masukan Nomor Nota Retur Barang..."
                              value="{{ old('no_nota_retur_barang', $dataLogistik->no_nota_retur_barang) }}"
                            />
                          </div>
                          <div class="col-sm-3">
                            <x-dashboard.input.form-input
                              label="tanggal"
                              type="date"
                              name="tanggal"
                              placeholder="Masukan Tanggal..."
                              value="{{ old('tanggal', $dataLogistik->tanggal) }}"
                            />
                          </div>
                          <div class="col-sm-5">
                            <x-dashboard.input.form-input
                              label="Nama Toko"
                              name="nama_toko"
                              placeholder="Masukan Nama Toko..."
                              value="{{ old('nama_toko', $dataLogistik->nama_toko) }}"
                            />
                          </div>
                          <div class="col-sm-2">
                            <x-dashboard.input.form-input
                              label="Total Harga"
                              name="total_harga"
                              placeholder="Masukan Total Harga..."
                              value="{{ old('total_harga', $dataLogistik->total_harga) }}"
                            />
                          </div>
                          <div class="col-sm-2">
                            <x-dashboard.input.form-input
                              label="Jumlah Barang"
                              name="jumlah_barang"
                              placeholder="Masukan Jumlah Barang..."
                              value="{{ old('jumlah_barang', $dataLogistik->jumlah_barang) }}"
                            />
                          </div>
                        </div>

                        <button class="btn btn-success mt-4">Perbaharui</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

</x-dashboard.app>
