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
                        <li class="current">Assignments</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Assignments</h1>
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio
                                sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus
                                dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Page Title -->

        <!-- assignments Section -->
        <section id="courses" class="courses section">

            <div class="container">
                <div class="row">

                    <form action="{{ route('assignment.store') }}" method="post" data-aos="fade-up" data-aos-delay="200"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-12">

                                <select id="courseSelect" name='standard_division_id' class="form-control"
                                    onchange="updateCourseId()">
                                    <option value="">Select a class id to assign task</option>
                                    @foreach ($divisionStandardIds as $divisionStandardId)
                                        <option value="{{ $divisionStandardId->id }}">
                                            {{ $divisionStandardId->id . ' ' . $divisionStandardId->division->division . ' ' . $divisionStandardId->standard->standard }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class='text-danger'>
                                    @error('standard_division_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="col-md-6">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control"
                                    placeholder="Enter Subject Name" required="" value="{{ old('subject') }}">
                                <span class='text-danger'>
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                    placeholder="Your title" required="" value="{{ old('title') }}">
                                <span class='text-danger'>
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" id='description' name="description" placeholder="Your title"
                                    value="{{ old('description') }}"></textarea>
                                <span class='text-danger'>
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" required> <span class='text-danger'>
                                    <span class='text-danger'>
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>

                            <div class="col-md-6 mb-5">
                                <label for="datepicker">Due Date : * </label>
                                <input type="text" id="datepicker" name="duedate" class="form-control"
                                    oninput="this.className=''" autocomplete="off" value='{{ old('duedate') }}'>
                                <span class='text-danger'>
                                    @error('duedate')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6 mb-5">
                                <label for="time">Time</label>
                                <div class="input-group date" id="timePicker">
                                    <input type="text" name='time' class="form-control timePicker"
                                        value="{{ old('time') }}">
                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    <span class='text-danger'>
                                        @error('time')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="error"></div>
                            <div class="success"></div>

                            <button class="btn btn-success" type="submit">Add</button>
                        </div>
                    </form>

                </div>

            </div>

        </section><!-- /assignments Section -->

    </main>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>


    {{-- <script>
        var firstOpen = true;
        var time;
        $('#timePicker').datetimepicker({
            useCurrent: false,
            format: "hh:mm A"
        }).on('dp.show', function() {
            if (firstOpen) {
                time = moment().startOf('day');
                firstOpen = false;
            } else {
                time = "01:00 PM"
            }
            $(this).data('DateTimePicker').date(time);
        });
    </script> --}}

    <script>
        var firstOpen = true;
        var time;

        $('#timePicker').datetimepicker({
            useCurrent: false,
            format: "HH:mm:ss" // Change to 24-hour format
        }).on('dp.show', function() {
            if (firstOpen) {
                time = moment().startOf('day'); // Sets the initial time to midnight
                firstOpen = false;
            } else {
                time = moment("13:00", "HH:mm:ss"); // Sets the default time to 1 PM (13:00 in 24-hour format)
            }
            $(this).data('DateTimePicker').date(time);
        });
    </script>



    <script>
        jQuery.noConflict();
        jQuery(function($) {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: "0",
                maxDate: "3Y",
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@endsection
