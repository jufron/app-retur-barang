.<x-dashboard.app title="Tambah Barang Sortir">
  <x-slot:styleOptional>
    {{-- ? input select choice filter --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/choices.js/public/assets/styles/choices.css') }}">

    {{-- ? toaslify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  </x-slot:styleOptional>
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Tambah Barang Sortir</h3>
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
                      <form id="form" action="{{ route('admin.barang-sortir.store') }}" method="post" data-url-search="{{ route('admin.barang-sortir.search') }}">
                        @csrf
                        @error('barang_id')
                        <div class="col-md-6">
                          <div class="alert alert-danger alert-dismissible show fade">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </div>
                        @enderror
                        <input type="hidden" name="barang_id" id="barang_id">
                        <div class="row">
                          <div class="col-sm-6">
                            <x-dashboard.input.form-input
                              label="Nama Barang"
                              name="nama_barang"
                              placeholder="Masukan Nama Barang..."
                              value="{{ old('nama_barang') }}"
                              :disable="true"
                            />
                          </div>
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              label="Kategory"
                              name="kategory"
                              placeholder="Masukan Kategory Barang..."
                              value="{{ old('kategory') }}"
                              :disable="true"
                            />
                          </div>

                        </div>
                        <div class="col-md-4">
                          <x-dashboard.input.form-input
                            label="Kode Barcode"
                            name="barcode"
                            type="number"
                            placeholder="Masukan Barcode Barang..."
                            value="{{ old('barcode') }}"
                          />
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
                          <div class="col-md-5">
                            <x-dashboard.input.form-input
                              label="Nomor Nota Retur Barang"
                              name="nomor_nota_retur_barang"
                              placeholder="Masukan Nomor Nota Retur Barang..."
                              value="{{ old('nomor_nota_retur_barang') }}"
                            />
                          </div>
                        </div>

                        <button class="btn btn-success mt-4">Simpan</button>
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

    {{-- ? lib select choices --}}
    <script src="{{ asset('mazer/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/form-element-select.js') }}"></script>

    {{-- ? lib toaslify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.js"></script>

    <script src="{{ asset('js/barangSortirCreateAndEdit.js') }}"></script>

  </x-slot:scriptOptional>
</x-dashboard.app>
