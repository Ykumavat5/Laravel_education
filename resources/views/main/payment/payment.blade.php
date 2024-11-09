@extends('template.main')
@section('main-section')
    <div class="container my-5 " style="margin: 10% 20%;">
        <div class="row">
            <div class="col-9">
                <p>Payment</p>

                <form action="{{ route('courses.store', $id) }}" method="post" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="text" class="form-control" value="{{ $course->id . ' - ' . $course->title }}"
                                readonly>

                        </div>
                        @if ($course->is_free == '0')
                            <div class="col-md-12">
                                <label for='price'>Course Price :- </label>
                                <input type="text" class="form-control" id='price' value="{{ $course->price }}"
                                    readonly>
                            </div> 
                        @endif

                        <div class="col-md-6">
                            <label for="user_name">Your Name</label>
                            <input type="text" id="user_name" name="name" class="form-control" placeholder="Your Name"
                                required="" value="{{ Auth()->user()->name }}">
                        </div>

                        <div class="col-md-6">
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
@endsection
