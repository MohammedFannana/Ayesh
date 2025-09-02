<!DOCTYPE html>
<html  lang="{{App::currentLocale()}}" dir="{{App::isLocale('ar')? 'rtl' : 'ltr'}}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mohammed Fannana">
        <meta name="generator" content="Hugo 0.122.0">
        <title> {{__('جمعية عايش')}}</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard-rtl/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <!-- bootstrap css -->
        @if (App::isLocale('ar'))
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
            <link rel="stylesheet" href="{{asset('css/rtl.css')}}">
        @else
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @endif

        <!-- style.css -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Flatpickr CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">






        <style>

            .active{
                background-color:#3B9E2933 !important;
                color: var(--color) !important;
                border-radius: 5px;
                padding-left:6px !important;
            }

            .active-text{
                color: var(--color) !important;
            }


        .direction {
            direction: {{ App::isLocale('ar') ? 'rtl' : 'ltr' }};
        }

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

        .nav-link{
            padding: 0.5rem 0.3rem 0.5rem 0
        }


        </style>


        @stack('styles')


    </head>

    <body>


        <div class="container-fluid">
            <div class="row" style="height: 100vh">
                <div class="sidebar col-3  p-0 shadow-sm" style="position: sticky; left: 0px; top: 0px;">

                    <div class="d-flex justify-content-center">
                        <img src="{{asset('image/logo.png')}}" alt="">
                    </div>


                    @guest
                        <div class="links">

                            {{-- <x-nav/> --}}
                            <ul>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a  href="{{ route('home')}}" class="nav-link direction {{Route::is('home')?'active':''}}"  style="text-align: start;">
                                        {{__('لوحة التحكم')}}
                                    </a>

                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a  href="{{ route('supporter.index')}}" class="nav-link direction {{Route::is('supporter.*')?'active':''}}"  style="text-align: start;">
                                        {{__('الجهات المانحة')}}
                                    </a>
                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a  href="{{ route('donor.index')}}" class="nav-link direction {{Route::is('donor.*')?'active':''}}"  style="text-align: start;">
                                        {{__('المتبرعين')}}
                                    </a>
                                </li>

                                <li class="nav-item dropdown  p-2 me-5 " style="height: 40px" data-bs-toggle="dropdown" aria-expanded="false">

                                    <a type="button" class="nav-link one dropdown-toggle d-flex justify-content-between align-items-center status direction"  style="text-align: start;" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{__('الحالات')}}
                                    </a>

                                    <li class="nav-item dropdown  p-2 ps-3 me-5  status-item d-none" style="height: 40px;" data-bs-toggle="dropdown" aria-expanded="false">

                                        <a type="button" class="two four dropdown-toggle d-flex justify-content-between align-items-center orphan direction"  style="text-align: start;" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{__('الايتام المقدمين')}}
                                        </a>



                                        {{-- <ul class="orphan-menu d-none"> --}}
                                        <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.registered.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                {{__('يتيم جديد')}}
                                            </a>
                                        </li>

                                        <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.review.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                {{__('مراجعة')}}
                                            </a>
                                        </li>

                                        <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.accreditation.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                {{__('الاعتماد')}}
                                            </a>
                                        </li>

                                        <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.certified.index')}}" class="three dropdown-item direction"   style="text-align: start;">
                                                {{__('الحالات المعتمدة')}}
                                            </a>
                                        </li>

                                        <li class="nav-item p-2  ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.marketing.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                {{__('الحالات المقدمة للتسويق')}}
                                            </a>
                                        </li>


                                        <li class="nav-item  p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.waiting.index')}}" class="three dropdown-item direction"   style="text-align: start;">
                                                {{__('الحالات انتظار الرد')}}
                                            </a>
                                        </li>


                                        <li class="nav-item  p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.sponsored.index')}}" class="three dropdown-item direction"   style="text-align: start;">
                                                {{__('الحالات المكفولة')}}
                                            </a>
                                        </li>

                                        <li class="nav-item  p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                            <a  href="{{route('orphan.archived.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                {{__('الحالات المؤرشفة')}}
                                            </a>
                                        </li>

                                        {{-- </ul> --}}

                                    </li>

                                    <li class="nav-item two p-2 ps-3 me-5 status-item d-none" style="height: 40px">
                                        <a  href="{{ route('family.index')}}" class="dropdown-item direction"  style="text-align: start;">
                                            {{__('الأسر الأولى بالرعاية')}}
                                        </a>
                                    </li>

                                </li>


                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a href="{{ route('volunteer.index')}}" class="nav-link direction {{Route::is('volunteer.*')?'active':''}}"   style="text-align: start;">
                                        {{__('المتطوعين')}}
                                    </a>
                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a href="{{ route('balance.index')}}" class="nav-link direction {{Route::is('balance.*')?'active':''}}"  style="text-align: start;">
                                        {{__('المبالغ المقبوضة')}}
                                    </a>
                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a href="{{ route('expenses.index')}}" class="nav-link direction {{Route::is('expenses.*')?'active':''}}"   style="text-align: start;">
                                        {{__('المبالغ المدفوعة')}}
                                    </a>
                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a href="{{ route('file.index')}}" class="nav-link direction {{Route::is('file.*')?'active':''}}"  style="text-align: start;">
                                        {{__('الملفات')}}
                                    </a>
                                </li>

                                <li class="nav-item dropdown  p-2 me-5 " style="height: 40px" data-bs-toggle="dropdown" aria-expanded="false">

                                    <a type="button" class="nav-link one dropdown-toggle d-flex justify-content-between align-items-center status direction {{Route::is('report.*')?'active':''}}"  style="text-align: start;" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{__('التقارير')}}
                                    </a>

                                    <li class="nav-item dropdown  p-2 ps-3 me-5  status-item d-none" style="height: 40px;" data-bs-toggle="dropdown" aria-expanded="false">
                                        <a type="button" class="two  dropdown-toggle d-flex justify-content-between align-items-center orphan direction {{Route::is('report.index' , 2)?'active-text':''}}"  style="text-align: start;" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{__('تقرير الشارقة الخيرية')}}
                                        </a>
                                    </li>

                                    <li class="nav-item two p-2 ps-3 me-5 status-item d-none" style="height: 40px">
                                        <a  href="{{route('report.index' , 1)}}" class="dropdown-item direction {{Route::is('report.index' , 1)?'active-text':''}}"  style="text-align: start;">
                                            {{__('تقرير دار البر')}}
                                        </a>
                                    </li>

                                    <li class="nav-item p-2 ps-4 me-5  report-list d-none" style="height: 40px">
                                        <a  href="{{route('report.follow.albar.index')}}" class="two dropdown-item direction "  style="text-align: start;">
                                            {{__(' تقرير متابعة دار البر ')}}
                                        </a>
                                    </li>

                                    <li class="nav-item two p-2 ps-3 me-5 status-item d-none" style="height: 40px">
                                        <a  href="{{route('report.index' , 4)}}" class="dropdown-item direction {{Route::is('report.index' , 4)?'active-text':''}}"  style="text-align: start;">
                                            {{__('تقرير دبي الخيرية')}}
                                        </a>
                                    </li>

                                    <li class="nav-item two p-2 ps-3 me-5 status-item d-none" style="height: 40px">
                                        <a  href="{{route('report.index' , 3)}}" class="dropdown-item direction {{Route::is('report.index' , 3)?'active-text':''}}"  style="text-align: start;">
                                            {{__('تقرير السيدة مريم')}}
                                        </a>
                                    </li>

                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a href="{{ route('file.index')}}" class="nav-link direction {{Route::is('file.index')?'active':''}}"  style="text-align: start;">
                                        {{__('الرسائل')}}
                                    </a>
                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a href="{{ route('file.index')}}" class="nav-link direction {{Route::is('notification.*')?'active':''}}"  style="text-align: start;">
                                        {{__('الاشعارات')}}
                                    </a>
                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a  href="{{route('complaint.create')}}" class="nav-link direction {{Route::is('complaint.*')?'active':''}}"  style="text-align: start;">
                                        {{__('الشكاوي')}}
                                    </a>
                                </li>

                            </ul>

                        </div>
                    @endguest

                    @auth

                        <div class="links">

                            {{-- <x-nav/> --}}
                            <ul>

                                <li class="nav-item p-2 me-5 d-flex justify-content-between align-items-center" style="height: 40px">
                                    <a  href="{{ route('home')}}" class="nav-link direction w-100 {{Route::is('home')?'active':''}}"  style="text-align: start;">
                                        {{__('لوحة التحكم')}}
                                    </a>

                                    <div style="text-align:end;">
                                        @if (App::isLocale('ar'))
                                            <form id="lang-en" action="{{route('locale.change' , 'en')}}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="add-button text-white p-2 position-relative" style="left: -40px;">en</button>
                                            </form>
                                        @else
                                            <form id="lang-en" action="{{route('locale.change' , 'ar')}}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="add-button text-white p-2 position-relative" style="left: 40px;">ar</button>
                                            </form>
                                        @endif
                                    </div>
                                </li>

                                @can('access-admin')

                                    <li class="nav-item p-2 me-5" style="height: 40px">
                                        <a  href="{{ route('supporter.index')}}" class="nav-link direction {{Route::is('supporter.*')?'active':''}}"   style="text-align: start;">
                                            {{__('الجهات المانحة')}}
                                        </a>
                                    </li>

                                    <li class="nav-item p-2 me-5" style="height: 40px">
                                        <a  href="{{ route('donor.index')}}" class="nav-link direction {{Route::is('donor.*')?'active':''}}"  style="text-align: start;">
                                            {{__('المتبرعين')}}
                                        </a>
                                    </li>

                                @endcan


                                <li class="nav-item dropdown  p-2 me-5 " style="height: 40px" data-bs-toggle="dropdown" aria-expanded="false">

                                    <a type="button" class="nav-link one dropdown-toggle d-flex justify-content-between align-items-center status direction {{Route::is('orphan.*') || Route::is('family.*') ?'active':''}}"  style="text-align: start;" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{__('الحالات')}}
                                    </a>

                                    <li class="nav-item dropdown  p-2 ps-3 me-5  status-item d-none" style="height: 40px;" data-bs-toggle="dropdown" aria-expanded="false">

                                        <a type="button" class="two four p-2 dropdown-toggle d-flex justify-content-between align-items-center orphan direction {{Route::is('orphan.*')?'active':''}}"  style="text-align: start;" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{__('الايتام المقدمين')}}
                                        </a>



                                        {{-- <ul class="orphan-menu d-none"> --}}

                                        @can('access-registrations')

                                            <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.registered.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                    {{__('يتيم جديد')}}
                                                </a>
                                            </li>

                                        @endcan


                                        @can('access-review')

                                            <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.review.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                    {{__('مراجعة')}}
                                                </a>
                                            </li>

                                        @endcan


                                        @can('access-certified')

                                            <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.accreditation.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                    {{__('الاعتماد')}}
                                                </a>
                                            </li>

                                        @endcan


                                        @can('access-admin')

                                            <li class="nav-item p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.certified.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                    {{__('الحالات المعتمدة')}}
                                                </a>
                                            </li>
                                            
                                        @endcan

                                        @can('access-marketer')
                                            <li class="nav-item p-2  ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.marketing.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                    {{__('الحالات المقدمة للتسويق')}}
                                                </a>
                                            </li>
                                        @endcan

                                        @can('access-admin')
                                            <li class="nav-item  p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.waiting.index')}}" class="three dropdown-item direction"   style="text-align: start;">
                                                    {{__('الحالات انتظار الرد')}}
                                                </a>
                                            </li>


                                            <li class="nav-item  p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.sponsored.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                    {{__('الحالات المكفولة')}}
                                                </a>
                                            </li>

                                            <li class="nav-item  p-2 ps-4 me-5 orphan-menu d-none" style="height: 40px">
                                                <a  href="{{route('orphan.archived.index')}}" class="three dropdown-item direction"  style="text-align: start;">
                                                    {{__('الحالات المؤرشفة')}}
                                                </a>
                                            </li>

                                        @endcan



                                    </li>

                                    @can('access-admin')

                                        <li class="nav-item two p-2 ps-3 me-5 status-item d-none" style="height: 40px">
                                            <a  href="{{ route('family.index')}}" class="dropdown-item p-2 direction {{Route::is('family.index')?'active':''}}" style="text-align: start;">
                                                {{__('الأسر الأولى بالرعاية')}}
                                            </a>
                                        </li>

                                    @endcan


                                </li>


                                @can('access-admin')

                                    <li class="nav-item p-2 me-5" style="height: 40px">
                                        <a href="{{ route('volunteer.index')}}" class="nav-link direction {{Route::is('volunteer.*')?'active':''}}"   style="text-align: start;">
                                            {{__('المتطوعين')}}
                                        </a>
                                    </li>

                                    <li class="nav-item p-2 me-5" style="height: 40px">
                                        <a href="{{ route('balance.index')}}" class="nav-link direction {{Route::is('balance.*')?'active':''}}"  style="text-align: start;">
                                            {{__('المبالغ المقبوضة')}}
                                        </a>
                                    </li>

                                @endcan

                                @can('access-financial')

                                    <li class="nav-item p-2 me-5" style="height: 40px">
                                        <a href="{{ route('expenses.index')}}" class="nav-link direction {{Route::is('expenses.*')?'active':''}}"  style="text-align: start;">
                                            {{__('المبالغ المدفوعة')}}
                                        </a>
                                    </li>

                                @endcan

                                @can('access-admin')

                                    <li class="nav-item p-2 me-5" style="height: 40px">
                                        <a href="{{ route('file.index')}}" class="nav-link direction {{Route::is('file.*')?'active':''}}"  style="text-align: start;">
                                            {{__('الملفات')}}
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown  p-2 me-5" style="height: 40px;" data-bs-toggle="dropdown" aria-expanded="false">

                                        <a type="button" class="nav-link one report dropdown-toggle d-flex justify-content-between align-items-center orphan direction {{Route::is('report.*')?'active':''}}"  style="text-align: start;" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{__('التقارير')}}
                                        </a>


                                        <li class="nav-item p-2 ps-4 me-5 report-list  d-none" style="height: 40px">
                                            <a  href="{{route('report.index' , 2)}}" class="two dropdown-item direction "  style="text-align: start;">
                                                {{__('تقرير الشارقة الخيرية')}}
                                            </a>
                                        </li>

                                        <li class="nav-item p-2 ps-4 me-5  report-list d-none" style="height: 40px">
                                            <a  href="{{route('report.index' , 1)}}" class="two dropdown-item direction "  style="text-align: start;">
                                                {{__('تقرير دار البر')}}
                                            </a>
                                        </li>

                                        <li class="nav-item p-2 ps-4 me-5  report-list d-none" style="height: 40px">
                                            <a  href="{{route('report.follow.albar.index')}}" class="two dropdown-item direction "  style="text-align: start;">
                                                {{__(' تقرير متابعة دار البر ')}}
                                            </a>
                                        </li>

                                        <li class="nav-item p-2 ps-4 me-5  report-list d-none" style="height: 40px">
                                            <a  href="{{route('report.index' , 4)}}" class="two dropdown-item direction"  style="text-align: start;">
                                                {{__('تقرير دبي الخيرية')}}
                                            </a>
                                        </li>


                                        <li class="nav-item p-2 ps-4 me-5  report-list d-none" style="height: 40px">
                                            <a  href="{{route('report.index' , 3)}}" class="two dropdown-item direction "  style="text-align: start;">
                                                {{__('تقرير السيدة مريم')}}
                                            </a>
                                        </li>

                                    </li>



                                    <li class="nav-item p-2 me-5" style="height: 40px">
                                        <a href="{{ route('file.index')}}" class="nav-link direction "  style="text-align: start;">
                                            {{__('الرسائل')}}
                                        </a>
                                    </li>

                                @endcan

                                <li class="nav-item p-2 me-5 " style="height: 40px">
                                    <a href="{{ route('notification.index')}}" class="nav-link direction {{Route::is('notification.*')?'active':''}}"  style="text-align: start;">
                                        {{__('الاشعارات')}}
                                        @if(auth()->user()->unreadNotifications->count() > 0)
                                            <span class="badge title-color" style="background-color: #3B9E2933">
                                                {{ auth()->user()->unreadNotifications->count() }}
                                            </span>
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item p-2 me-5" style="height: 40px">
                                    <a @guest href="{{route('complaint.create')}}" @endguest @auth  href="{{route('complaint.index')}}" @endauth  class="nav-link direction {{Route::is('complaint.*')?'active':''}}"  style="text-align: start;">
                                        {{__('الشكاوي')}}
                                    </a>
                                </li>

                            </ul>

                        </div>

                    @endauth


                    @auth

                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="text-danger bg-transparent border-0" style="margin-right:2rem;margin-left:2rem ">{{__('تسجيل الخروج')}}</button>
                        </form>

                    @endauth

                    @guest
                        <a type="submit" href="{{route('login')}}" class="text-success bg-transparent border-0" style="margin-right:3rem ">{{__('تسجيل الدخول')}}</a>
                    @endguest

                </div>

                <main class="col-9 ms-sm-auto  px-md-5 pt-5 ">

                    <!-- use component class main as layout  -->
                    {{$slot}}

                </main>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="{{asset('js/script.js')}}"></script>
        <!-- Flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let status = document.querySelector(".status");
                let orphan = document.querySelector(".orphan");
                let report = document.querySelector(".report");
                let reportList = document.querySelectorAll(".report-list");
                let statusItems = document.querySelectorAll(".status-item");
                let orphanMenu = document.querySelectorAll(".orphan-menu");

                // عند الضغط على الحالات
                status.addEventListener("click", function (e) {
                    e.preventDefault();  // إلغاء السلوك الافتراضي
                    statusItems.forEach(item => item.classList.toggle("d-none"));
                    orphanMenu.forEach(item => item.classList.add("d-none")); // إخفاء قائمة الأيتام عند فتح الحالات
                });

                // عند الضغط على الأيتام المقدمين
                orphan.addEventListener("click", function (e) {
                    e.preventDefault();  // إلغاء السلوك الافتراضي
                    orphanMenu.forEach(item => item.classList.toggle("d-none")); // إظهار أو إخفاء القائمة الفرعية
                });

                // عند الضغط على التقارير
                report.addEventListener("click", function (e) {
                    e.preventDefault();  // إلغاء السلوك الافتراضي
                    reportList.forEach(item => item.classList.toggle("d-none")); // إظهار أو إخفاء القائمة
                });
            });

        </script>

        {{-- <script>

            document.addEventListener("DOMContentLoaded", function () {
                let allNavLinks = document.querySelectorAll(".nav-link");

                // استعادة العنصر المحدد من localStorage عند تحميل الصفحة
                let activeLink = localStorage.getItem("activeNavLink");

                if (activeLink) {
                    allNavLinks.forEach(link => link.classList.remove("active")); // إزالة `active` من الكل أولاً

                    let savedLink = document.querySelector(`.nav-link[href="${activeLink}"]`);
                    if (savedLink) {
                        savedLink.classList.add("active");
                    }
                }

                allNavLinks.forEach(link => {
                    link.addEventListener("click", function (e) {
                        // إزالة `active` من جميع العناصر
                        allNavLinks.forEach(item => item.classList.remove("active"));

                        // إضافة `active` للعنصر المضغوط
                        this.classList.add("active");

                        // حفظ الرابط المحدد في localStorage
                        localStorage.setItem("activeNavLink", this.getAttribute("href"));
                    });
                });
            });

        </script> --}}

        {{--  --}}
        {{-- <script>
            document.addEventListener("DOMContentLoaded", function () {
                // تحديد جميع العناصر التي تحتوي على الكلاس one, two, three, four
                const oneLink = document.querySelector(".one");
                const twoLink = document.querySelector(".two");
                const threeLink = document.querySelector(".three");
                const fourLink = document.querySelector(".four");

                // التأكد من أن العناصر موجودة قبل إضافة الـ eventListeners
                if (twoLink && threeLink && oneLink && fourLink) {

                    // عند الضغط على الرابط الذي يحتوي على الكلاس "two"
                    twoLink.addEventListener("click", function () {
                        // إضافة الكلاس "active-text" لـ two و "active" لـ one
                        twoLink.classList.add("active-text");
                        oneLink.classList.add("active");

                        // إزالة الكلاسات "active-text" من الثلاثي والخماسي
                        threeLink.classList.remove("active-text");
                        fourLink.classList.remove("active-text");
                    });

                    // عند الضغط على الرابط الذي يحتوي على الكلاس "three"
                    threeLink.addEventListener("click", function () {
                        // إضافة الكلاس "active-text" لـ three و "active-text" لـ four و "active" لـ one
                        threeLink.classList.add("active-text");
                        fourLink.classList.add("active-text");
                        oneLink.classList.add("active");

                        // إزالة الكلاس "active-text" من two
                        twoLink.classList.remove("active-text");
                    });
                }
            });
        </script> --}}


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

