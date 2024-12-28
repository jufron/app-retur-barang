<x-dashboard.app title="Tambah Data Logistik">
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Tambah Data Logistik</h3>
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
                      <form action="{{ route('logistik.data-logistik.store') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-sm-3">
                            <x-dashboard.input.form-input
                              label="tanggal"
                              type="date"
                              name="tanggal"
                              placeholder="Masukan Tanggal..."
                              value="{{ old('tanggal') }}"
                            />
                          </div>
                          <div class="col-sm-5">
                            <x-dashboard.input.form-input
                              label="Nama Toko"
                              name="nama_toko"
                              placeholder="Masukan Nama Toko..."
                              value="{{ old('nama_toko') }}"
                            />
                          </div>
                          <div class="col-sm-2">
                            <x-dashboard.input.form-input
                              label="Total Harga"
                              name="total_harga"
                              placeholder="Masukan Total Harga..."
                              value="{{ old('total_harga') }}"
                            />
                          </div>
                          <div class="col-sm-2">
                            <x-dashboard.input.form-input
                              label="Jumlah Barang"
                              name="jumlah_barang"
                              placeholder="Masukan Jumlah Barang..."
                              value="{{ old('jumlah_barang') }}"
                            />
                          </div>
                        </div>

                        <button class="btn btn-success mt-4">Simpan</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <x-slot:scriptOptional>
    {{-- <script>
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

    </script> --}}
  </x-slot:scriptOptional>
</x-dashboard.app>
