.<x-dashboard.app title="Ubah Barang Rusak">
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Ubah Barang Rusak</h3>
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
                      <form action="{{ route('admin.barang-rusak.update', $barangRusak) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="row">
                          <div class="col-sm-6">
                            <x-dashboard.input.form-input
                              label="Nama Barang"
                              name="nama_barang"
                              placeholder="Masukan Nama Barang..."
                              value="{{ old('nama_barang', $barangRusak->nama_barang) }}"
                            />
                          </div>
                          <div class="col-md-3">
                            <x-dashboard.input.form-input
                              label="Barcode"
                              name="barcode"
                              placeholder="Masukan Barcode Barang..."
                              value="{{ old('barcode', $barangRusak->barcode) }}"
                            />
                          </div>
                        </div>
                        <div class="my-4">
                          <button class="btn btn-primary">Camera</button>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <x-dashboard.input.form-input
                              label="Qantity Pcs"
                              name="quantity_pcs"
                              type="number"
                              placeholder="Masukan Quantity Pcs Barang..."
                              value="{{ old('quantity_pcs', $barangRusak->quantity_pcs) }}"
                            />
                          </div>
                          <div class="col-md-2">
                            <x-dashboard.input.form-input
                              label="Qantity Carton"
                              name="quantity_carton"
                              type="number"
                              placeholder="Masukan Quantity Carton Barang..."
                              value="{{ old('quantity_carton', $barangRusak->quantity_carton) }}"
                            />
                          </div>
                          <div class="col-md-4">
                            <x-dashboard.input.form-input
                              label="Tanggal Expired"
                              name="tanggal_expired"
                              type="date"
                              placeholder="Masukan Tanggal Expired Barang..."
                              value="{{ old('tanggal_expired', $barangRusak->tanggal_expired) }}"
                            />
                          </div>
                          <div class="col-md-4">
                            <x-dashboard.input.form-input
                              label="Tanggal Retur"
                              name="tanggal_retur"
                              type="date"
                              placeholder="Masukan Tanggal Retur Barang..."
                              value="{{ old('tanggal_retur', $barangRusak->tanggal_retur) }}"
                            />
                          </div>
                          <div class="col-md-12">
                            <x-dashboard.input.form-textarea
                              label="Alasan Retur"
                              name="reasson_retur"
                              placeholder="Masukan Tanggal Retur Barang..."
                              value="{{ old('tanggal_retur', $barangRusak->tanggal_retur) }}"
                            >
                            {{ old('reasson_retur', $barangRusak->reasson_retur) }}
                            </x-dashboard.input.form-textarea>
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

  <x-slot:scriptOptional>
    <script>
      const inputFile = document.querySelector('#foto');
      const previewImage = document.getElementById('image-profile-preview');

      inputFile.addEventListener('change', function() {
        const file = this.files[0];
        if(file) {
          const reader = new FileReader();

          reader.addEventListener('load', function() {
            previewImage.src = reader.result;
          });

          reader.readAsDataURL(file);
        }
      });

    </script>
  </x-slot:scriptOptional>
</x-dashboard.app>
