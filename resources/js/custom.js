document.getElementById("email").addEventListener("blur", function() {
    var email = this.value;

    if (email) {
        axios.post('/check-email', {
            email: email
        })
        .then(function(response) {
            var messageElement = document.getElementById("emailAvailabilityMessage");
            
            if (response.data.available) {
                messageElement.textContent = "Email is available.";
                messageElement.style.color = 'green';
            } else {
                messageElement.textContent = "Email is already taken.";
                messageElement.style.color = 'red';
            }
        })
        .catch(function(error) {
            console.error("Error checking email:", error);
        });
    }
});
