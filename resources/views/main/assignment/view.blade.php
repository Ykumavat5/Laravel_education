@extends('template.main')
@section('main-section')
    <style>
        /* Custom styles for pagination */
        .pagination {
            margin-top: 25px;
            display: flex;
            justify-content: center;
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px;
            border: 1px solid #ccc;
            margin: 0 5px;
            border-radius: 4px;
            text-decoration: none;
            color: #007bff;
        }

        .pagination .active {
            background-color: #007bff;
            color: #ffffff;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
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
                            <p class="mb-0">Odio et unde deleniti...</p>
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
                    <div class="col-md-12">
                        <h4 class="text-center">Assignment</h4>
                        <p><strong>Title:</strong> <span><strong>{{ $assignment->title }}</strong></span></p>
                        <p><strong>Subject:</strong> <span>{{ $assignment->subject }}</span></p>
                        <p><strong>Description:</strong> <span>{{ $assignment->description }}</span></p>
                        <p><strong>Due Date:</strong>
                            <span>{{ \Carbon\Carbon::parse($assignment->due_date)->format('F j, Y') . ' ' . \Carbon\Carbon::parse($assignment->time)->format('h:i A') }}</span>
                        </p>
                        <p>
                            @if ($assignment->image)
                                <strong>Image:</strong>
                                <img src="{{ asset('storage/' . $assignment->image) }}" alt="Assignment Image"
                                    class="img-thumbnail" style="max-width: 300px;">
                            @endif
                        </p>

                        <!-- Check if the submission exists -->
                        <p>
                            @if ($submission)
                                <strong>Your Submission:</strong>
                                <span>Submitted on
                                    {{ \Carbon\Carbon::parse($submission->created_at)->format('F j, Y') }}</span>
                                <br>
                                <br>
                                @php
                                    $filePath = $submission->file;
                                    $fileName = basename($filePath);
                                @endphp

                                <div class="assignment">
                                    <p><strong>Submitted Assignment:</strong> {{ $fileName }}</p>
                                    <a href="{{ $filePath }}" target="_blank" class="btn btn-primary">View
                                        Assignment</a>
                                    <p>
                                    <form action="{{ route('assignment.delete', $assignment->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this assignment?');">Delete
                                            Assignment</button>
                                    </form>


                                    {{-- </div> --}}
                                @else
                                    <strong>No submission found.</strong>
                                    <br>
                                    <a href="{{ route('assignment.add', $assignment->id) }}">
                                        <button class="btn btn-success">Add Assignment</button>
                                    </a>
                            @endif
                        </p>
                    </div>

                    <div class="col-md-12 text-center">
                        <button class="btn btn-success" type="button" onclick="window.history.back()">Back</button>
                    </div>
                </div>
            </div>
        </section><!-- /assignments Section -->

    </main>
@endsection
