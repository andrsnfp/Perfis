document.getElementById('form1').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    
    // Retrieve the password and repeat password fields
    const password = document.getElementById('#password').value;
    const repeatPassword = document.getElementById('#repeat-password').value;
    
    // Retrieve the error message container
    const errorMessage = document.getElementById('#error-message');
    
    if (password !== repeatPassword) {
      errorMessage.textContent = "Passwords do not match!";
    } else {
      errorMessage.textContent = ""; // Clear error message
      // Proceed with form submission
    }
  });