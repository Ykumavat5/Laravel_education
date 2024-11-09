@extends('template.main')
@section('main-section')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Guidelines</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <h1 class="mb-4 text-center">Student Guidelines for the Academic Year 2024 </h1>
                </div>
            </div>
        </div>
        <section id="courses" class="courses section">
            <div class="container">
            
                <div class="row">
                    <!-- General Guidelines Section -->
                    <div class="col-md-6 guideline-item">
                        <h3 class="guideline-title">General Guidelines</h3>
                        <p class="guideline-description">These guidelines are designed to ensure a smooth and productive
                            experience for all students. Please adhere to the rules and policies set forth by the
                            institution:</p>
                        <ul class="guideline-list">
                            <li>Respect for faculty and staff is expected at all times.</li>
                            <li>Academic integrity must be maintained at all times.</li>
                            <li>Students should check their email regularly for updates and announcements.</li>
                            <li>Any form of discrimination or harassment will not be tolerated.</li>
                            <li>Students are expected to attend all lectures and tutorials, unless otherwise excused.</li>
                        </ul>
                    </div>

                    <!-- Registration Guidelines Section -->
                    <div class="col-md-6 guideline-item">
                        <h3 class="guideline-title">Registration Guidelines</h3>
                        <p class="guideline-description">Follow these steps to ensure successful registration:</p>
                        <ul class="guideline-list">
                            <li>Complete the online registration form before the deadline.</li>
                            <li>Ensure that your documents are accurate and up-to-date.</li>
                            <li>Pay the registration fees before the final registration date.</li>
                            <li>Students must register for courses each semester before the designated cutoff date.</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <!-- Exam Guidelines Section -->
                    <div class="col-md-6 guideline-item">
                        <h3 class="guideline-title">Exam Guidelines</h3>
                        <p class="guideline-description">Please ensure the following to successfully appear for your exams:
                        </p>
                        <ul class="guideline-list">
                            <li>Carry your student ID card to the exam hall for identification.</li>
                            <li>Arrive at least 30 minutes before the exam starts to avoid delays.</li>
                            <li>Strictly adhere to the exam timings, and no late arrivals will be allowed.</li>
                            <li>All electronic devices, except for calculators (if required), must be turned off and stored
                                away.</li>
                            <li>Students must refrain from using any unfair means during the exam. Strict action will be
                                taken for any violations.</li>
                        </ul>
                    </div>

                    <!-- Attendance Guidelines Section -->
                    <div class="col-md-6 guideline-item">
                        <h3 class="guideline-title">Attendance Guidelines</h3>
                        <p class="guideline-description">Attendance is an essential part of the learning process. Please
                            follow these rules:</p>
                        <ul class="guideline-list">
                            <li>Students are expected to attend at least 75% of classes in each semester to be eligible for
                                exams.</li>
                            <li>In case of unavoidable absences, students must inform the respective faculty in advance and
                                provide valid reasons.</li>
                            <li>Continuous absence without valid reasons may result in disciplinary actions.</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <!-- Behavior and Discipline Section -->
                    <div class="col-md-6 guideline-item">
                        <h3 class="guideline-title">Behavior and Discipline</h3>
                        <p class="guideline-description">All students are expected to maintain high standards of behavior:
                        </p>
                        <ul class="guideline-list">
                            <li>Respect all faculty members, staff, and peers.</li>
                            <li>Insubordination or any form of misconduct will not be tolerated.</li>
                            <li>Students are expected to behave responsibly both inside and outside the campus.</li>
                        </ul>
                    </div>

                    <!-- Holidays and Breaks Section -->
                    <div class="col-md-6 guideline-item">
                        <h3 class="guideline-title">Holidays and Breaks</h3>
                        <p class="guideline-description">Please take note of the following holidays and breaks during the
                            academic year:</p>
                        <ul class="guideline-list">
                            <li>Winter Break: December 20, 2024 – January 4, 2025</li>
                            <li>Summer Break: June 1, 2025 – July 31, 2025</li>
                            <li>National Holidays: Refer to the university's holiday calendar for specific dates.</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <!-- Contact Guidelines Section -->
                    <div class="col-md-6 guideline-item">
                        <h3 class="guideline-title">Contact Guidelines</h3>
                        <p class="guideline-description">For any assistance or clarification, you can reach out to the
                            following:</p>
                        <ul class="guideline-list">
                            <li><strong>Student Support:</strong> support@educationfirm.com</li>
                            <li><strong>Exams and Registration:</strong> exams@educationfirm.com</li>
                            <li><strong>General Inquiries:</strong> info@educationfirm.com</li>
                            <li><strong>Office Hours:</strong> Monday to Friday, 9:00 AM to 5:00 PM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
