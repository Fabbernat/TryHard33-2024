// Get the quiz form element
const quizForm = document.querySelector('form');

function toggleCircle(checkbox) {
    var circle = document.getElementById('circle');
    if (checkbox.checked) {
        circle.classList.add('green-circle');
    } else {
        circle.classList.remove('green-circle');
    }
}

function saveProgress(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Get the form element
    const form = document.getElementById('progressForm');

    // Submit the form using AJAX or perform any other necessary actions
    // Example: form.submit();
}

function showCorrectAnswer(id) {
    var feedback = document.getElementById(id);
    var button = document.getElementById(id + '-button');
    if (feedback.style.display === 'block') {
        feedback.style.display = 'none';
        button.textContent = 'Show Correct Answer!';
    } else {
        feedback.style.display = 'block';
        button.textContent = 'Hide Correct Answer!';
    }
}

function hideCorrectAnswer(id) {
    var feedback = document.getElementById(id);
    feedback.style.display = 'none';
}