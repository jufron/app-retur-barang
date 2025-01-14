<x-dashboard.app title="Daftar Barang">
  <x-slot:styleOptional>
    {{-- ? style sweatalert2 --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/sweetalert2/sweetalert2.min.css') }}">

  </x-slot:styleOptional>

  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Daftar Barang Manajement</h3>
      </div>
  </x-slot:header>

  <section class="section">
      <div class="row" id="table-hover-row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">List Barang</h4>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <a href="{{ route('wr.barang.create') }}" class="btn btn-primary mb-4">Tambah Barang Retur</a>
                          <div class="table-responsive">
                              <table class="table table-hover mb-0 table-striped">
                                  <thead>
                                      <tr>
                                          <th>Barcode</th>
                                          <th>Nama Barang</th>
                                          <th>Kategory</th>
                                          <th>Deskripsi</th>
                                          <th>Tanggal Buat</th>
                                          <th>Tanggal Perbaharui</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($barang as $b)
                                      <tr>
                                          <td>
                                            <div class="py-2 px-3 bg-white">
                                              {!! $b->barcodeGenerate !!}
                                            </div>
                                            <strong class="d-flex align-items-center justify-content-center">{{ $b->kode_barcode }}</strong>
                                          </td>
                                          <td>{{ $b->nama_barang }}</td>
                                          <td>{{ $b->kategory->name }}</td>
                                          <td>{{ $b->deskripsi_barang_limit }}</td>
                                          <td>{{ $b->created_at }}</td>
                                          <td>{{ $b->updated_at }}</td>
                                          <td>
                                            <form id="form-delete" action="{{ route('wr.barang.destroy', $b) }}" method="post">
                                              @method('delete')
                                              @csrf
                                              <div class="d-flex">
                                                <button id="button-info" class="btn btn-info rounded-4" type="button" data-url="{{ route('wr.barang.show', $b) }}">
                                                  <i class="fa-solid fa-info"></i>
                                                </button>
                                                <a href="{{ route('wr.barang.edit', $b) }}" class="btn icon btn-warning text-white rounded-4">
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
                          title="Info Kategory Barang"
                          size="medium"
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
    <script type="module" src="{{ asset('js/barang.js') }}"></script>
  </x-slot:scriptOptional>
</x-dashboard.app>
