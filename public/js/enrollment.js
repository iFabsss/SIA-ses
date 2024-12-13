document.addEventListener("DOMContentLoaded", () => {
    // Get references to modal and button elements
    const balanceModal = document.getElementById('balance-modal');
    const balanceBtn = document.querySelector('.balance-btn');
    const closeBtns = document.querySelectorAll('.close');

    const blockSectionBtn = document.getElementById('block-section-btn');
    const temporarySectionBtn = document.getElementById('temporary-section-btn');
    const verificationModal = document.querySelector('.verification-modal');
    const closeVerificationBtn = document.querySelector('.close-verification');
    const cancelSelectionBtn = document.getElementById('cancel-selection');
    const confirmSelectionBtn = document.getElementById('confirm-selection');

    const cancelButton = document.getElementById('cancelButton');
    const modal = document.getElementById('cancelModal');
    const confirmCancel = document.getElementById('confirmCancel');
    const closeModal = document.getElementById('closeModal');

    // Function to toggle modal visibility
    function toggleModal(modal, show) {
        modal.style.display = show ? 'block' : 'none';
    }

    // Balance Modal Handling
    balanceBtn.addEventListener('click', () => {
        toggleModal(balanceModal, true); // Show balance modal
    });

    closeBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            toggleModal(balanceModal, false); // Hide balance modal
        });
    });

    // Close balance modal when clicking outside of it
    window.addEventListener('click', (event) => {
        if (event.target === balanceModal) {
            toggleModal(balanceModal, false); // Hide balance modal
        }
    });

    // Handle confirm selection inside verification modal
    confirmSelectionBtn.addEventListener('click', () => {
        alert("Section selected!");
        toggleModal(verificationModal, false); // Hide verification modal
    });

    // Close the verification modal if clicked outside of it
    window.addEventListener('click', (event) => {
        if (event.target === verificationModal) {
            toggleModal(verificationModal, false); // Hide verification modal
        }
    });


    // Show the modal when the Cancel button is clicked
    cancelButton.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default reset behavior
        modal.style.display = 'block';
    });

    // Close the modal when "No" is clicked
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Confirm cancellation when "Yes" is clicked
    confirmCancel.addEventListener('click', () => {
        modal.style.display = 'none';
        // Add your cancellation logic here
        alert('Cancelled'); // Example action
    });

    // Close modal if user clicks outside the modal content
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

});

function viewCourseSections(course) {
    const modal = document.getElementById("courseSectionModal");
    const closeModal = document.querySelector(".close-modal");
    const sectionContent = document.getElementById("courseSectionContent");
    console.log('Fetching sections for course:', course);

    modal.setAttribute("data-course-id", course);

    // Send an AJAX request to get course sections
    fetch(`/courses/${course}/sections`)
        .then(response => response.json())
        .then(data => {
            sectionContent.innerHTML = ""; // Clear previous content
            data.forEach(section => {
                const sectionSchedule = JSON.parse(section.schedule);
                sectionContent.innerHTML += `
                    <div class="sectionContainer">
                        <label>
                            <input type="radio" value='${JSON.stringify(section)}' name="sectionSelection" class="sectionRadio" data-course-id="${course}">
                            <p><strong>Section ID:</strong> ${section.sectionID}</p>
                            <p><strong>Professor:</strong> ${section.professor.Name}</p>
                            <p><strong>Schedule:</strong> ${sectionSchedule.days} | ${sectionSchedule.startTime} - ${sectionSchedule.endTime} | Room - ${sectionSchedule.room}</p>
                        </label>
                    </div>
                `;
                // Attach event listeners to section radios
                document.querySelectorAll(".sectionRadio").forEach(radio => {
                    radio.addEventListener("change", function () {
                        updateRegisteredSection(this);
                    });
                });
            });
            modal.style.display = "block";


        })
        .catch(error => {
            console.error('Error fetching course sections:', error);
        });

    closeModal.onclick = function () {
        modal.style.display = "none";

    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
}

function updateRegisteredSection(radioButton) {
    const courseID = radioButton.getAttribute("data-course-id");
    const section = JSON.parse(radioButton.value);

    // Find the courseRow corresponding to the courseID
    const courseRow = Array.from(document.querySelectorAll(".courseRow"))
        .find(row => row.querySelector("input[type='checkbox']").value === courseID);

    if (courseRow) {
        // Update the registeredSection input
        const sectionSchedule = JSON.parse(section.schedule);
        const registeredSectionInput = courseRow.querySelector(".registeredSection");
        registeredSectionInput.setAttribute('value', section.sectionID);
        registeredSectionInput.placeholder = `${section.sectionID} | ${sectionSchedule.days} ${sectionSchedule.startTime} - ${sectionSchedule.endTime} | ${sectionSchedule.room} | ${section.professor.Name} `;
    }

    // Close the modal after selection
    const modal = document.getElementById("courseSectionModal");
    modal.style.display = "none";
}


