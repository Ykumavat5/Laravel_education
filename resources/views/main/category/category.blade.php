@extends('template.main')
@section('main-section')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            border: none;
            /* Remove default border */
            transition: transform 0.2s;
            /* Smooth hover effect */
        }

        .card:hover {
            transform: scale(1.05);
            /* Slightly enlarge on hover */
        }

        .card-title {
            height: 5rem;
        }

        .card-title a {
            color: #007bff;
            /* Customize link color */
        }

        .card-title a:hover {
            text-decoration: underline;
            /* Underline on hover */
        }

        .card {
            border: 1px solid #dee2e6;
            /* Custom border color */
            border-radius: 0.5rem;
            /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Custom box shadow */
            transition: transform 0.2s;
            /* Smooth hover effect */
        }

        .card:hover {
            transform: scale(1.05);
            /* Slightly enlarge on hover */
        }
    </style>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Category<br></li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->


        <!-- About Us Section -->
        <section id="about-us" class="section about-us">
            <div class="container" style="height: 30rem;">
                <div class="row">

                    <div class="col-lg-11">

                        <!-- All Category Section -->
                        <div class="container" data-aos="fade-up" data-aos-delay="100">
                            <h2>All Categories</h2>
                            <hr>
                            <div class="row g-5">
                                @foreach ($allCategories as $category)
                                    {{-- <div class="col-lg-4">
                                        <div class="post-entry lg">
                                            <h2>
                                                <a href="{{ route('categorys.show', $category->id) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </h2>
                                            <p class="my-4 d-block">Explore the latest trends in this category and find out
                                                more about popular topics.</p>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-4">
                                        <div class="card mb-4 border shadow-sm">
                                            <a href="{{ route('categorys.show', $category->id) }}">
                                                <div class="card-body">
                                                    <h2 class="card-title">
                                                        <a href="{{ route('categorys.show', $category->id) }}"
                                                            class="text-decoration-none text-dark">
                                                            {{ $category->name }}
                                                        </a>
                                                    </h2>
                                                    <p class="card-text my-4">Explore the latest trends in this category and
                                                        find out more about popular topics.</p>
                                                    <a href="{{ route('categorys.show', $category->id) }}"
                                                        class="btn btn-primary">View </a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="flex items-center justify-between m-5">
                                <div>
                                    {{ $allCategories->links('vendor.pagination.tailwind') }}
                                </div>
                            </div>

                        </div>
                        <!-- /All Category Section -->

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
