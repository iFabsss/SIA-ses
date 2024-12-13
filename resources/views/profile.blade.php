<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/enrollment.css') }}">
    <script src="{{ asset('js/enrollment.js') }}"></script>
    <title>Enrollment</title>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">
                        <i class="fas fa-solid fa-house"></i>
                        <span class="nav-item">Home</span>
                    </a></li>

                <li><a href="#" class="balance-btn">
                        <i class="fas fa-solid fa-dollar-sign"></i>
                        <span class="nav-item">Balance</span>
                    </a></li>

                <li><a href="#">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a></li>

                <li><a href="logout" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>


        <section class="main">
            <div class="main-top">
                <h1>YouNeverSeeTea Enrollment Management System</h1>
            </div>
            <div class="users">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger text-center" style="color: red">
                            <ul class="mb-0" style="list-style-type: none; padding: 0; margin:0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success text-center" style="color: green">
                            <ul class="mb-0" style="list-style-type: none; padding: 0; margin: 0;">
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="enrollment-form">
                        @if ($studentInfo)
                            <div class="profile-container">
                                <!-- Display student's existing profile -->
                                <center>
                                    <h3 class="profile-heading">Student Profile:</h3>
                                </center>
                                <p><strong class="profile-label">Name:</strong> {{ $studentInfo->firstName }}
                                    {{ $studentInfo->middleName }}
                                    {{ $studentInfo->lastName }}</p>
                                <p><strong class="profile-label">Gender:</strong> {{ $studentInfo->gender }}</p>
                                <p><strong class="profile-label">Age:</strong> {{ $studentInfo->age }}</p>
                                <p><strong class="profile-label">Contact Number#:</strong>
                                    {{ $studentInfo->contactNumber }}</p>
                                <p><strong class="profile-label">Email:</strong> {{ $studentInfo->email }}</p>
                                <p><strong class="profile-label">Address:</strong> {{ $studentInfo->address }}</p>
                                <p><strong class="profile-label">Program:</strong> {{ $studentInfo->program }}</p>
                                <p><strong class="profile-label">Course Year:</strong> {{ $studentInfo->courseYear }}
                                </p>
                            </div>
                        @else
                            <form id="profile-form" action="saveStudent" method="POST">
                                @csrf
                                <!-- Name Section -->

                                <div class="name-section">
                                    <label for="first-name">First Name:</label>
                                    <input type="text" id="first-name" name="first-name" placeholder="First Name"
                                        required>

                                    <label for="middle-initial">Middle Name:</label>
                                    <input type="text" id="middle-initial" name="middle-name"
                                        placeholder="Middle Name">

                                    <label for="last-name">Last Name:</label>
                                    <input type="text" id="last-name" name="last-name" placeholder="Last Name"
                                        required>
                                </div>

                                <!-- Gender and Age Section -->
                                <div class="gender-age-section">
                                    <label for="gender">Gender:
                                        <select id="gender" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </label>


                                    <label for="age">Age:
                                        <input type="number" id="age" class="age" name="age"
                                            placeholder="Age" required>
                                    </label>


                                    <label for="birthdate">Birthdate:
                                        <input type="date" id="birthdate" name="birthdate" required>
                                    </label>
                                </div>

                                <!-- Address Section -->
                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address" placeholder="Enter your address"
                                    required>

                                <!-- Contact Information Section -->
                                <div class="contact-section">
                                    <label for="contact-number">Contact Number:</label>
                                    <input type="tel" id="contact-number" name="contact-number"
                                        placeholder="Contact Number: 09xx-xxx-xxxx"
                                        pattern="09[0-9]{2}-[0-9]{3}-[0-9]{4}" required>

                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" placeholder="Email"
                                        required>
                                </div>

                                <!-- Program and Course Year Section -->
                                <div class="program-year-section">
                                    <label for="course-year">Course Year:</label>
                                    <select id="course-year" name="course-year">
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                        <option value="5">5th Year</option>
                                        <option value="6">6th Year</option>
                                    </select>

                                    <label for="program">Program:</label>
                                    <select id="program" name="program">
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->programName }}">{{ $program->programName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" id="saveProfileBtn">Save</button>

                            </form>
                        @endif

                        @if ($studentInfo)
                            <form id="enrollment-form" action="enroll" method="POST">
                                @csrf
                                <div class="available-courses-dropdown">
                                    <center>
                                        <h3>Courses:</h3>
                                    </center>
                                    <div class="dropdown-content">
                                        @if (count($availableCourses) > 0)
                                            @foreach ($availableCourses as $course)
                                                <div class="courseRow">
                                                    <label>
                                                        <input type="checkbox" value="{{ $course->courseID }}"
                                                            name="registeredCourses[]"
                                                            @if (in_array($course->courseID, $enrolledCourses)) checked disabled @endif>
                                                        {{ $course->courseID }} - {{ $course->courseName }}
                                                    </label>

                                                    @php
                                                        // Get the enrolled section ID for the current course, if any
                                                        $sectionID = null;
                                                        foreach ($enrolledSections as $enrolledSection) {
                                                            if ($enrolledSection->courseID == $course->courseID) {
                                                                $sectionID = $enrolledSection->sectionID;
                                                                break;
                                                            }
                                                        }
                                                    @endphp

                                                    <input class="registeredSection" type="text"
                                                        name="registeredSections[]" placeholder="No section selected"
                                                        value="{{ $sectionID ? $sectionID : '' }}" readonly>

                                                    <button type="button" id="{{ $course->courseID }}"
                                                        class="viewSectionBtn" onclick="viewCourseSections(this.id)">
                                                        View sections
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>

                                <div id="courseSectionModal" class="modal" data-course-id="">
                                    <div class="modal-content">
                                        <span class="close-modal">&times;</span>
                                        <h2>Course Sections</h2>
                                        <div id="courseSectionContent"></div>
                                    </div>
                                </div>

                                <!-- Buttons Section -->
                                <div class="form-buttons">
                                    <button type="submit" id="enrollBtn">Enroll</button>
                                </div>
                            </form>
                            <script>
                                const form = document.getElementById('enrollment-form');
                                form.addEventListener('submit', function(event) {
                                    // Enable all disabled inputs
                                    let inputs = document.querySelectorAll('input[disabled]');
                                    inputs.forEach(input => input.removeAttribute('disabled'));

                                    console.log("TESTTTTTT");
                                    const registeredSections = form.querySelectorAll('input[name="registeredSections[]"]');
                                    const registeredCourses = form.querySelectorAll('input[name="registeredCourses[]"]');
                                    let sectionValues = [];
                                    console.log(registeredCourses);
                                    registeredSections.forEach(input => {
                                        sectionValues.push(input.value); // Get the value of each input
                                    });

                                    // Log the values to the console
                                    console.log('Registered Sections:', sectionValues);
                                });
                            </script>
                        @endif
                    </div>



                </div>
            </div>

            <div id="balance-modal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Balance Information</h2>
                    <p>Your current balance is displayed here. Add more details if needed.</p>
                </div>
            </div>

            <!-- Verification Modal -->
            <!-- Verification Modal -->
            <div id="verification-modal" class="modal verification-modal">
                <div class="modal-content">
                    <span class="close-verification">&times;</span>
                    <h2>Verification</h2>
                    <p>Are you sure you want to select a section? Please confirm your action.</p>
                    <button id="confirm-selection" class="btn">Yes</button>
                    <button id="cancel-selection" class="btn">Cancel</button>
                </div>
            </div>



    </div>



</body>

</html>
