document.getElementById("myLink").addEventListener("click", function(){
    // code to execute when the link is clicked
});

grecaptcha.ready(function() {
    grecaptcha.execute('6LeSowkbAAAAAH0lNBSQYDeTzQ-gyCmK8r3PPFsE', {action: '/fire'}).then(function(token) {
        // The token has been received.
        document.getElementById("myLink").disabled = false;
    });
});

