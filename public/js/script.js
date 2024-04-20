function toggleCircle(checkbox) {
    const circle = document.getElementById('circle');
    if (checkbox.checked) {
        circle.classList.add('green-circle');
    } else {
        circle.classList.remove('green-circle');
    }
}

function saveProgress(event) {
    // Check if the form submission should be prevented
    if (!conditionMet) { // Replace 'conditionMet' with your condition
        // Prevent the default form submission behavior
        event.preventDefault();
    }

    // Submit the form using AJAX or perform any other necessary actions
    // Example: form.submit();
}

function showCorrectAnswer(id) {
    const feedback = document.getElementById(id);
    const button = document.getElementById(id + '-button');
    const computedStyle = window.getComputedStyle(feedback);

    if (computedStyle.display === 'block') {
        feedback.style.display = 'none';
        button.textContent = 'Show Correct Answer';
    } else {
        feedback.style.display = 'block';
        button.textContent = 'Hide Correct Answer';
    }
}

function hideCorrectAnswer(id) {
    const feedback = document.getElementById(id);
    feedback.style.display = 'none';
}

// Get the quiz form element
const quizForm = document.querySelector('form');

