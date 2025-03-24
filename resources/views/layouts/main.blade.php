<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mohammed Fannana">
        <meta name="generator" content="Hugo 0.122.0">
        <title> {{__('جمعية عايش ')}}</title>

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

        .submenu {
            display: none;
            padding-right: 10px;
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


                    <div class="links">

                        {{-- <x-nav/> --}}


                        <ul>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('home')}}" class="nav-link active"  dir="rtl" style="text-align: start;">
                                    {{__('لوحة التحكم ')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('supporter.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('الداعمين')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('donor.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('المتبرعين')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('volunteer.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('المتطوعين')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('balance.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('المبالغ المقبوضة ')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('expenses.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('المبالغ المدفوعة ')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('file.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('الملفات')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('file.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('الرسائل')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('file.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('الاشعارات')}}
                                </a>
                            </li>

                            <li class="nav-item p-2 me-5" style="height: 40px">
                                <a  style="height: 40px" href="{{ route('file.index')}}" class="nav-link"  dir="rtl" style="text-align: start;">
                                    {{__('الشكاوي')}}
                                </a>
                            </li>

                        </ul>


                        {{-- <ul>
                            <li class="p-2 me-5 link link-active" > <a href=""> {{__('لوحة التحكم ')}} </a> </li>

                            <li class="p-2 me-5 link"> <a href="{{route('supporter.index')}}"> {{__('الداعمين')}} </a> </li>
                            <li class="p-2 me-5 link"> <a href="{{route('donor.index')}}"> {{__('المتبرعين')}} </a></li>


                            <li class="p-2 me-5 nav-link d-flex justify-content-between link" id="toggleMainMenu">
                                {{__('الحالات')}} <span class="arrow">▼</span>
                            </li>

                            <div id="mainMenu" class="submenu">

                                <p class="nav-link1 d-flex justify-content-between me-5 mb-0 p-2 link" id="toggleOrphans">{{__('الأيتام المقدمين')}}<span class="arrow">▼</span></p>

                                <div id="orphansMenu" class="submenu">
                                    <a href="{{route('orphan.registered.index')}}" class="nav-link p-1 me-5">{{__('يتيم جديد')}}</a>
                                    <a href="{{route('orphan.review.index')}}" class="nav-link p-1 me-5">{{__('مراجعة')}}</a>
                                    <a href="{{route('orphan.accreditation.index')}}" class="nav-link p-1 me-5">{{__('الاعتماد')}}</a>
                                    <a href="{{route('orphan.certified.index')}}" class="nav-link p-1 me-5">{{__('الحالات المعتمدة')}}</a>
                                    <a href="{{route('orphan.marketing.index')}}" class="nav-link p-1 me-5">{{__('الحالات المقدمة للتسويق')}}</a>
                                    <a href="{{route('orphan.waiting.index')}}" class="nav-link p-1 me-5">{{__('الحالات انتظار الرد')}}</a>
                                    <a href="{{route('orphan.sponsored.index')}}" class="nav-link p-1 me-5">{{__('الحالات المكفولة')}}</a>
                                    <a href="{{route('orphan.archived.index')}}" class="nav-link p-1 me-5">{{__('الحالات المؤرشفة')}}</a>
                                </div>

                                <li class="p-2 me-5 nav-link d-flex justify-content-between link">
                                    <a href="{{route('family.index')}}" class="nav-link p-1 me-5">{{__('الأسر الأولى بالرعاية')}}</a>
                                </li>

                            </div>


                            <li class="p-2 me-5 link"> <a href="{{route('volunteer.index')}}"> المتطوعين </a></li>
                            <li class="p-2 me-5 link"> <a href="{{route('balance.index')}}"> المبالغ المقبوضة </a></li>
                            <li class="p-2 me-5 link"> <a href="{{route('expenses.index')}}"> المبالغ المدفوعة </a></li>
                            <li class="p-2 me-5 link"> <a href="{{route('file.index')}}"> الملفات </a> </li>


                            <li class="p-2 me-5 nav-link d-flex justify-content-between link" id="toggleMainMenu">
                                {{__('التقارير')}} <span class="arrow">▼</span>
                            </li>

                            <div id="mainMenu" class="submenu">
                                <a href="{{route('report.index' , '2')}}" class="nav-link p-1 me-5">{{__(' تقرير الشارقة الخيرية ')}}</a>
                                <a href="{{route('report.index' , '1')}}" class="nav-link p-1 me-5">{{__('تقرير دار البر')}}</a>
                                <a href="{{route('report.index' , '4')}}" class="nav-link p-1 me-5">{{__('تقرير جمعية دبي الخيرية')}}</a>
                                <a href="{{route('report.index' , '3')}}" class="nav-link p-1 me-5">{{__(' تقرير السيدة مريم ')}}</a>


                            </div>

                            <li class="p-2 me-5 link"> <a href=""> الرسائل </a></li>
                            <li class="p-2 me-5 link"> <a href=""> الاشعارات </a></li>
                            <li class="p-2 me-5 link"> <a href=""> الشكاوي </a></li>

                        </ul> --}}

                    </div>

                    {{-- @auth --}}

                        <form action="{{route('logout')}}" method="post">
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

        {{-- <script>
            function toggleMenu(menuId, element) {
                let menu = document.getElementById(menuId);
                let arrow = element.querySelector(".arrow");

                if (menu.style.display === "block") {
                    menu.style.display = "none";
                    arrow.innerHTML = "▼"; // السهم لأسفل
                } else {
                    menu.style.display = "block";
                    arrow.innerHTML = "▲"; // السهم لأعلى
                }
            }

            document.getElementById("toggleMainMenu").addEventListener("click", function() {
                toggleMenu("mainMenu", this);
            });

            document.getElementById("toggleOrphans").addEventListener("click", function() {
                toggleMenu("orphansMenu", this);
            });

            // document.getElementById("toggleFamilies").addEventListener("click", function() {
            //     toggleMenu("familiesMenu", this);
            // });
        </script> --}}

        {{-- <script>


            document.getElementById("toggleMainMenu").addEventListener("click", function() {
                let menu = document.getElementById("mainMenu");
                menu.style.display = (menu.style.display === "block") ? "none" : "block";
            });

            document.getElementById("toggleOrphans").addEventListener("click", function() {
                let menu = document.getElementById("orphansMenu");
                menu.style.display = (menu.style.display === "block") ? "none" : "block";
            });

            document.getElementById("toggleFamilies").addEventListener("click", function() {
                let menu = document.getElementById("familiesMenu");
                menu.style.display = (menu.style.display === "block") ? "none" : "block";
            });
        </script> --}}

        <script>

            // Toggle menu visibility on click
document.querySelectorAll('.link').forEach(function (menuItem) {
    menuItem.addEventListener('click', function () {
        let submenu = this.nextElementSibling;
        let arrow = this.querySelector('.arrow');

        if (submenu && submenu.classList.contains('submenu')) {
            // Toggle the submenu visibility
            submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
            // Toggle arrow direction
            arrow.innerHTML = (submenu.style.display === 'block') ? '▲' : '▼';
        }
    });
});





        </script>


        @stack('scripts')

</body>
</html>

