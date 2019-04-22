$(document).ready(function () {
    $('#mySlider').on('change', function() {
        $('#bpmText').val($('#mySlider').val());
    });

    $('#bpmText').on('keyup', function() {
        $('#mySlider').val($('#bpmText').val());
    });



    $("#scan").click(function (e) {

            var bpm = $("#bpmText").val(); 

            if(bpm < 70 || bpm > 190) {
                $('#errorScan').html('Error: Only values between 70 and 190 are allowed.');
                $('#errorScan').show();
            } else if(isNaN(bpm)){ 
                $('#errorScan').html('Error: Please enter a number.');
                $('#errorScan').show();
            } else {
                $('#errorScan').hide();
            var data = "bpm=" + bpm;
    
            $.ajax( {
                
                method:"POST", 
                url:"bpm.php", 
                data: data,
                cache: false,
                success:function(data) {
                    var obj = jQuery.parseJSON(data);
                    $('vidplayer').empty();
                    $('#songTitle').html(obj.song_title);
                    $('#songArtist').html(obj.song_artist);
                    $('#songTitle').show();
                    $('#songHyphen').show();
                    $('#songArtist').show();
                    var vidURL = encodeURI(obj.song_url);
                    var iframe = $('#vidFrame');
                      iframe.attr('src', vidURL);
                }
            }); 
        }
    }); 
}); 