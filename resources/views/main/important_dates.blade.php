@extends('template.main')
@section('main-section')
    <style>
        /* Ensure cards have equal height and margin */
        .important-dates .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* Equal height for all cards */
            margin-bottom: 20px;
            /* Margin between rows */
        }

        .important-dates .row {
            margin-bottom: 30px;
            /* Spacing between rows */
        }

        .important-dates .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .important-dates .card-title {
            font-weight: bold;
            color: #2980b9;
        }

        .important-dates .card-text {
            font-size: 1rem;
            color: #34495e;
        }

        /* Equal width for the cards */
        .important-dates .col-md-4 {
            padding: 10px;
            /* Ensures there is spacing inside the columns */
        }
    </style>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Important Dates</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <h1 class="mb-4 text-center">Important Dates for the Academic Year 2024 </h1>
                </div>
            </div>
        </div>
        <section id="courses" class="courses section">
            <div class="container important-dates">
                <!-- Registration Dates -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">New Student Registration</h5>
                                <p class="card-text"><strong>Start Date:</strong> January 5, 2024</p>
                                <p class="card-text"><strong>End Date:</strong> February 28, 2024</p>
                                <p class="card-text">Ensure you complete your registration process within this window. Late
                                    registrations will incur additional fees.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Exam Dates -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Midterm Exams</h5>
                                <p class="card-text"><strong>Start Date:</strong> March 10, 2024</p>
                                <p class="card-text"><strong>End Date:</strong> March 14, 2024</p>
                                <p class="card-text">Make sure to prepare ahead for the midterm exams. The exams will cover
                                    the first half of the syllabus.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Holiday Dates -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Winter Break</h5>
                                <p class="card-text"><strong>Start Date:</strong> December 20, 2024</p>
                                <p class="card-text"><strong>End Date:</strong> January 4, 2025</p>
                                <p class="card-text">Enjoy your winter break! Classes will resume on January 5, 2025.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Submission -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Project Submission Deadline</h5>
                                <p class="card-text"><strong>Due Date:</strong> April 30, 2024</p>
                                <p class="card-text">Please submit all your final projects by this date to avoid late
                                    submission penalties.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Final Exams -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Final Exam Week</h5>
                                <p class="card-text"><strong>Start Date:</strong> May 10, 2024</p>
                                <p class="card-text"><strong>End Date:</strong> May 15, 2024</p>
                                <p class="card-text">The final exams will cover the entire syllabus. Make sure to revise
                                    thoroughly before the exam week.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Graduation -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Graduation Ceremony</h5>
                                <p class="card-text"><strong>Date:</strong> June 10, 2024</p>
                                <p class="card-text">Join us for the Graduation Ceremony! Be sure to confirm your attendance
                                    and gown order before May 20, 2024.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
