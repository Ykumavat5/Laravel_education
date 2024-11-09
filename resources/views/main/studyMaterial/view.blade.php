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

        /* Container for media items */
        .media-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* border: 1px solid #ddd; */
            border-radius: 8px;
            overflow: hidden;
        }

        /* PDF Icon */
        .media-thumbnail {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .media-content {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Media Info */
        .media-info {
            padding: 15px;
            text-align: center;
        }

        /* Ensure text doesn't overflow */
        .media-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 10px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Buttons */
        .btn {
            margin: 5px;
        }

        /* Description text and title styling */
        .course-content {
            padding: 10px;
            background-color: #f8f9fa;
        }

        /* Trainer Profile */
        .trainer-profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        /* Make sure the columns are responsive */
        @media (max-width: 768px) {
            .media-content {
                height: 180px;
                /* Adjust for smaller screens */
            }
        }
    </style>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="dashboard">Home</a></li>
                        <li class="current">Study Materials</li>
                    </ol>
                </div>
            </nav>
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Study Materials</h1>
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

                    @foreach ($materials as $material)
                        {{-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                                <a href="#">

                                    @php
                                        $filePath = $material->file; // Assuming $material->file contains the storage path
                                        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                        $fileName = pathinfo($filePath, PATHINFO_BASENAME); // Get the file name for display
                                    @endphp

                                    <div class="media-container">
                                        <div class="media-card m-4">
                                            @if ($fileExtension == 'pdf')
                                                <div class="pdf-preview">
                                                    <!-- PDF Icon Image -->
                                                    <img src="{{ asset('storage/uploads/pdf-icon.png') }}" alt="PDF Preview"
                                                        class="media-thumbnail m-5">

                                                    <div class="media-info">
                                                        <p class="media-title mt-4">{{ $fileName }}</p>

                                                        <!-- Download Button -->
                                                        <a href="{{ asset($filePath) }}" class="btn btn-primary"
                                                            download>Download</a>

                                                        <!-- View Button (opens in new tab) -->
                                                        <a href="{{ asset($filePath) }}" class="btn btn-secondary"
                                                            target="_blank">Preview</a>
                                                    </div>
                                                </div>
                                            @elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                                <img src="{{ asset($filePath) }}" alt="Image" class="media-content"
                                                    style="width: 350px;height:300px;" />
                                                <div class="media-info">
                                                    <p class="media-title">{{ $fileName }}</p>

                                                    <!-- Download Button -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-primary"
                                                        download>Download</a>

                                                    <!-- View Button (opens in new tab) -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-secondary"
                                                        target="_blank">Preview</a>
                                                </div>
                                            @elseif (in_array($fileExtension, ['mp4', 'webm', 'ogg']))
                                                <video controls class="media-content" style="width: 300px;height:300px;">
                                                    <source src="{{ asset($filePath) }}" type="video/{{ $fileExtension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <div class="media-info">
                                                    <p class="media-title">{{ $fileName }}</p>

                                                    <!-- Download Button -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-primary"
                                                        download>Download</a>

                                                    <!-- View Button (opens in new tab) -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-secondary"
                                                        target="_blank">Preview</a>
                                                </div>
                                            @else
                                                <p class="unsupported-message">Unsupported file type.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="media-container">
                                        <div class="media-card m-4">
                                            @if ($fileExtension == 'pdf')
                                                <div class="pdf-preview">
                                                    <!-- PDF Icon Image -->
                                                    <img src="{{ asset('storage/uploads/pdf-icon.png') }}" alt="PDF Preview"
                                                        class="media-thumbnail m-5">
                                                    <div class="media-info">
                                                        <p class="media-title mt-4">{{ $fileName }}</p>

                                                        <!-- Download Button -->
                                                        <a href="{{ asset($filePath) }}" class="btn btn-primary"
                                                            download>Download</a>

                                                        <!-- View Button (opens in new tab) -->
                                                        <a href="{{ asset($filePath) }}" class="btn btn-secondary"
                                                            target="_blank">Preview</a>
                                                    </div>
                                                </div>
                                            @elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                                <!-- Image with Fixed Size -->
                                                <img src="{{ asset($filePath) }}" alt="Image" class="media-content" />
                                                <div class="media-info">
                                                    <p class="media-title">{{ $fileName }}</p>

                                                    <!-- Download Button -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-primary"
                                                        download>Download</a>

                                                    <!-- View Button (opens in new tab) -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-secondary"
                                                        target="_blank">Preview</a>
                                                </div>
                                            @elseif (in_array($fileExtension, ['mp4', 'webm', 'ogg']))
                                                <!-- Video with Fixed Size -->
                                                <video controls class="media-content">
                                                    <source src="{{ asset($filePath) }}" type="video/{{ $fileExtension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <div class="media-info">
                                                    <p class="media-title">{{ $fileName }}</p>

                                                    <!-- Download Button -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-primary"
                                                        download>Download</a>

                                                    <!-- View Button (opens in new tab) -->
                                                    <a href="{{ asset($filePath) }}" class="btn btn-secondary"
                                                        target="_blank">Preview</a>
                                                </div>
                                            @else
                                                <p class="unsupported-message">Unsupported file type.</p>
                                            @endif
                                        </div>
                                    </div>

                                </a>
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="category">{{ $material->title }}</p>

                                    </div>
                                    <h3><a href="#">Title : {{ $material->title }}</a>
                                    </h3>
                                    <p class="description">Description : {{ $material->description }}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="{{ asset($material->teacher->profile_image) }}" class="img-fluid"
                                                    alt="">
                                            <a href="#" class="trainer-link">By : {{ $material->teacher->name }}</a>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div> --}}
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                                <a href="#">
                                    @php
                                        $filePath = $material->file; // Assuming $material->file contains the storage path
                                        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                        $fileName = pathinfo($filePath, PATHINFO_BASENAME); // Get the file name for display
                                    @endphp
                        
                                    <div class="media-container">
                                        <div class="media-card m-4">
                                            @if ($fileExtension == 'pdf')
                                                <div class="pdf-preview">
                                                    <!-- PDF Icon Image -->
                                                    <img src="{{ asset('storage/uploads/pdf-icon.png') }}" alt="PDF Preview"
                                                        class="media-thumbnail m-3 mx-2">
                                                    
                                                </div>
                                            @elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                                <!-- Image with Fixed Size -->
                                                <img src="{{ asset($filePath) }}" alt="Image" class="media-content" />
                                                
                                            @elseif (in_array($fileExtension, ['mp4', 'webm', 'ogg']))
                                                <!-- Video with Fixed Size -->
                                                <video  class="media-content">
                                                    <source src="{{ asset($filePath) }}" type="video/{{ $fileExtension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                                
                                            @else
                                                <p class="unsupported-message">Unsupported file type.</p>
                                            @endif
                                        </div>

                                    </div>
                                </a>
                        
                                <div class="course-content">
                                    <div class="media-info">
                                        <p class="media-title mt-4">{{ $fileName }}</p>
                                        <!-- Download Button -->
                                        <a href="{{ asset($filePath) }}" class="btn btn-primary" download>Download</a>
                                        <!-- View Button (opens in new tab) -->
                                        <a href="{{ asset($filePath) }}" class="btn btn-secondary" target="_blank">Preview</a>
                                    </div>
                                    <h3><a href="#">Title : {{ $material->title }}</a></h3>
                                    <p class="description">Description : {{ $material->description??'none' }}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <a href="#" class="trainer-link">By : {{ $material->teacher->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                    <!-- End Course Item-->

                </div>

            </div>

        </section>
        <!-- /assignments Section -->

    </main>
@endsection
