.<x-dashboard.app title="Tambah Barang Rusak">
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Tambah Barang Rusak</h3>
      </div>
  </x-slot:header>

  <section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                      <form action="{{ route('wr.barang-rusak.store') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-sm-6">
                            <x-dashboard.input.form-input
                              label="Nama Barang"
                              name="nama_barang"
                              placeholder="Masukan Nama Barang..."
                              value="{{ old('nama_barang') }}"
                            />
                          </div>
                          <div class="col-md-3">
                            <x-dashboard.input.form-input
                              label="Barcode"
                              name="barcode"
                              placeholder="Masukan Barcode Barang..."
                              value="{{ old('barcode') }}"
                            />
                          </div>
                        </div>
                        <div class="my-4">
                          <button type="button" class="btn btn-primary" id="barcode-show-modal">
                            <i class="fa-solid fa-camera"></i>
                            <span class="mx-3">Barcode Scanner</span>
                          </button>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <x-dashboard.input.form-input
                              label="Qantity Pcs"
                              name="quantity_pcs"
                              type="number"
                              placeholder="Masukan Quantity Pcs Barang..."
                              value="{{ old('quantity_pcs') }}"
                            />
                          </div>
                          <div class="col-md-2">
                            <x-dashboard.input.form-input
                              label="Qantity Carton"
                              name="quantity_carton"
                              type="number"
                              placeholder="Masukan Quantity Carton Barang..."
                              value="{{ old('quantity_carton') }}"
                            />
                          </div>
                          <div class="col-md-4">
                            <x-dashboard.input.form-input
                              label="Tanggal Expired"
                              name="tanggal_expired"
                              type="date"
                              placeholder="Masukan Tanggal Expired Barang..."
                              value="{{ old('tanggal_expired') }}"
                            />
                          </div>
                          <div class="col-md-4">
                            <x-dashboard.input.form-input
                              label="Tanggal Retur"
                              name="tanggal_retur"
                              type="date"
                              placeholder="Masukan Tanggal Retur Barang..."
                              value="{{ old('tanggal_retur') }}"
                            />
                          </div>
                          <div class="col-md-6">
                            <x-dashboard.input.form-select
                              label="Alasan Retur"
                              name="reasson_retur_id"
                              :model="$reassonRetur"
                              :selected="old('reasson_retur_id')"
                            />
                          </div>
                        </div>

                        <button class="btn btn-success mt-4">Perbaharui</button>
                      </form>

                      <x-dashboard.modal.moda-borderles
                        id="show-modal"
                        title="Scanner Barcode Barang Rusak"
                        size="large"
                        >
                        <div class="modal-body d-flex flex-column align-items-center justify-content-center">
                          <video id="camera-stream" autoplay playsinline class="mb-3" style="max-width: 100%; height: auto;"></video>
                          <p class="text-center">Detected Barcode: <span id="barcode-result">None</span></p>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </x-dashboard.modal.moda-borderles>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <x-slot:scriptOptional>

  <script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.js"></script>

  <script src="{{ asset('js/barcodeScannerCamera.js') }}"></script>

  </x-slot:scriptOptional>
</x-dashboard.app>
