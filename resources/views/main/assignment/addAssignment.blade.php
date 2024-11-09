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

                    <form action="{{ route('assignment.add', $assignment->id) }}" method="post" data-aos="fade-up"
                        data-aos-delay="200" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <strong>Add Assignment</strong>
                            </div>
                            <div class="col-md-12">
                                <label for="image">Image</label>
                                <input type="file" name="file" id="image" required> <span class='text-danger'>
                                    <span class='text-danger'>
                                        @error('file')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-success" type="submit">Add</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </section><!-- /assignments Section -->

    </main>
@endsection
