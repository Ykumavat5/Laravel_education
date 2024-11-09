@extends('template.main')
@section('main-section')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li><a href="/categorys">Categorys</a></li>
                        <li class="current">Category<br></li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->


        <!-- About Us Section -->
        <section id="about-us" class="section about-us">
            <div class="container">
                <div class="row">

                    <div class="col-lg-11">

                        <!-- All Category Section -->
                        <div class="container" data-aos="fade-up" data-aos-delay="100">

                            <div class="post-entry lg text-center">
                                <h2>
                                    <a href="{{ route('categorys.show', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </h2>
                                <p class="my-4 d-block">Explore the latest trends in this category and find out
                                    more about popular topics.</p>
                                <hr>
                            </div>

                        </div>
                        <!-- /All Category Section -->

                    </div>
                </div>
                <section id="courses" class="courses section">

                    <div class="container">

                        <div class="row">

                            @foreach ($category->courses as $course)
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                                    data-aos-delay="100">
                                    <div class="course-item">
                                        <a href="/course-details/{{ $course->id }}">
                                            <img src="{{ asset($course->image) }}" class="img-fluid" alt="...">
                                            <div class="course-content">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <p class="category">{{ $category->name }}</p>
                                                    <p class="price">
                                                        {{ $course->is_free == 1 ? 'Unlimited Access' : '$' . $course->price }}
                                                    </p>
                                                </div>
                                                <h3><a href="/course-details/{{ $course->id }}">{{ $course->title }}</a>
                                                </h3>
                                                <p class="description">{{ $course->description }}</p>
                                                <div class="trainer d-flex justify-content-between align-items-center">
                                                    <div class="trainer-profile d-flex align-items-center">
                                                        <img src="{{ asset($course->teacher->profile_image) }}"
                                                            class="img-fluid" alt="">
                                                        <a href="#"
                                                            class="trainer-link">{{ $course->teacher->name }}</a>
                                                    </div>
                                                    <div class="trainer-rank d-flex align-items-center">
                                                        <i class="bi bi-person user-icon"></i>&nbsp;50&nbsp;
                                                        &nbsp;
                                                        <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Course Item-->

                        </div>

                    </div>

                </section>
                <!-- /Courses Section -->
            </div>
        </section>
    </main>
    <style>
        .course-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .course-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);

        }

        .course-item img {
            transition: transform 0.3s ease;
        }

        .course-item:hover img {
            transform: scale(1.1);
        }
    </style>
@endsection
