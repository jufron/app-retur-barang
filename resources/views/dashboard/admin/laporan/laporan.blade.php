<x-dashboard.app title="Laporan">
  <x-slot:styleOptional>
    {{-- ? toaslify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  </x-slot:styleOptional>

  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Laporan</h3>
      </div>
  </x-slot:header>

  <section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                      <a href="{{ route('admin.laporan.kategory') }}" class="btn btn-success mt-4">Cetak Laporan Kategory (CSV)</a>

                      <hr class="my-5">
                      <h4 class="card-title">Laporan Logistik</h4>

                      <form action="{{ route('admin.laporan.logistik') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="form-group col-md-2">
                            <label class="mb-2 mt-4" for="Tahun">Tahun</label>
                            <input
                              class="form-control @error('tahun') is-invalid @enderror"
                              type="number"
                              min="2020"
                              max="2099"
                              step="1"
                              value="2020"
                              name="tahun"
                            />
                            @error('tahun')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="col-md-4">
                            <x-dashboard.input.form-select-search
                              label="Bulan"
                              name="bulan"
                              :model="$bulan"
                              :selected="old('bulan')"
                            />
                          </div>

                        </div>
                        <button class="btn btn-success mt-4">Cetak Laporan Logistik (CSV)</button>
                      </form>

                      <hr class="my-5">
                      <h4 class="card-title">Laporan Barang</h4>

                      <form action="{{ route('admin.laporan.barang') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="form-group col-md-2">
                            <label class="mb-2 mt-4" for="Tahun">Tahun</label>
                            <input
                              class="form-control @error('tahun') is-invalid @enderror"
                              type="number"
                              min="2020"
                              max="2099"
                              step="1"
                              value="2020"
                              name="tahun"
                            />
                            @error('tahun')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="col-md-4">
                            <x-dashboard.input.form-select-search
                              label="Bulan"
                              name="bulan"
                              :model="$bulan"
                              :selected="old('bulan')"
                            />
                          </div>

                        </div>
                        <button class="btn btn-success mt-4">Cetak Laporan Barang (CSV)</button>
                      </form>

                      <hr class="my-5">
                      <h4 class="card-title">Laporan Barang Rusak</h4>

                      <form action="{{ route('admin.laporan.barang-rusak') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="form-group col-md-2">
                            <label class="mb-2 mt-4" for="Tahun">Tahun</label>
                            <input
                              class="form-control @error('tahun') is-invalid @enderror"
                              type="number"
                              min="2020"
                              max="2099"
                              step="1"
                              value="2020"
                              name="tahun"
                            />
                            @error('tahun')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="col-md-4">
                            <x-dashboard.input.form-select-search
                              label="Bulan"
                              name="bulan"
                              :model="$bulan"
                              :selected="old('bulan')"
                            />
                          </div>

                        </div>
                        <button class="btn btn-success mt-4">Cetak Laporan Barang Rusak (CSV)</button>
                      </form>

                      <hr class="my-5">
                      <h4 class="card-title">Laporan Barang Sortir</h4>

                      <form action="{{ route('admin.laporan.barang-sortir') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="form-group col-md-2">
                            <label class="mb-2 mt-4" for="Tahun">Tahun</label>
                            <input
                              class="form-control @error('tahun') is-invalid @enderror"
                              type="number"
                              min="2020"
                              max="2099"
                              step="1"
                              value="2020"
                              name="tahun"
                            />
                            @error('tahun')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="col-md-4">
                            <x-dashboard.input.form-select-search
                              label="Bulan"
                              name="bulan"
                              :model="$bulan"
                              :selected="old('bulan')"
                            />
                          </div>

                        </div>
                        <button class="btn btn-success mt-4">Cetak Laporan Barang Sortir (CSV)</button>
                      </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  
  <x-slot:scriptOptional>
    {{-- ? lib toaslify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @if (session('error'))
    <script> 
    function popupAlert (obj) {
      const {
        text = "Data Berhasil Ditemukan",
        gravity = 'top',
        position = 'center',
        background = "linear-gradient(to right, #00b09b, #96c93d)"
      } = obj;

      Toastify({
          text,
          duration: 4000,
          destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity,
          position,
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
              background,
          },
          onClick: function(){} // Callback after click
      }).showToast();
    }

    document.addEventListener('DOMContentLoaded', function() {
      popupAlert({
          text: "{{ session('error') }}",
          background: "linear-gradient(135deg, #EF2064, #A01326)"
      });
    });
    </script>
    @endif
  </x-slot:scriptOptional>
</x-dashboard.app>
