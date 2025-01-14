.<x-dashboard.app title="Ubah Barang">
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Ubah Barang</h3>
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
                      <form action="{{ route('wr.barang.update', $barang) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="row">
                          <div class="col-sm-6">
                            <x-dashboard.input.form-input
                              label="Nama Barang"
                              name="nama_barang"
                              placeholder="Masukan Nama Barang..."
                              value="{{ old('nama_barang', $barang->nama_barang) }}"
                            />
                          </div>
                          <div class="col-md-4">
                            <x-dashboard.input.form-input
                              label="Barcode"
                              name="kode_barcode"
                              id="barcode"
                              placeholder="Masukan Kode Barcode Barang..."
                              value="{{ old('kode_barcode', $barang->kode_barcode) }}"
                            />
                          </div>
                        </div>
                        <div class="my-4">
                          <button type="button" class="btn btn-primary" id="barcode-show-modal">
                            <i class="fa-solid fa-camera"></i>
                            <span class="mx-3">Barcode Scanner</span>
                          </button>
                        </div>

                        <div class="col-md-5">
                          <x-dashboard.input.form-select
                            label="Kategory"
                            name="kategory_id"
                            :model="$kategory"
                            :selected="old('kategory_id', $barang->kategory_id)"
                          />
                        </div>

                        <div class="col-md-12">
                          <x-dashboard.input.form-textarea
                            name="deskripsi_barang"
                            label="Deskripsi Barang"
                            placeholder="Masukan Deskripsi Barang...">
                            {{ old('deskripsi_barang', $barang->deskripsi_barang) }}
                          </x-dashboard.input.form-textarea>
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
