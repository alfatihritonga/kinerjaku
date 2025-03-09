document.addEventListener("DOMContentLoaded", function () {
    const welcomeText = document.getElementById("welcome-message");
    const currentHour = new Date().getHours();
    let greeting;
    
    if (currentHour >= 5 && currentHour < 12) {
        greeting = "Good Morning";
    } else if (currentHour >= 12 && currentHour < 18) {
        greeting = "Good Afternoon";
    } else {
        greeting = "Good Night";
    }
    
    welcomeText.textContent = greeting;
});
