<x-dashboard.app title="Daftar Barang Sortir">
  <x-slot:styleOptional>
    {{-- ? style sweatalert2 --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/sweetalert2/sweetalert2.min.css') }}">

  </x-slot:styleOptional>

  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Barang Sortir Manajement</h3>
      </div>
  </x-slot:header>

  <section class="section">
      <div class="row" id="table-hover-row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">List Barang Sortir</h4>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <a href="{{ route('wa.barang-sortir.create') }}" class="btn btn-primary mb-4">Tambah Admin Retur</a>
                          <div class="table-responsive">
                              <table class="table table-hover mb-0 table-striped">
                                  <thead>
                                      <tr>
                                          <th>Nama Barang</th>
                                          <th>No Nota Retur Barang</th>
                                          <th>Quantity pcs</th>
                                          <th>Quantity Carton</th>
                                          <th>Tanggal Epired</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($barangSortir as $bs)
                                      <tr>
                                          <td>{{ $bs->barang->nama_barang }}</td>
                                          <td>{{ $bs->nomor_nota_retur_barang }}</td>
                                          <td>{{ $bs->quantity_pcs_format }}</td>
                                          <td>{{ $bs->quantity_carton_format }}</td>
                                          <td>{{ $bs->tanggal_expired_format }}</td>
                                          <td>
                                            <form id="form-delete" action="{{ route('wa.barang-sortir.destroy', $bs) }}" method="post">
                                              @method('delete')
                                              @csrf
                                              <div class="d-flex">
                                                <button id="button-info" class="btn btn-info rounded-4" type="button" data-url="{{ route('wa.barang-sortir.show', $bs) }}">
                                                  <i class="fa-solid fa-info"></i>
                                                </button>
                                                <a href="{{ route('wa.barang-sortir.edit', $bs) }}" class="btn icon btn-warning text-white rounded-4">
                                                  <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button id="button-delete" class="btn btn-danger rounded-4" type="button">
                                                  <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                              </div>
                                            </form>
                                          </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>

                        <x-dashboard.modal.moda-borderles
                          id="show-modal"
                          title="Info Barang Sortir"
                          size="extra-large"
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
    <script type="module" src="{{ asset('js/barangSortir.js') }}"></script>

  </x-slot:scriptOptional>
</x-dashboard.app>
