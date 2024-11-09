@extends('template.main')
@section('main-section')
    <style>
        /* Custom styles for pagination */
        .pagination {
            margin-top: 25px;
            /* Example margin */
            display: flex;
            justify-content: center;
            /* Centering the pagination */
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px;
            /* Padding for pagination items */
            border: 1px solid #ccc;
            /* Border style */
            margin: 0 5px;
            /* Spacing between items */
            border-radius: 4px;
            /* Rounded corners */
            text-decoration: none;
            /* Remove underline */
            color: #007bff;
            /* Link color */
        }

        .pagination .active {
            background-color: #007bff;
            /* Active item background */
            color: #ffffff;
            /* Active text color */
        }

        .pagination a:hover {
            background-color: #f0f0f0;
            /* Hover effect */
        }
    </style>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Courses</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Courses</h1>
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio
                                sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus
                                dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div><!-- End Page Title -->

        <!-- Courses Section -->
        <section id="courses" class="courses section">

            <div class="container">

                <div class="row">

                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                                <a href="/course-details/{{ $course->id }}">

                                    <img src="{{ $course->image }}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <p class="category">{{ $course->categories[0]->name }}</p>
                                            <p class="price">
                                                {{ $course->is_free == 1 ? 'Free' : '$' . $course->price }}
                                            </p>
                                        </div>

                                        <h3><a href="/course-details/{{ $course->id }}">{{ $course->title }}</a></h3>
                                        <p class="description">{{ $course->description }}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <img src="{{ $course->teacher->user->profile_photo_path }}" class="img-fluid" alt="">
                                                <a href="#" class="trainer-link">{{ $course->teacher->user->name }}</a>
                                            </div>
                                            <div class="trainer-rank d-flex align-items-center">
                                                <i class="bi bi-person user-icon"></i>&nbsp;50
                                                &nbsp;&nbsp;
                                                <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Course Item-->
                    <div class="flex items-center justify-between m-5" >
                        <div>
                            {{ $courses->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Courses Section -->

    </main>
@endsection
