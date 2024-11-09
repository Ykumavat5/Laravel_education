@extends('template.main')
@section('main-section')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Trainers</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Trainers</h1>
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                                Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- End Page Title -->

        <!-- Trainers Section -->
        <section id="trainers" class="section trainers">

            <div class="container">

                <div class="row gy-5">
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100" style="margin: 0 30%;">
                        <div class="member-img">
                            <img src="{{ asset($trainer->user->profile_photo_path) }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>{{ $trainer->user->name }}</h4>
                            <span>{{ $trainer->department }}</span>
                            <p>{{ $trainer->description }}</p>
                            <p>Qualification : {{ $trainer->qualifications }}</p>
                            <p>Experience: {{ \Carbon\Carbon::parse($trainer->hire_date)->diffInYears(now()) }} years</p>
                        </div>
                      
                    </div>
                </div>
            </div>

        </section><!-- /Trainers Section -->

    </main>
@endsection
