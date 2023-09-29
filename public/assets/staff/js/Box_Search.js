
const searchIcon = document.getElementById("search-icon");
const searchInput = document.getElementById("search-input");

// Add a click event listener to the icon
searchIcon.addEventListener("click", function() {
    // Toggle the display property of the input element
    if (searchInput.style.display === "none" || searchInput.style.display === "") {
        searchInput.style.display = "block";
        searchInput.style.transition="all .10s ease-in";
    } else {
        searchInput.style.display = "none";
        searchInput.style.transition="all .10s ease-in";
    }
});

