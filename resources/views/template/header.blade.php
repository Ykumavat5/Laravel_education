<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Include jQuery Timepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>

    <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


    <style>
        .notification {
            position: fixed;
            top: 120px;
            right: 20px;
            /* background: #F6AE3D; */
            background: #3fc8f1;
            /* Your background color */
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            opacity: 1;
            transition: opacity 0.5s linear;
        }

        .notification.fade {
            opacity: 0;
        }

        .notification-bar {
            width: 100%;
            /* Start full width */
            height: 5px;
            background: rgba(255, 255, 255, 0.8);
            position: absolute;
            bottom: 0;
            left: 0;
            transition: width 5s linear;
            /* Change to decrease width */
        }
        
        a {
            text-decoration: none; /* Removes the underline */
        }
    </style>

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="dashboard" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Mentor</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('dashboard') }}"
                            class="{{ request()->is('dashboard') ? 'active' : '' }}">Home<br></a></li>
                    <li><a href="{{ route('about.index') }}"
                            class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ route('courses.index') }}"
                            class="{{ request()->is('courses') ? 'active' : '' }}">Courses</a></li>
                    <li><a href="{{ route('trainers.index') }}"
                            class="{{ request()->is('trainers') ? 'active' : '' }}">Trainers</a></li>
                    <li><a href="{{ route('events.index') }}"
                            class="{{ request()->is('events') ? 'active' : '' }}">Events</a></li>
                    <li class="dropdown">
                        <a href="{{ route('categorys.index') }}"
                            class="{{ request()->is('category') ? 'active' : '' }}"><span>Categories</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($categories as $category)
                                <li class="dropdown">
                                    <a href="/categorys/{{ $category->id }}">
                                        <span>{{ $category->name }}</span>
                                        @if ($category->subCategories->isNotEmpty())
                                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                                        @endif
                                    </a>

                                    @if ($category->subCategories->isNotEmpty())
                                        <ul>
                                            @foreach ($category->subCategories as $subCategory)
                                                <li class="dropdown">
                                                    <a href="/categorys/{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}
                                                        @if ($subCategory->subCategories->isNotEmpty())
                                                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                                                        @endif
                                                    </a>
                                                    @if ($subCategory->subCategories->isNotEmpty())
                                                        <ul>
                                                            @foreach ($subCategory->subCategories as $subSubCategory)
                                                                <li>
                                                                    <a href="/categorys/{{ $subSubCategory->id }}">{{ $subSubCategory->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach

                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                            <li class="dropdown">
                                <a href="/categorys">
                                    <span>See All Categorys</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('resources') }}"
                            class="{{ request()->is('resources') ? 'active' : '' }}">Resources
                            <i class="bi bi-chevron-down toggle-dropdown"></i></a>

                        <ul>
                            <li class="dropdown"><a href="{{ route('assignment.index') }}"><span>Assignment</span></a>
                            </li>
                            <li class="dropdown"><a href="{{ route('studymaterials.show') }}"><span>Study Materials</span></a></li>
                            <li class="dropdown"><a href="{{ route('important.dates') }}"><span>Important Dates</span></a></li>
                            <li class="dropdown"><a href="{{ route('guidelines') }}"><span>Guidelines</span></a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('contact.index') }}"
                            class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="border:none;background-color:white;">Logout</button>
                        </form>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            {{-- <a class="btn-getstarted" href="courses">Get Started</a> --}}

            {{-- <a href="{{ url('/notify') }}">Trigger Notification</a> --}}
            @if (session('success'))
                <div class="notification" id="notification">
                    {{ session('success') }}
                    <div class="notification-bar"></div>
                </div>
            @endif


        </div>
    </header>
