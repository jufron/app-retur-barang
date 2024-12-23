<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Retur Barang | PT. Tigaraksa Satria</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('frond/assets/favicon.ico') }}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('frond/css/styles.css') }}" rel="stylesheet" />
        {{-- ? fontawesome library --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Retur Barang</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Keunggulan</a></li>
                        @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Retur Barang</h1>
                        <h1 class="text-white font-weight-bold">PT. Tigaraksa Satria</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Selamat Datang di Aplikasi Retur Barang dimana diperuntuhkan untuk admin retur, logistik, warehouse asisten dan warehouse retur</p>
                        @auth
                        <a class="btn btn-success btn-xl" href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                        <a class="btn btn-success btn-xl" href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-secondary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Tentang Aplikasi Retur!</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">
                          Aplikasi Retur Barang PT. Tigaraksa Satria hadir untuk mempermudah proses pengembalian barang secara efisien dan cepat. Dengan fitur unggulan, kami memastikan setiap langkah retur dapat dilakukan dengan cepat, aman, dan sesuai kebutuhan
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Keunggulan</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-4">
                              <i class="fa-solid fa-tablet-screen-button fa-3x text-success"></i>
                            </div>
                            <h3 class="h4 mb-2">Responsif dan Fleksibel</h3>
                            <p class="text-muted mb-0">Aplikasi dirancang responsif, sehingga dapat diakses dengan mudah melalui berbagai perangkat seperti smartphone, tablet, maupun komputer.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                          <div class="mb-4">
                            <i class="fa-solid fa-wifi fa-3x text-success"></i>
                          </div>
                            <h3 class="h4 mb-2">Berbasis Online dan Real-Time</h3>
                            <p class="text-muted mb-0">Semua data diproses secara online dan real-time, memastikan informasi selalu akurat dan up-to-date untuk mendukung proses retur yang efisien.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                          <div class="mb-4">
                            <i class="fa-solid fa-barcode fa-3x text-success"></i>
                          </div>
                            <h3 class="h4 mb-2">Fitur Scan Barcode</h3>
                            <p class="text-muted mb-0">Memanfaatkan teknologi scan barcode untuk mempercepat dan mempermudah identifikasi barang retur, mengurangi risiko kesalahan manual.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                          <div class="mb-4">
                            <i class="fa-solid fa-palette fa-3x text-success"></i>
                          </div>
                            <h3 class="h4 mb-2">Antarmuka yang Ramah Pengguna</h3>
                            <p class="text-muted mb-0">Aplikasi dilengkapi dengan desain antarmuka yang sederhana dan intuitif, sehingga memudahkan pengguna dari berbagai kalangan untuk menjalankan proses retur tanpa kesulitan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5">
              <div class="small text-center text-muted">
                Copyright &copy; 2025 - Retur Barang | PT. Tigaraksa Satria
              </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src=" frond/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        {{-- ? fontawesome library --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js" integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
