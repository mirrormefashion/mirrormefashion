
if ( measurement >= 58 && measurement <= 95 ) {       
    if ((sex != "male") && (measurement >= 58 && measurement < 77)) {
        if (measurement >= 58 && measurement < 63) {
            weightClass = "short";
        } else if (measurement >= 63 && measurement < 67) {
            weightClass = "average";
        } else if (measurement >= 67 && measurement < 71) {
            weightClass = "above";
        } else if (measurement >= 71 && measurement < 77) {
            weightClass = "tall";
        } else { 
            if (measurement < 58) {
            //anorexic
            } else {
            //morbidly obese
            }
        }

        $("#form-input").attr("chat","weight");
            document.getElementById("height-class").setAttribute("value", ""+weightClass+"");
            document.getElementById("height").setAttribute("value", ""+measurement+"");
            setTimeout(function(){             
                $("#question5").show(); 
                $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
            }, 1500);
        } else if ((sex == "male") && (measurement >= 58 && measurement < 95)) {
            if (measurement >= 58 && measurement < 68) {
                weightClass = "short";
            } else if (measurement >= 68 && measurement < 74) {
                weightClass = "average";
            } else if (measurement >= 74 && measurement < 80) {
                weightClass = "above";
            } else if (measurement >= 80 && measurement < 95) {
                weightClass = "tall";
            } else { 
                if (measurement < 58) {
                //anorexic
                } else {
                //morbidly obese
                }
            }
            $("#form-input").attr("chat","weight");
            document.getElementById("height-class").setAttribute("value", ""+weightClass+"");
            document.getElementById("height").setAttribute("value", ""+measurement+"");
            setTimeout(function(){             
                $("#question5").show(); 
                $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
            }, 1500);
        } else {
            //what goes here?
        }
} else {          
  $('#question5').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">My system only recognizes heights between 4\'10 (58 inches) and 7\'11 (95 inches). Please re-enter your height in inches or check back later for an update on LP\'s and parents with children. Quickly <a href="/sizing-and-conversions-chart" style="color:yellow">convert your measurements</a> here.</label></div></div><div class="clearfix"></div></div>');
  setTimeout(function(){
    $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
  }, 1500);
}  


