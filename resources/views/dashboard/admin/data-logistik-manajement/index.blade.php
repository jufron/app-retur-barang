<x-dashboard.app title="Daftar Data Logistik">
  <x-slot:styleOptional>
    {{-- ? style sweatalert2 --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/sweetalert2/sweetalert2.min.css') }}">

  </x-slot:styleOptional>

  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Data Logistik Manajement</h3>
      </div>
  </x-slot:header>

  <section class="section">
      <div class="row" id="table-hover-row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">List Data Logistik</h4>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          {{-- <a href="{{ route('logistik.data-logistik.create') }}" class="btn btn-primary mb-4">Tambah Admin Retur</a> --}}

                          <div class="table-responsive">
                              <table class="table table-hover mb-0 table-striped">
                                  <thead>
                                      <tr>
                                          <th>Tanggal</th>
                                          <th>No Nota Retur Barang</th>
                                          <th>Nama Toko</th>
                                          <th>Total Harga</th>
                                          <th>Jumlah Barang</th>
                                          <th>Tanggal Perbaharui</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($dataLogistik as $lo)
                                      <tr>
                                          <td>{{ $lo->tanggal_format }}</td>
                                          <td>{{ $lo->no_nota_retur_barang }}</td>
                                          <td>{{ $lo->nama_toko }}</td>
                                          <td>{{ $lo->total_harga_format }}</td>
                                          <td>{{ $lo->jumlah_barang_format }}</td>
                                          <td>{{ $lo->updated_at }}</td>
                                          <td>
                                            <button id="button-info" class="btn btn-info rounded-4" type="button" data-url="{{ route('admin.data-logistik.show', $lo) }}">
                                              <i class="fa-solid fa-info"></i>
                                            </button>
                                          </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>

                        <x-dashboard.modal.moda-borderles
                          id="show-modal"
                          title="Info Data Logistik"
                          size="large"
                          >
                          <div class="modal-body" id="modal-body-information">

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

    {{-- ? script sweatalert2 --}}
    <script src="{{ asset('mazer/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>

    {{-- ? my script --}}
    <script type="module" src="{{ asset('js/dataLogistik.js') }}"></script>
  </x-slot:scriptOptional>
</x-dashboard.app>
