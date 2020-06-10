const descriptions = document.querySelectorAll(".article-description");

descriptions.forEach(function (description) {
    if (description.textContent.length > 100) {
        description.textContent = description.textContent.substring(0, 100) + " . . . ";
    }
});

