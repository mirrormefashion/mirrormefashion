
    if (wunit2 < 90 || wunit2 > 350) { //error message extreme weight
        $('#question55').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">You have entered a weight that is dangerously unhealthy. Please enter a weight between 90 - 350lbs or 40 - 159kg to continue.</label></div></div><div class="clearfix"></div></div>');
        setTimeout(function(){
        $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);}, 1500);

    } else {
        height = $('#height').val();
        height = parseInt(height);
        BMI = (wunit2*0.45)/((height*.025)*(height*.025)); //calculates BMI
        mass = BMI.toFixed(1);
        $("#form-input").attr("chat","foot");
        //appends data to relevant fields
        document.getElementById("mass").setAttribute("value", ""+mass+"");            
        document.getElementById("weight").setAttribute("value", ""+wunit+"");  
        setTimeout(function(){             
        $("#question55").show(); 
        $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
        }, 1500);

        document.getElementById("slider-head-size").max = "4"; 
        document.getElementById("slider-neck-shape").max = "1"; 
        document.getElementById("slider-neck-height").max = "5"; 
        document.getElementById("slider-neck-width").max = "4"; 
        document.getElementById("slider-shoulder-width").max = "8"; 


        if ((sex == "female" || sex == "non-binary" || sex == "non binary") && (BMI >= 16 && BMI < 65)) {

            document.getElementById("slider-head-shape").max = "2"; 
            document.getElementById("slider-shoulder-height").max = "4"; 
            document.getElementById("slider-arm-size").max = "4"; 
            document.getElementById("slider-breasts-shape").max = "8"; 
            document.getElementById("slider-torso-height").max = "0"; 
            document.getElementById("slider-hip-size").max = "2"; 
            document.getElementById("slider-stomach-shape").value = "2"; 

            if (BMI >= 16 && BMI < 22) {
                document.getElementById("slider-stomach-shape").max = "3"; 
                document.getElementById("slider-stomach-shape").value = "1"; 
                document.getElementById("slider-leg-size").max = "2"; 
                weightClass = "skinny";

            } else if (BMI >= 22 && BMI < 26) {
                document.getElementById("slider-stomach-shape").max = "4"; 
                document.getElementById("slider-leg-size").max = "4";              
                weightClass = "average";

            } else if (BMI >= 26 && BMI < 36) {
                document.getElementById("slider-stomach-shape").max = "4"; 
                document.getElementById("slider-leg-size").max = "4"; 
                weightClass = "above";

            } else if (BMI >= 36 && BMI < 42) {
                document.getElementById("slider-stomach-shape").max = "4"; 
                document.getElementById("slider-stomach-shape").value = "1"; 
                document.getElementById("slider-leg-size").max = "4"; 
                weightClass = "OW";

            } else {
                //BMI >= 35 && BMI < 43
                document.getElementById("slider-stomach-shape").max = "4"; 
                document.getElementById("slider-leg-size").max = "4"; 
                weightClass = "morbid";
            }

            document.getElementById("weight-class").setAttribute("value", ""+weightClass+"");

        } else if ((sex == "male") && (BMI >= 16 && BMI < 65)) {
            $(".mobile-origin").addClass("not_active");
            document.getElementById("slider-head-shape").max = "3"; 
            document.getElementById("slider-shoulder-height").max = "2"; 
            document.getElementById("slider-breasts-shape").max = "1"; 
            document.getElementById("slider-hip-size").max = "1"; 
            document.getElementById("slider-crotch-height").max = "2"; 
            document.getElementById("slider-stomach-shape").value = "2"; 
            if (BMI >= 16 && BMI < 22) {
                document.getElementById("slider-arm-size").max = "4"; 
                document.getElementById("slider-leg-size").max = "2"; 
                document.getElementById("slider-stomach-shape").max = "2";  
                document.getElementById("slider-stomach-shape").value = "1";    
                document.getElementById("slider-torso-height").max = "0"; 
                weightClass = "skinny";

            } else if (BMI >= 22 && BMI < 36) {
                document.getElementById("slider-arm-size").max = "5"; 
                document.getElementById("slider-leg-size").max = "4"; 
                document.getElementById("slider-stomach-shape").max = "6";   
                document.getElementById("slider-torso-height").max = "1"; 
                weightClass = "average";
            } 
            else {
                document.getElementById("slider-arm-size").max = "4"; 
                document.getElementById("slider-leg-size").max = "4"; 
                document.getElementById("slider-stomach-shape").max = "6";      
                document.getElementById("slider-torso-height").max = "1"; 
                weightClass = "OW";
            }
            document.getElementById("weight-class").setAttribute("value", ""+weightClass+"");

        } else {
            $('#question55').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">You have entered a weight that is dangerously unhealthy. Please enter a weight between 90 - 400lbs or 40 - 226kg to continue.</label></div></div><div class="clearfix"></div></div>');
            setTimeout(function(){
            $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);}, 1500);
        }
    }  

  

 