// Get references to the checkbox and button elements
const checkbox = document.getElementById("myCheckbox");
const button = document.getElementById("myButton");

// Add an event listener to the checkbox
checkbox.addEventListener("change", function () {
    // Enable the button if the checkbox is checked, otherwise disable it
    button.disabled = !checkbox.checked;
});
