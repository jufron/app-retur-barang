.<x-dashboard.app title="Ubah Kategory Barang">
  <x-slot:header>
      <div class="page-heading">
          <h3 class="my-2">Ubah Kategori Barang</h3>
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
                      <form action="{{ route('wr.kategory-barang.update', $kategory) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="row">
                          <div class="col-sm-4">
                            <x-dashboard.input.form-input
                              label="Nama Kategori Barang"
                              name="name"
                              placeholder="Masukan Nama Kategry Barang..."
                              value="{{ old('name', $kategory->name) }}"
                            />
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
