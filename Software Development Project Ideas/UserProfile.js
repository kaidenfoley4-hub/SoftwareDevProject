// Profile Completion Calculator

const trackedFields = [
    "profile-photo",
    "name", "bio", "age", "sex", "location",
    "user_type", "user_interest1", "user_interest2", "user_interest3"
];

// This function iterates through trackedFields and checks if its value is empty.
// It counts these then divides by the total and multiplies by 100 to get a percentage value
// Lastly it uses this percentage to update the progress bar and make the width increase
function updateCompleteness() {
    let filled = 0;
    trackedFields.forEach(id => {
        const el = document.getElementById(id);
        if (el && el.value && el.value.trim() !== "") filled++;
    });
    const percent = Math.round((filled / trackedFields.length) * 100);
    document.getElementById("completeness-score").textContent = percent + "%";
    document.getElementById("completeness-bar").style.width = percent + "%";
}

trackedFields.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener("input", updateCompleteness);
});

// Profile Photo Preview

function previewProfilePhoto(event) {
    // index zero just gets the first file as only one is allowed
    const file = event.target.files[0];
    const img = document.getElementById("profile-photo-preview");
    const placeholder = document.getElementById("profile-photo-placeholder");

    if (!file) return;

    // creates a temporary local URL pointing to the browser file and then assigns this to the src
    img.src = URL.createObjectURL(file);
    img.style.display = "block";
    placeholder.style.display = "none";
}

// Additional Photo Previews

function handleAdditionalPhotos(event) {
    // Convert the selected files into a standard array so we can use forEach on it
    const files = Array.from(event.target.files);

    // Get the grid container where photo thumbnails will be displayed
    const grid = document.getElementById("photo-preview-grid");

    // Clear any previously displayed thumbnails so old previews don't persist
    grid.innerHTML = "";

    // If no files were selected, hide the grid and exit the function early
    if (files.length === 0) {
        grid.style.display = "none";
        return;
    }

    // Make the grid visible and apply Bootstrap grid classes for responsive layout
    grid.style.display = "flex";
    grid.className = "row g-2 mb-3";

    // Loop through each selected file and create a thumbnail for it
    files.forEach(file => {
        // Create a Bootstrap column div to wrap each thumbnail
        const col = document.createElement("div");
        col.className = "col-4 col-md-3 col-lg-2"; // Responsive column widths

        // Create an image element for the thumbnail
        const img = document.createElement("img");

        // Create a temporary local URL for the file so it can be displayed without uploading
        img.src = URL.createObjectURL(file);
        img.className = "photo-thumb"; // Apply thumbnail styling from profile.css
        img.alt = file.name;           // Set alt text to the file name for accessibility

        // Insert the image into the column, then the column into the grid
        col.appendChild(img);
        grid.appendChild(col);
    });
}

// Save Profile with Inline Validation

function saveProfile() {
    // Read the current values of all required fields from the form
    const name = document.getElementById("name").value;
    const age = document.getElementById("age").value;
    const location = document.getElementById("location").value;
    const bio = document.getElementById("bio").value;
    const photo = document.getElementById("profile-photo").value;

    // Build a list of any required fields that have been left empty
    const missing = [];
    if (!name) missing.push("Name");
    if (!age) missing.push("Age");
    if (!location) missing.push("Location");
    if (!bio) missing.push("Bio");
    if (!photo) missing.push("Profile Photo");

    // Get references to the error banner and its list element in the HTML
    const errorBox = document.getElementById("validation-error");
    const errorList = document.getElementById("validation-list");

    // If any required fields are missing, display the error banner and stop saving
    if (missing.length > 0) {
        // Convert each missing field name into an <li> element and inject into the list
        errorList.innerHTML = missing.map(f => `<li>${f}</li>`).join("");
        errorBox.style.display = "block"; // Show the error banner
        return; // Exit the function early — do not proceed with saving
    }

    // All required fields are filled — hide the error banner
    errorBox.style.display = "none";

    // Placeholder: in a real application this would send data to a backend server
    console.log("Profile saved!");
    alert("Profile saved successfully!");
}