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

        </div><!-- End Page Title -->

        <!-- assignments Section -->
        <section id="courses" class="courses section">

            <div class="container">
                <h3>Assignment</h3>

                <div class="row">
                    @if (Auth()->user()->role == 'teacher')
                        {{ 'teacher' }}
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ route('assignment.create') }}" class="btn-get-started">Add new assignment</a>
                            </div>
                        </div>
                        @if ($assignments->isEmpty())
                            <div class="col-12">
                                <p>No assignments available at the moment.</p>
                            </div>
                        @else
                            <div class="col-12">
                                <div class="assignment-table">
                                    <table style=" margin: 0 auto;text-align: center;"
                                        class="table table-bordered text-center mx-auto" style="width: 80%;">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Subject</th>
                                                <th>Description</th>
                                                <th>Due Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignments as $assignment)
                                                <div class="d-flex justify-content-between align-items-center mb-3 p-2">
                                                    <div class="assignment-details d-flex flex-grow-1">
                                                        <tr>
                                                            <td><strong>{{ $assignment->title }}</strong></td>
                                                            <td>{{ $assignment->subject }}</td>
                                                            <td>{{ $assignment->description }}</td>
                                                            <td>
                                                                <span
                                                                    style="color: {{ $assignment->due_date >= now() ? 'red' : 'black' }}">
                                                                    Due:
                                                                    {{ \Carbon\Carbon::parse($assignment->due_date)->format('F j, Y') }}
                                                                    {{ $assignment->due_date < now() ? 'red' : 'black' }}
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('assignment.show', $assignment->id) }}"
                                                                    class="btn btn-primary m-2">View</a>
                                                                <a href="{{ route('assignment.edit', $assignment->id) }}"
                                                                    class="btn btn-primary m-2">Edit</a>
                                                                <form
                                                                    action="{{ route('assignment.destroy', $assignment->id) }}"
                                                                    method="POST" style="display:inline;"
                                                                    onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger m-2">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                    </div>

                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @else
                        {{ 'student' }}
                        @if ($assignments->isEmpty())
                            <div class="col-12">
                                <p>No assignments available at the moment.</p>
                            </div>
                        @else
                            <div class="col-12">
                                <div class="assignment-table">
                                    <table style=" margin: 0 auto;text-align: center;"
                                        class="table table-bordered text-center mx-auto" style="width: 80%;">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Subject</th>
                                                <th>Description</th>
                                                <th>Due Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignments as $assignment)
                                                <div class="d-flex justify-content-between align-items-center mb-3 p-2">
                                                    <div class="assignment-details d-flex flex-grow-1">
                                                        <tr>
                                                            <td>
                                                                <strong class="me-2 mr-5">{{ $assignment->title }}</strong>
                                                            </td>
                                                            <td>
                                                                <span class="me-2">{{ $assignment->subject }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="me-2">{{ $assignment->description }}</span>
                                                            </td>
                                                            
                                                            <td>
                                                                <span
                                                                    style="color: {{ $assignment->due_date <= now() ? 'red' : 'black' }}">
                                                                    Due:
                                                                    {{ \Carbon\Carbon::parse($assignment->due_date)->format('F j, Y') }}
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('assignment.show', $assignment->id) }}"
                                                                    class="btn btn-primary">View</a>
                                                            </td>
                                                        </tr>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                    @endif

                    <!-- End assignment Item-->
                    <div class="flex items-center justify-between m-5">
                        <div>
                            {{ $assignments->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- /assignments Section -->

    </main>
@endsection
