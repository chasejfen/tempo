$(document).ready(function() {
    $("#register").click(function(e) {


        if($("#firstName").val() == "" || $("#lastName").val() == "" || $("#email").val() == "" || $("#passwordReg").val() == "") {
            $("#register_output").html("All fields are required");
            $("#register_output").show();
        } else {

            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var email = $("#email").val();
            var passwordReg = $("#passwordReg").val();
    
            var data = "firstName=" + firstName + "&lastName=" + lastName + "&email=" + email + "&passwordReg=" + passwordReg;
    
            $.ajax({
                method: "POST",
                url: "register.php",
                data: data,
                success: function(data) {
                    $("#register_output").html(data);
                    $("#register_output").show();
                }
            });
            $("register_output").html("Registration successful!");
            $("#register_output").show();
        }
        
    });
});