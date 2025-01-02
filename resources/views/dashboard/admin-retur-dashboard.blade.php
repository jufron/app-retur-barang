<x-dashboard.app title="admin retur dashboard">
  <x-slot:styleOptional>

  </x-slot:styleOptional>

    <x-slot:header>
        <div class="page-heading">
            <h3 class="text-info my-4">Dashboard Admin Retur : {{ $username }}</h3>
        </div>
    </x-slot:header>

    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                  {{-- ? total admin retur count --}}
                  <div class="col-6 col-lg-4 col-md-6">
                      <div class="card">
                          <div class="card-body px-4 py-4-5">
                              <div class="row">
                                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2 green">
                                      <i class="fa-solid fa-users text-white"></i>
                                    </div>
                                  </div>
                                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Admin Retur</h6>
                                    <h6 class="font-extrabold mb-0">14</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- ? total warehouse retur count --}}
                  <div class="col-6 col-lg-4 col-md-6">
                      <div class="card">
                          <div class="card-body px-4 py-4-5">
                              <div class="row">
                                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2 green">
                                      <i class="fa-solid fa-users text-white"></i>
                                    </div>
                                  </div>
                                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Warehouse Retur</h6>
                                    <h6 class="font-extrabold mb-0">1</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- ? total warehouse asistent count --}}
                  <div class="col-6 col-lg-4 col-md-6">
                      <div class="card">
                          <div class="card-body px-4 py-4-5">
                              <div class="row">
                                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2 green">
                                      <i class="fa-solid fa-users text-white"></i>
                                    </div>
                                  </div>
                                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Warehouse Asistent</h6>
                                    <h6 class="font-extrabold mb-0">8</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- ? total logistik count --}}
                  <div class="col-6 col-lg-4 col-md-6">
                      <div class="card">
                          <div class="card-body px-4 py-4-5">
                              <div class="row">
                                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2 green">
                                      <i class="fa-solid fa-users text-white"></i>
                                    </div>
                                  </div>
                                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Logistik</h6>
                                    <h6 class="font-extrabold mb-0">8</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- ? total data logistik count --}}
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa-solid fa-truck-fast text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Data Logistik</h6>
                                        <h6 class="font-extrabold mb-0">11</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  {{-- ? total data barang rusak count --}}
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa-solid fa-boxes-stacked text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Barang Rusak</h6>
                                        <h6 class="font-extrabold mb-0">11</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  {{-- ? total data kategory barang count --}}
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa-solid fa-list text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Kategory Barang</h6>
                                        <h6 class="font-extrabold mb-0">11</h6>
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
                                            <i class="fa-regular fa-file text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Nota Barang Retur</h6>
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
                <div class="card-header text-center">
                    <h4>Cuaca Hari Ini</h4>
                </div>
                <div class="card-body text-center" id="cuaca">
    
                </div>
                <div class="text-center mb-3">
                    <small>Data cuaca dari <a href="https://www.bmkg.go.id/" target="_blank" rel="noopener noreferrer">BMKG API</a></small>
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
          
      <script src="{{ asset('js/waither.js') }}"></script>
  </x-slot:scriptOptional>
</x-dashboard.app>
