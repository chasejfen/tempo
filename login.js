$(document).ready(function() {
    $("#loginB").click(function(e) {
        if($("#emailLog").val() == "" || $("#passwordLog").val() == "") {
            $("#login_output").html("All fields are required");
            $("#login_output").show();
        } else {

            var emailLog = $("#emailLog").val();
            var passwordLog = $("#passwordLog").val();
    
            var data = "emailLog=" + emailLog + "&passwordLog=" + passwordLog;
    
            $.ajax({
                method: "POST",
                url: "login.php",
                data: data,
                success: function(data) {

                    if(data == 1) {
                        $("#login_output").html("Login Successful!");
                        $("#login_output").show(); 
                        location.href = "app.php"
                    }

                    if(data == 2) {
                        $("#login_output").html("Incorrect username/password combination.");
                        $("#login_output").show(); 
                    }

                    if(data == 3) {
                        $("#login_output").html("There is no account with that email address.");
                        $("#login_output").show(); 
                    }

                }
            });
        }
        

    });
});