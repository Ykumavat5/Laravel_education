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

                <div class="row">

                    @foreach ($events as $event)
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card">
                                <a href="/events/{{ $event->id }}">
                                    <div class="card-img">

                                        <img src="{{ $event->image }}" alt="event image">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="/events/{{ $event->id }}">{{ $event->title }}</a>
                                        </h5>
                                        <p class="fst-italic text-center">
                                            {{ \Carbon\Carbon::parse($event->timestamp)->format('l, F jS \a\t g:i a') }}</p>
                                        <p class="card-text">{{ $event->description }}</p>
                                        <p class="card-text">Max Participants : {{ $event->max_participants }}</p>
                                        <p>Available Spots: {{ $event->availableSpots() }}</p>
                                        @if ($event->availableSpots() > 0)
                                            <a href="/events/{{ $event->id }}/register">
                                                <button
                                                    style="border-radius: 50px;background-color: #5fcf80; margin:0 30%;padding:10px 15px;color:azure;border:none;">
                                                    Enroll Now
                                                </button>
                                            </a>   
                                        @else
                                            <p class="text-danger">Sorry, this event is full.</p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section><!-- /Events Section -->

    </main>
@endsection
