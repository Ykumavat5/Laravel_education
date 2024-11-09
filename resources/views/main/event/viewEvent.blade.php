@extends('template.main')
@section('main-section')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Events</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Events</h1>
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio
                                sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus
                                dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- End Page Title -->

        <!-- Events Section -->
        <section id="events" class="events section">

            <div class="container" data-aos="fade-up">

                {{-- <div class="row">

                    <div class="col-md-6 d-flex align-items-stretch"> --}}
                <div style="margin-left: 20%;">
                    <img src="{{ asset($events->image) }}" alt="event">
                </div>
                <div style="margin: 5% 20%;">
                    <h5 class="card-title">
                        <strong>{{ $events->title }}</strong>
                    </h5>
                    <p class="fst-italic text-center">
                        {{ \Carbon\Carbon::parse($events->timestamp)->format('l, F jS \a\t g:i a') }}</p>
                    <p class="card-text">{{ $events->description }}</p>
                    <p class="card-text">Max Participants : {{ $events->max_participants }}</p>
                    <p>Available Spots: {{ $availableSpots }}</p>
                    @if ($availableSpots > 0)
                        <a href="/events/{{ $events->id }}/register">
                            <button
                                style="border-radius: 50px;background-color: #5fcf80; margin:0 40%;padding:10px 15px;color:azure;border:none;">
                                Enroll Now
                            </button>
                        </a>
                    @else
                        <p>Sorry, this event is full.</p>
                    @endif
                </div>
                {{-- </div>

                </div> --}}

            </div>

        </section><!-- /Events Section -->

    </main>
@endsection
