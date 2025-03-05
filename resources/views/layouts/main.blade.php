<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.122.0">
        <title> جمعية عايش </title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard-rtl/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

        <!-- style.css -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        {{-- script js --}}
        <script src="{{asset('js/script.js')}}"></script>

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
        </style>

        @stack('styles')


    </head>

    <body>

        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </symbol>
        </svg> --}}


        {{-- <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">اسم الشركة</a>

            <ul class="navbar-nav flex-row d-md-none">
                <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="تبديل التنقل">
                    <svg class="bi"><use xlink:href="#list"></use></svg>
                </button>
                </li>
            </ul>

        </header> --}}

        <div class="container-fluid">
            <div class="row" style="height: 100vh">
                <div class="sidebar col-3  p-0 shadow-sm">

                    <div class="d-flex justify-content-center">
                        <img src="{{asset('image/logo.png')}}" alt="">
                    </div>

                    <p class="mt-1" style="margin-right:2.5rem"> لوحة التحكم </p>

                    <div class="links">

                        <ul>
                            <li class="p-2 me-5 link-active"> <a href=""> الداعمين </a> </li>
                            <li class="p-2 me-5"> <a href=""> المتبرعين </a></li>
                            <li class="p-2 me-5">
                                الحالات
                                <ul style="display: none">
                                    <li class="p-1 me-5"><a href="">c</a></li>
                                    <li class="p-1 me-5"><a href="">c</a></li>
                                </ul>

                            </li>

                            <li class="p-2 me-5"> <a href=""> المتطوعين </a></li>
                            <li class="p-2 me-5"> <a href=""> المبالغ المقبوضة </a></li>
                            <li class="p-2 me-5"> <a href=""> المبالغ المدفوعة </a></li>
                            <li class="p-2 me-5"> <a href=""> الملفات </a> </li>
                            <li class="p-2 me-5">
                                التقارير
                                <ul style="display: none">
                                    <li class="p-1 me-5"><a href="">c</a></li>
                                    <li class="p-1 me-5"><a href="">c</a></li>
                                </ul>

                            </li>
                            <li class="p-2 me-5"> <a href=""> الرسائل </a></li>
                            <li class="p-2 me-5"> <a href=""> الاشعارات </a></li>
                            <li class="p-2 me-5"> <a href=""> الشكاوي </a></li>

                        </ul>

                    </div>

                    {{-- @auth --}}

                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="text-danger bg-transparent border-0" style="margin-right:2rem ">تسجيل الخروج</button>
                        </form>

                    {{-- @endauth --}}

                </div>

                <main class="col-9 ms-sm-auto  px-md-5 pt-5 ">

                    <!-- use component class main as layout  -->
                    {{$slot}}

                </main>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        @stack('scripts')

</body>
</html>

