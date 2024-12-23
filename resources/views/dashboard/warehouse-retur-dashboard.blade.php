<x-dashboard.app title="logistik dashboard">
  <x-slot:styleOptional>

  </x-slot:styleOptional>

  <x-slot:header>
    <div class="page-heading">
      <h3 class="text-warning my-4">Dashboard Warehouse Retur : {{ $username }}</h3>
    </div>
  </x-slot:header>

  <div class="page-content">
    <section class="row">
      <div class="col-12 col-lg-9">
        <div class="row">
          <div class="col-6 col-lg-4 col-md-6">
              <div class="card">
                  <div class="card-body px-4 py-4-5">
                      <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                              <div class="stats-icon purple mb-2">
                                  <i class="iconly-boldShow"></i>
                              </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Total Admin</h6>
                              <h6 class="font-extrabold mb-0">14</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
              <div class="card">
                  <div class="card-body px-4 py-4-5">
                      <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                              <div class="stats-icon blue mb-2">
                                  <i class="iconly-boldProfile"></i>
                              </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Total Supplier</h6>
                              <h6 class="font-extrabold mb-0">183.000</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
              <div class="card">
                  <div class="card-body px-4 py-4-5">
                      <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                              <div class="stats-icon green mb-2">
                                  <i class="iconly-boldAdd-User"></i>
                              </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Total Rak</h6>
                              <h6 class="font-extrabold mb-0">80.000</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
              <div class="card">
                  <div class="card-body px-4 py-4-5">
                      <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                              <div class="stats-icon red mb-2">
                                  <i class="fa-solid fa-cart-shopping fa-2x text-white"></i>
                              </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Jumlah Barang</h6>
                              <h6 class="font-extrabold mb-0">112</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
              <div class="card">
                  <div class="card-body px-4 py-4-5">
                      <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                              <div class="stats-icon green mb-2">
                                  <i class="iconly-boldBookmark"></i>
                              </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Jumlah Barang Masuk</h6>
                              <h6 class="font-extrabold mb-0">112</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
              <div class="card">
                  <div class="card-body px-4 py-4-5">
                      <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                              <div class="stats-icon purple mb-2">
                                  <i class="iconly-boldBookmark"></i>
                              </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Jumlah Barang Ajuan</h6>
                              <h6 class="font-extrabold mb-0">112</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
              <div class="card">
                  <div class="card-body px-4 py-4-5">
                      <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                              <div class="stats-icon blue mb-2">
                                  <i class="iconly-boldBookmark"></i>
                              </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Jumlah Barang Keluar</h6>
                              <h6 class="font-extrabold mb-0">112</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3">
          <div class="card">
              <div class="card-body py-4 px-4">
                  <div class="d-flex align-items-center">
                      <div class="avatar avatar-xl">
                          <img src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="Face 1">
                      </div>
                      <div class="ms-3 name">
                          <h5 class="font-bold">{{ $name }}</h5>
                          <h6 class="text-muted mb-0">{{ $username }}</h6>
                      </div>
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-header">
                  <h4>Visitors Profile</h4>
              </div>
              <div class="card-body">
                  <div id="chart-visitors-profile"></div>
              </div>
          </div>
      </div>
    </section>
    <section class="row">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Profile Visit</h4>
                  </div>
                  <div class="card-body">
                      <div id="chart-profile-visit"></div>
                  </div>
              </div>
          </div>
      </div>
    </section>
  </div>

  <x-slot:scriptOptional>
    <!-- Need: Apexcharts -->
    <script src="{{ asset('mazer/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/dashboard.js') }}"></script>
        
  </x-slot:scriptOptional>
</x-dashboard.app>
