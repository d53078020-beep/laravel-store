<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('metatags')
        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Page Title') }}</title>
        <meta name="description" content="Default metadesc" />
    @show

    <!-- Transition to modern Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }

        /* Pastel blue styles */
        .bg-soft-blue {
            background-color: #f0f7ff;
        }

        .text-accent {
            color: #0284c7;
        }

        .btn-accent {
            background-color: #0284c7;
            color: #ffffff;
            border-radius: 50rem;
            transition: all 0.2s ease-in-out;
        }

        .btn-accent:hover {
            background-color: #0369a1;
            color: #ffffff;
        }

        /* Glassmorphism effect for sticky header */
        .header-bottom.sticky-top {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid #e2e8f0;
        }

        .header-logo {
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #0f172a !important;
            text-decoration: none;
        }

        .social-link-icon {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f1f5f9;
            color: #64748b;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .social-link-icon:hover {
            background-color: #e0f2fe;
            color: #0284c7;
        }

        /* Scroll to Top button */
        #top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #ffffff;
            color: #0284c7;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        #top:hover {
            background-color: #0284c7;
            color: #ffffff;
            transform: translateY(-3px);
        }

        @media (max-width: 991.98px) {

            /* Жорстко скидаємо контейнер Offcanvas */
            #offcanvasNavbar .offcanvas-body {
                overflow-y: auto !important;
                max-height: calc(100vh - 80px) !important;
            }

            /* Знешкоджуємо абсолютно всі дропдауни та списки всередині Offcanvas */
            #offcanvasNavbar .dropdown-menu,
            #offcanvasNavbar ul.dropdown-menu,
            #offcanvasNavbar .dropdown-menu[data-bs-popper] {
                position: static !important;
                transform: none !important;
                top: auto !important;
                left: auto !important;
                right: auto !important;
                bottom: auto !important;
                inset: auto !important;
                float: none !important;
                width: 100% !important;
                max-width: 100% !important;
                min-width: 100% !important;
                box-shadow: none !important;
                border: none !important;
                background-color: #f8f9fa !important;
                margin: 5px 0 !important;
                border-radius: 12px !important;
            }

            #offcanvasNavbar .dropend,
            #offcanvasNavbar .dropdown {
                position: static !important;
            }
        }

        //* Фікси ВИКЛЮЧНО для мобільного меню навігації */
        @media (max-width: 991.98px) {
            #offcanvasNavbar.offcanvas-start {
                background-color: #ffffff !important;
                z-index: 1055 !important;
                width: 280px !important;
                max-width: 80% !important;
                height: 100vh !important;
            }

            #offcanvasNavbar .dropdown-menu,
            #offcanvasNavbar ul.dropdown-menu,
            #offcanvasNavbar .dropdown-menu[data-bs-popper] {
                position: static !important;
                transform: none !important;
                float: none !important;
                width: 100% !important;
                box-shadow: none !important;
                background-color: #f8f9fa !important;
                margin-top: 6px !important;
                padding: 8px !important;
            }

            #offcanvasNavbar .dropend {
                position: static !important;
            }
        }

        /* Прибираємо глобальний z-index, щоб не ламав кошик */
        .offcanvas-backdrop {
            z-index: 1040 !important;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('assets/libs/owlcarousel/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/main.js') }}" defer></script>
</head>

<body>

    <div class="wrapper d-flex flex-column min-vh-100">

        <!-- Top Bar -->
        <div class="border-bottom bg-white py-2 fs-7 text-muted">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-sm-4">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-phone text-accent me-2"></i>
                            <a href="tel:+1234567890"
                                class="text-decoration-none text-secondary fw-medium">123-456-7890</a>
                        </div>
                    </div>

                    <div class="col-sm-4 d-none d-sm-block text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="social-link-icon"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" class="social-link-icon"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="social-link-icon"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4 d-flex justify-content-end">
                        <livewire:user.nav-component />
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle Header -->
        <header class="bg-white py-3">
            <div class="container">
                <div class="row align-items-center g-3">
                    <div class="col-6 col-md-3">
                        <a wire:navigate href="{{ route('home') }}"
                            class="header-logo fs-3 d-flex align-items-center gap-2">
                            <span class="bg-soft-blue text-accent p-2 rounded-3 fs-4"><i
                                    class="fa-solid fa-bag-shopping"></i></span>
                            <span>E-Shop</span>
                        </a>
                    </div>

                    <div class="col-12 col-md-9 col-lg-7 ms-auto">
                        <livewire:search.search-form-component />
                    </div>
                </div>
            </div>
        </header>

        <!-- Navbar -->
        <!-- Фіксована шапка -->
        <div class="header-bottom sticky-top bg-white border-bottom shadow-sm" id="header-nav">
            <nav class="navbar navbar-expand-lg py-2 bg-white">
                <div class="container px-3 px-lg-4">

                    <!-- Кнопка відкриття меню для мобілок -->
                    <button class="navbar-toggler border-0 shadow-none p-1 me-2" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Навігація для ПК (похована на мобілках) -->
                    <div class="collapse navbar-collapse d-none d-lg-flex">
                        <ul class="navbar-nav gap-lg-2">
                            <li class="nav-item">
                                <a wire:navigate class="nav-link fw-medium text-dark active px-3 rounded-pill"
                                    aria-current="page" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-medium text-dark px-3 rounded-pill" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-auto-close="outside">
                                    Categories
                                </a>
                                <ul class="dropdown-menu border-0 shadow-lg rounded-4 mt-2 p-2">
                                    {!! \App\Helpers\Category\Category::getMenu('incs.menu-tpl', 'categories_html') !!}
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Іконка кошика (завжди справа) -->
                    <div class="ms-auto">
                        <livewire:cart.cart-icon-component />
                    </div>

                </div>
            </nav>
        </div>

        <!-- Мобільне Offcanvas-меню (вставте в кінець файлу шаблону або перед </footer>) -->
        <div class="offcanvas offcanvas-start border-0 bg-white" id="offcanvasNavbar" tabindex="-1"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title fw-bold text-dark" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-white p-3">
                <ul class="navbar-nav gap-1">
                    <li class="nav-item">
                        <a wire:navigate class="nav-link fw-medium text-dark active px-3 rounded-pill"
                            aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-medium text-dark px-3 rounded-pill" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-auto-close="outside">
                            Categories
                        </a>
                        <ul class="dropdown-menu border-0 shadow-none bg-light rounded-4 mt-2 p-2"
                            data-bs-popper="static">
                            {!! \App\Helpers\Category\Category::getMenu('incs.menu-tpl', 'categories_html') !!}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>


        <livewire:cart.cart-modal-component />

        <!-- Main Content Section -->
        <main class="main flex-grow-1 my-4">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="footer bg-white border-top mt-auto py-5" id="footer">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-3 col-6">
                        <h6 class="fw-bold text-dark mb-3">Information</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                            <li><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h6 class="fw-bold text-dark mb-3">Working hours</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-0 text-muted">
                            <li>Paris, str. Bretan</li>
                            <li>Mon-Fri: 9:00 - 18:00</li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h6 class="fw-bold text-dark mb-3">Contacts</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                            <li><a href="tel:1234567890" class="text-decoration-none text-muted">123-456-7890</a></li>
                            <li><a href="tel:0987654321" class="text-decoration-none text-muted">098-765-4321</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h6 class="fw-bold text-dark mb-3">Follow us</h6>
                        <div class="d-flex gap-2">
                            <a href="#" class="social-link-icon"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" class="social-link-icon"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="social-link-icon"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <button id="top" aria-label="Scroll to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

</body>

</html>
