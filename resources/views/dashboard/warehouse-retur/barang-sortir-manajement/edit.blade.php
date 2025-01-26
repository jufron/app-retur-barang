.<x-dashboard.app title="Ubah Barang Sortir">
  <x-slot:styleOptional>

    {{-- ? toaslify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  </x-slot:styleOptional>

  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Ubah Barang Sortir</h3>
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
                    <form id="form" action="{{ route('wr.barang-sortir.update', $barangSortir) }}" method="post" data-url-search="{{ route('wr.barang-sortir.search') }}">
                      @method('patch')
                      @csrf
                      @error('barang_id')
                      <div class="col-md-6">
                        <div class="alert alert-danger alert-dismissible show fade">
                          {{ $message }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                      @enderror
                      <input type="hidden" name="barang_id" id="barang_id" value="{{ $barangSortir->barang_id }}">
                      <div class="row">
                        <div class="col-sm-6">
                          <x-dashboard.input.form-input
                            label="Nama Barang"
                            name="nama_barang"
                            placeholder="Masukan Nama Barang..."
                            value="{{ old('nama_barang', $barangSortir->barang->nama_barang) }}"
                            :disable="true"
                          />
                        </div>
                        <div class="col-sm-4">
                          <x-dashboard.input.form-input
                            label="Kategory"
                            name="kategory"
                            placeholder="Masukan Kategory Barang..."
                            value="{{ old('kategory', $barangSortir->barang->kategory->name) }}"
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
                          value="{{ old('barcode', $barangSortir->barang->kode_barcode) }}"
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
                            value="{{ old('quantity_pcs', $barangSortir->quantity_pcs) }}"
                          />
                        </div>
                        <div class="col-md-2">
                          <x-dashboard.input.form-input
                            label="Qantity Carton"
                            name="quantity_carton"
                            type="number"
                            placeholder="Masukan Quantity Carton Barang..."
                            value="{{ old('quantity_carton', $barangSortir->quantity_carton) }}"
                          />
                        </div>
                        <div class="col-md-4">
                          <x-dashboard.input.form-input
                            label="Tanggal Expired"
                            name="tanggal_expired"
                            type="date"
                            placeholder="Masukan Tanggal Expired Barang..."
                            value="{{ old('tanggal_expired', $barangSortir->tanggal_expired) }}"
                          />
                        </div>
                        <div class="col-md-5">
                          <x-dashboard.input.form-input
                            label="Nomor Nota Retur Barang"
                            name="nomor_nota_retur_barang"
                            placeholder="Masukan Nomor Nota Retur Barang..."
                            value="{{ old('nomor_nota_retur_barang', $barangSortir->nomor_nota_retur_barang) }}"
                          />
                        </div>
                      </div>

                      <button class="btn btn-success mt-4">Perbaharui</button>
                    </form>

                    <x-dashboard.modal.moda-borderles
                      id="show-modal"
                      title="Scanner Barcode Barang Sortir"
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
    {{-- ? lib toaslify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.js"></script>

    <script src="{{ asset('js/barangRusakCreateAndEdit.js') }}"></script>

  </x-slot:scriptOptional>
</x-dashboard.app>
