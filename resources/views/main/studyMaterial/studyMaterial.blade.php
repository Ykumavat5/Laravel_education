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

        .assignment-card {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .assignment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .assignment-link {
            text-decoration: none;
            color: #333;
        }

        .assignment-header {
            margin-bottom: 10px;
        }

        .assignment-subject {
            font-weight: bold;
            color: #007BFF;
            /* Bootstrap primary color */
        }

        .assignment-due-date {
            color: #888;
            font-style: italic;
        }
    </style>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Study Material</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Study Material</h1>
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio
                                sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus
                                dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- End Page Title -->

        <!-- assignments Section -->
        <section id="courses" class="courses section">

            <div class="container">
                <h3>Study Material</h3>

                <div class="row">
                    <form action="{{ route('trainers.store') }}" method="post" data-aos="fade-up" data-aos-delay="200"
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
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter title" required="" value="{{ old('title') }}">
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
                                <label for="file">File</label>
                                <input type="file" name="file" id="file" required>
                                <span class='text-danger'>
                                    @error('file')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>

                        <div class="col-md-12 text-center">
                            <button class="btn btn-success" type="submit">Add</button>
                        </div>
                    </form>
                </div>

            </div>

        </section>
        <!-- /assignments Section -->

    </main>
@endsection
