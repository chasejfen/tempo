// $(document).ready(function () {

// //wasnt really sure if you wanted to inclued this.
//     if ($("#firstNameProf").val() == "" || $("#lastNameProf").val() == "" || $("#emailProf").val() == "" || $("#selectProf").val() == "") {
//         $("#register_output").html("All fields are required"); 
//         $("#register_output").show(); 
//     }else {
//         $("#register").click(function (e) {

//                 var first_name = $("#firstNameProf").val(); 
//                 var last_name = $("#lastNameProf").val(); 
//                 var email = $("#emailProf").val(); 
//                 var genre = $("#selectProf").val(); 

//                 var data = "firstName=" + first_Name + "&lastName=" + last_name + "&email=" + email + "&genre=" + genre; 
    
//                 $.ajax( {
                
//                     method:"POST", 
//                     url:"profile.php", 
//                     data:data, 
//                     cache:false, 
//                     success: function(data) {
//                         $("#register_output").html(data);
//                         $("#register_output").show();
//                     }
//                 });
//                 //this was just "register_output" changed to "#register_output"
//                 $("#register_output").html("Update successful!");
//                 $("#register_output").show();
//         }); 
//     }
// }); 