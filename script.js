document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".appointment-form");
    const appointmentDate = document.getElementById("appointment-date");

    // Prevent past dates
    let today = new Date().toISOString().split("T")[0];
    appointmentDate.setAttribute("min", today);

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let patientName = document.getElementById("patient-name").value.trim();
        let nationalId = document.getElementById("national-id").value.trim();
        let gender = document.getElementById("gender").value;
        let phone = document.getElementById("phone").value.trim();
        let email = document.getElementById("email").value.trim();
        let department = document.getElementById("department").value;
        let date = appointmentDate.value;

        let errors = [];

        // Required fields validation
        if (patientName === "") errors.push("Patient name is required.");
        if (nationalId === "") errors.push("National ID is required.");
        if (gender === "") errors.push("Gender is required.");
        if (phone === "") errors.push("Phone number is required.");
        if (email === "") errors.push("Email is required.");
        if (department === "") errors.push("Department is required.");
        if (date === "") errors.push("Appointment date is required.");

        // Email validation
        let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!email.match(emailPattern)) {
            errors.push("Enter a valid email address.");
        }

        // Phone validation
        let phonePattern = /^[0-9]{10,15}$/;
        if (!phone.match(phonePattern)) {
            errors.push("Phone number must be between 10 and 15 digits.");
        }

        // Display errors
        let errorBox = document.getElementById("error-box");

        if (!errorBox) {
            errorBox = document.createElement("div");
            errorBox.id = "error-box";
            form.prepend(errorBox);
        }

        errorBox.innerHTML = "";

        if (errors.length > 0) {
            errors.forEach(error => {
                let p = document.createElement("p");
                p.textContent = error;
                errorBox.appendChild(p);
            });
        } else {
            form.submit();
        }
    });
});