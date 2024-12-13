document.addEventListener("DOMContentLoaded", () => {
    const profileModal = document.getElementById('profile-modal');
    const balanceModal = document.getElementById('balance-modal');
    const profileBtn = document.getElementById('profile-btn');
    const balanceBtn = document.querySelector('.balance-btn');
    const closeBtns = document.querySelectorAll('.close');
    const viewModal = document.getElementById('view-modal');
    const courseDetails = document.getElementById('course-details');
    const viewButtons = document.querySelectorAll('.view-btn');

    // Show profile modal
    profileBtn.addEventListener('click', () => {
        profileModal.style.display = 'block';
    });

    // Show balance modal
    if (balanceBtn) {
        balanceBtn.addEventListener('click', () => {
            balanceModal.style.display = 'block';
        });
    }

    // Close modals when clicking close button
    closeBtns.forEach((btn) => {
        btn.addEventListener('click', (event) => {
            // Close the modal based on the button's parent modal
            const modal = btn.closest('.modal');
            if (modal) {
                modal.style.display = 'none';
            }
        });
    });

    // Close modals when clicking outside the modal
    window.addEventListener('click', (event) => {
        // Check if the click is outside of any modal, then close it
        if (event.target === profileModal) {
            profileModal.style.display = 'none';
        }
        if (event.target === balanceModal) {
            balanceModal.style.display = 'none';
        }
        if (event.target === viewModal) {
            viewModal.style.display = 'none';
        }
    });

    // View course details modal
    viewButtons.forEach((button) => {
        button.addEventListener('click', () => {
            // Get the row data for the clicked button
            const row = button.closest('tr'); // Find the parent row
            const courseID = row.children[0].textContent;
            const courseName = row.children[1].textContent;
            const sectionID = row.children[2].textContent;
            const unit = row.children[3].textContent;
            const schedule = row.children[4].textContent;
            const professor = row.children[5].textContent;

            // Populate the modal with course details
            courseDetails.innerHTML = `
            <strong>Course ID:</strong> ${courseID}<br>
            <strong>Course Name:</strong> ${courseName}<br>
            <strong>Section ID:</strong> ${sectionID}<br>
            <strong>Unit:</strong> ${unit}<br>
            <strong>Schedule:</strong> ${schedule}<br>
            <strong>Professor:</strong> ${professor}
        `;

            // Show the modal
            viewModal.style.display = 'block';
        });
    });

    const userIdElement = document.getElementById('user-id');
    const userId = userIdElement.value;
    const apiUrl = `http://127.0.0.1:8000/api/studentInfo/${userId}`;

    // Fetch data from the API
    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json(); // Parse JSON response
        })
        .then(data => {
            console.log("Student Info:", data); // Handle the data
            displayStudentInfo(data); // Call a function to handle UI updates
        })
        .catch(error => {
            console.error("Error fetching data:", error); // Handle any errors
        });

});

function displayStudentInfo(data) {
    const middleName = data.middleName ? ` ${data.middleName}` : '';
    document.getElementById('studentNameText').innerText = `Student Name: ${data.firstName}${middleName} ${data.lastName}`;
    document.getElementById('studentNumberText').innerText = `Student Number: ${data.id}`;
    document.getElementById('studentYearText').innerText = `Year Level: ${data.courseYear}`;
    document.getElementById('studentProgramText').innerText = `Program: ${data.program}`;

    const enrolledCoursesTable = document.getElementById('dashboardEnrolledCourses');
    enrolledCoursesTable.innerHTML = '';

    data.enrolled_courses.forEach(enrolled_course => {
        const course = enrolled_course.course;
        const section = course?.enrolled_sections?.[0];
        const professor = section?.section?.professor?.Name || 'N/A';

        // Parse the schedule JSON
        const schedule = section.section.schedule;
        const sectionSchedule = JSON.parse(schedule);
        console.log(sectionSchedule);
        const scheduleDetails = `${sectionSchedule.days} | ${sectionSchedule.startTime} - ${sectionSchedule.endTime} | Room - ${sectionSchedule.room}`;

        const row = `
            <tr>
                <td>${course.courseID}</td>
                <td>${course.courseName || 'N/A'}</td>
                <td>${section?.sectionID || 'N/A'}</td>
                <td>${scheduleDetails}</td>
                <td>${professor}</td>
            </tr>
        `;
        enrolledCoursesTable.innerHTML += row;
    });
};