<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <title>Dashboard</title>
</head>

<body>
    <input type="hidden" id="user-id" value="{{ $userID }}">
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{ route('profile') }}">
                        <i class="fas fa-thin fa-graduation-cap"></i>
                        <span class="nav-item">Enroll</span>
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


            <div class="users" style="display: none;">
                <div class="card">
                    <img src=".jpg" alt="">
                    <button id="profile-btn">Profile</button>
                    <h6> Enrolled? </h6>
                </div>
            </div>

            <div class="details-container">
                <div class="details">
                    <strong><span id="studentNameText">Student Name</span></strong>
                    <strong><span id="studentNumberText">Student Number</span></strong>
                    <strong><span id="studentYearText">Year Level</span></strong>
                    <strong><span id="studentProgramText">Program</span></strong>
                </div>
            </div>

            <section class="schedule">
                <div class="schedule-list">
                    <h1>Course Details</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Section ID</th>
                                <th>Schedule</th>
                                <th>Professor</th>
                            </tr>
                        </thead>
                        <tbody id="dashboardEnrolledCourses">

                        </tbody>
                    </table>
                </div>
            </section>
        </section>

        <div id="profile-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span> <!-- Close button -->
                <h2>Profile Details</h2>
                <div class="modal-details">
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Student Number:</strong> 2024100001</p>
                    <p><strong>Email:</strong> johndoe@example.com</p>
                    <p><strong>Contact:</strong> +63 912 345 6789</p>
                    <p><strong>Program:</strong> BSIT</p>
                    <p><strong>Year Level:</strong> 3rd Year</p>
                </div>
            </div>
        </div>

        <!-- Balance Modal -->
        <div id="balance-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Balance Information</h2>
                <p>Your current balance is displayed here. Add more details if needed.</p>
            </div>
        </div>

        <div id="view-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Course Details</h2>
                <p id="course-details">Details will be displayed here.</p>
            </div>
        </div>



    </div>
</body>

</html>
