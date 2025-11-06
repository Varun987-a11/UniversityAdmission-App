$(document).ready(function () {
    // --- Reusable Form Validation Logic for all application pages ---
    $("#regForm").submit(function (e) {
        let isValid = true;
        let firstErrorField = null;

        // Check all required inputs (text, select, tel, textarea)
        $("#regForm :input[required]").each(function() {
            // Check value for select fields (must not be empty string) and text fields (must not be empty string after trimming)
            if (($(this).is('select') && $(this).val() === "") || (!$(this).is('select') && $(this).val().trim() === "")) {
                isValid = false;
                if (!firstErrorField) {
                    firstErrorField = this; // Store the first empty field
                }
                $(this).css("border", "2px solid #e53935"); // Highlight empty field (Red)
            } else {
                $(this).css("border", "1px solid #c5c5c5"); // Reset border for valid fields (Light Gray)
            }
        });

        if (!isValid) {
            e.preventDefault(); // Stop form submission
            alert("Please fill out all required fields marked in red to continue.");
            
            // Focus on the first error field for efficiency
            if (firstErrorField) {
                firstErrorField.focus();
            }
        }
    });
});
