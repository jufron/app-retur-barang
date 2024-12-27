.<x-dashboard.app title="Ubah Warehouse Asistent">
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Ubah WareHouse Asistent</h3>
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
                      <form action="{{ route('wr.warehouse-asistent.update', $user) }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row">
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              label="Nama"
                              name="name"
                              placeholder="Masukan Nama..."
                              value="{{ old('name', $user->name) }}"
                            />
                          </div>
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              name="username"
                              label="Username"
                              placeholder="Masukan Username..."
                              value="{{ old('username', $user->username) }}"
                            />
                          </div>
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              label="Email"
                              name="email"
                              placeholder="Masukan email..."
                              value="{{ old('email', $user->email) }}"
                            />
                          </div>
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              label="Password"
                              name="password"
                              type="password"
                              placeholder="Masukan Password Anda..."
                              value="{{ old('password') }}"
                            />
                          </div>
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              label="Password Konfirmasi"
                              name="password_confirmation"
                              type="password"
                              placeholder="Konfirmasi Password Anda..."
                              value="{{ old('password_confirmation') }}"
                            />
                          </div>
                        </div>

                        <div class="row gallery mt-4" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <div class="col-6 col-sm-6 col-lg-2 mt-2 mt-md-0 mb-md-0 mb-2">
                              @isset($user->userProfile->foto)
                              <img
                                id="image-profile-preview"
                                class="w-100 active"
                                @storageExcsist($user->userProfile->foto)
                                src="{{ asset('storage/'. $user->userProfile->foto) }}"
                                @endstorageExcsist
                                alt="image profile"
                              >
                              @else
                              <img
                                id="image-profile-preview"
                                class="w-100 active"
                                src="{{ asset('img/blank-profile-picture-973460_1280.png') }}"
                                data-bs-slide-to="0"
                                alt="image profile"
                              >
                              @endisset
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <x-dashboard.input.form-input-file
                              name="foto"
                              label="Foto"
                              placeholder="Pilih file"
                            />
                          </div>
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              label="Nomor Telepon"
                              name="telepon"
                              type="number"
                              placeholder="Nomor Telepon Anda..."
                              value="{{ old('telepon', $user?->userProfile?->telepon) }}"
                            />
                          </div>
                        </div>
                        @error('foto')
                        <div class="alert alert-danger" role="alert">
                          {{ $message }}
                        </div>
                        @enderror

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
