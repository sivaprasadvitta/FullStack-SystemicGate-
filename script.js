$(document).ready(function() {
    $("#login-link").click(function() {
        $(".register-form").hide();
        $(".login-form").show(500);
    });
    
    $("#register-link").click(function() {
        $(".login-form").hide();
        $(".register-form").show(500);
    });

    // validation
    $(".register-form").submit(()=>{
        event.preventDefault();

        // Reset error messages
        $(".error-message").remove();
        $(".error").removeClass("error");

        //first and last names
        var firstName = $("#firstName").val().trim();
        var lastName = $("#secName").val().trim();
        if (firstName.length < 3) {
            showError($("#firstName"), "First name must be at least 3 characters.");
            return;
        }
        if (lastName.length < 3) {
            showError($("#secName"), "Last name must be at least 3 characters.");
            return;
        }
        //email
        var email = $("#email").val().trim();
        if (!validateEmail(email)) {
            showError($("#email"), "Please enter a valid Gmail address.");
            return;
        }

        //phone number
        var phoneNumber = $("#phoneNumber").val().trim();
        var countryCode = $("#countryCode").val().trim();
        if (!validatePhoneNumber(phoneNumber)) {
            showError($("#phoneNumber"), "Please enter a valid phone number.");
            return;
        }
        if (!validateCountryCode(countryCode)) {
            showError($("#countryCode"), "Please select a valid country code.");
            return;
        }

        //password
        var password = $("#password").val();
        if (!validatePassword(password)) {
            console.log(password);
            showError($("#password"), "Password must be at least 8 characters long and contain at least one capital letter, one special character, and one number.");
            return;
        }
        //profile
        var profilePic = $("#profile")[0].files[0];

        console.log(profilePic);
        if (profilePic && profilePic.size > 2 * 1024 * 1024) {
            showError($("#profile"), "Profile picture size should be less than 2MB.");
            return;
        }

        // this.submit();
    })

    function validateEmail(email) {
        var pattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        return pattern.test(email);
    }
    function validatePhoneNumber(phoneNumber) {
        var pattern = /^\d{1,10}$/; 

        return phoneNumber.length == 10 && pattern.test(phoneNumber);
    }

    
    function validateCountryCode(countryCode) {
        var pattern = /^\+\d{1,3}$/; 
        return pattern.test(countryCode);
    }

    function validatePassword(password) {
        var uppercaseRegex = /[A-Z]/;
        var specialCharRegex = /[!@#$%^&*]/;
        var numberRegex = /[0-9]/;
    
        if(
            password.length >= 8 &&
            uppercaseRegex.test(password) &&
            specialCharRegex.test(password) &&
            numberRegex.test(password)
        ){
            return true;
        }else{
            return false;
        }
    }

    function showError(inputField, message) {
        inputField.addClass("error");
        inputField.after("<div class='error-message'>" + message + "</div>");
        inputField.focus();
    }

});

