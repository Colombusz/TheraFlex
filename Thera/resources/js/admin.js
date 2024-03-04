document.getElementById('editLink0').addEventListener('click', function() {
    document.getElementById('formContainer').style.display = 'block';
});

document.getElementById('editLink1').addEventListener('click', function() {
    document.getElementById('formContainer').style.display = 'block';
});

document.getElementById("closeBtn").addEventListener("click", function() {
    // Target the form container
    var formContainer = document.getElementById("formContainer");
    // Close the form container by hiding it
    formContainer.style.display = "none";
});