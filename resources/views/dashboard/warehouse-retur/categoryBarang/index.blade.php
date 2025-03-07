<x-dashboard.app title="Daftar Kategori Barang">
  <x-slot:styleOptional>
    {{-- ? style sweatalert2 --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/sweetalert2/sweetalert2.min.css') }}">

  </x-slot:styleOptional>

  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Kategori Barang Manajement</h3>
      </div>
  </x-slot:header>

  <section class="section">
      <div class="row" id="table-hover-row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">List Kategory Barang</h4>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <a href="{{ route('wr.kategory-barang.create') }}" class="btn btn-primary mb-4">Tambah Kategori Barang</a>
                          <div class="table-responsive">
                              <table class="table table-hover mb-0 table-striped">
                                  <thead>
                                      <tr>
                                          <th>Nama Kategori</th>
                                          <th>Tanggal Buat</th>
                                          <th>Tanggal Perbaharui</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($kategory as $kt)
                                      <tr>
                                          <td>{{ $kt->name }}</td>
                                          <td>{{ $kt->created_at }}</td>
                                          <td>{{ $kt->updated_at }}</td>
                                          <td>
                                            <form id="form-delete" action="{{ route('wr.kategory-barang.destroy', $kt) }}" method="post">
                                              @method('delete')
                                              @csrf
                                              <button id="button-info" class="btn btn-info rounded-4" type="button" data-url="{{ route('wr.kategory-barang.show', $kt) }}">
                                                <i class="fa-solid fa-info"></i>
                                              </button>
                                              <a href="{{ route('wr.kategory-barang.edit', $kt) }}" class="btn icon btn-warning text-white rounded-4">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                              </a>
                                              <button id="button-delete" class="btn btn-danger rounded-4" type="button">
                                                <i class="fa-solid fa-trash-can"></i>
                                              </button>
                                            </form>
                                          </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>

                        <x-dashboard.modal.moda-borderles
                          id="show-modal"
                          title="Info Kategori Barang"
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
    <script type="module" src="{{ asset('js/kategory.js') }}"></script>
  </x-slot:scriptOptional>
</x-dashboard.app>
