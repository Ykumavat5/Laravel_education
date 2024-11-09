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
        </div><!-- End Page Title -->

        <!-- Events Section -->
        <section id="events" class="events section">

            <div class="container my-5 " style="margin: 10% 20%;">
                <div class="row">
                    <div class="col-9">

                        @if (session('success'))
                            <div class="alert alert-success" id='notification'>
                                {{ session('success') }}
                                <div class="notification-bar"></div>

                            </div>
                        @endif
                        <h3 class="text-center">Event Registeration form</h3>
                        <br>
                        <form action="{{ route('events.store', $id) }}" method="post" data-aos="fade-up"
                            data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="text" class="form-control"
                                        value="{{ $event->id . ' - ' . $event->title }}" readonly>

                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="location" value="{{ $event->location }}">
                                    <input type="text" class="form-control" value="{{ $event->location }}" readonly>

                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="location" value="{{ $event->location }}">
                                    <input type="text" class="form-control" value="{{ $event->event_date }}" readonly>

                                </div>
                                <div class="col-md-12">
                                    <label for="user_name">Your Name</label>
                                    <input type="text" id="user_name" name="name" class="form-control"
                                        placeholder="Your Name" required="" value="{{ Auth()->user()->name }}">
                                </div>

                                <div class="col-md-12">
                                    <label for="email">Your Registered Email Id</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Your Email" minlength="2" maxlength="5" required=""
                                        value="{{ Auth()->user()->email }}">
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading" style="display:none;">Loading</div>
                                    <div class="error"></div>
                                    <div class="success"></div>

                                    <button class="btn btn-success" type="submit">Register</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </section><!-- /Events Section -->

    </main>
  
@endsection
