<x-dashboard.app title="Daftar Barang Rusak">
  <x-slot:styleOptional>
    {{-- ? style sweatalert2 --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/sweetalert2/sweetalert2.min.css') }}">

  </x-slot:styleOptional>

  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Barang Rusak Manajement</h3>
      </div>
  </x-slot:header>

  <section class="section">
      <div class="row" id="table-hover-row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">List Barang Rusak</h4>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <a href="{{ route('wr.barang-rusak.create') }}" class="btn btn-primary mb-4">Tambah Admin Retur</a>
                          <div class="table-responsive">
                              <table class="table table-hover mb-0 table-striped">
                                  <thead>
                                      <tr>
                                          <th>Nama Barang</th>
                                          <th>No Nota Retur Barang</th>
                                          <th>Quantity pcs</th>
                                          <th>Quantity Carton</th>
                                          <th>Tanggal Epired</th>
                                          <th>Tanggal Retur</th>
                                          <th>Reasson Retur</th>
                                          <th>Nama Penginput</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($barangRusak as $br)
                                      <tr>
                                          <td>{{ $br->barang->nama_barang }}</td>
                                          <td>{{ $br->nomor_nota_retur_barang }}</td>
                                          <td>{{ $br->quantity_pcs_format }}</td>
                                          <td>{{ $br->quantity_carton_format }}</td>
                                          <td>{{ $br->tanggal_expired_format }}</td>
                                          <td>{{ $br->tanggal_retur_format }}</td>
                                          <td>{{ $br->reassonRetur->name }}</td>
                                          <td>{{ $br->user->name }}</td>
                                          <td>
                                            <form id="form-delete" action="{{ route('wr.barang-rusak.destroy', $br) }}" method="post">
                                              @method('delete')
                                              @csrf
                                              <div class="d-flex">
                                                <button id="button-info" class="btn btn-info rounded-4" type="button" data-url="{{ route('wr.barang-rusak.show', $br) }}">
                                                  <i class="fa-solid fa-info"></i>
                                                </button>
                                                <a href="{{ route('wr.barang-rusak.edit', $br) }}" class="btn icon btn-warning text-white rounded-4">
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
                          title="Info Barang Rusak"
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
    <script type="module" src="{{ asset('js/barangRusak.js') }}"></script>

  </x-slot:scriptOptional>
</x-dashboard.app>
