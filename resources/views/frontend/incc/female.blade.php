    if(attr == "fname"){
      if (input.length < 3) {
        $('#question3').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Please provide your full name.</label></div></div><div class="clearfix"></div></div>');
      } else {
        $("#form-input").attr("chat","height");
        $('#question3').before('<div class="reply-box" ><p>'+input+'</p></div><div class="clearfix"></div><br>');
        
        $('#fname').append('<input type="text" class="form-control" id="name" name="fname" value="'+input+'">');
        
        setTimeout(function(){

        $('#question3').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Nice name, '+input+'!</label></div></div><div class="clearfix"></div></div>');     
        }, 1500);     

        setTimeout(function(){            
          $("#question3").show(); 
          $(".col-md-9").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
          }, 3000);
        
        arr = "name:"+input+","+arr;
        return false;
      }
    }
    if(attr == "height"){
      //var patt = /^([\d]{1,3}|[0-9]{1,2}[']{1}[0-9]{1,2}["]{0,1})$/g;
      var height1 = input.match(/\d+/g);

      $("#form-input").attr("chat","weight");

      if(height1 >= 58 && height1 < 63){
       
        @include('includes.height')
        $('#summary').append('<label for="name">Height Classification:</label><input type="text" class="sum-control" id="height_class" value="short">');     

      } else if (height1 >= 63 && height1 < 67){

        @include('includes.height')
        $('#summary').append('<label for="name">Height Classification:</label><input type="text" class="sum-control" id="height_class" value="average">');     

      } else if (height1 >= 67 && height1 < 71){

        @include('includes.height')
        $('#summary').append('<label for="name">Height Classification:</label><input type="text" class="sum-control" id="height_class" value="aboveaverage">');     
      
      } else if (height1 >= 71 && height1 < 77){

        //@include('includes.height')
        $("#form-input").attr("chat","weight");
        $('#question4').before('<div class="reply-box" ><p>'+input+'</p></div><div class="clearfix"></div><br>');
        $('#bmiVal').append('<input type="hidden" class="form-control" id="val_height" value="'+height1+'">');
        $('#form_height').append('<input type="text" class="form-control" id="height" name="height" value="'+height1+'">');

        setTimeout(function(){             
            $("#question4").show(); 
            $(".col-md-9").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
        }, 1500);

        $('#summary').append('<label for="name">Height Classification:</label><input type="text" class="sum-control" id="height_class" value="tall">'); 

      } else {
        $('#question4').before('<div class="reply-box" ><p>'+input+'</p></div><div class="clearfix"></div><br>');
        $('#question4').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">I only recognize height metrics in inches. Click the link to convert <a href="" style="color:yellow">feet</a> or <a href="" style="color:yellow">meters</a> to inches.</label></div></div><div class="clearfix"></div></div>');
        setTimeout(function(){             
          $(".col-md-9").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);}, 1500);
      }
    }       
    if(attr == "weight"){
      //var patt = /^([\d]{1,3}|[0-9]{1,2}[']{1}[0-9]{1,2}["]{0,1})$/g;
      //$("#form-input").attr("chat","bust");

      var weight1 = input.match(/\d+/g);              
      $("#form-input").attr("chat","bust");

        if (weight1 < 90 || weight1 > 501) {
        $('#question5').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">I only recognize values between 90 - 400 pounds. Follow this link to <a href="" style="color:yellow">convert kilograms to pounds</a> and then re-enter your selection.</label></div></div><div class="clearfix"></div></div>');
        setTimeout(function(){             
          $(".col-md-9").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);}, 1500);           
        } else {         
              
        $('#question5').before('<div class="reply-box" ><p>'+input+'</p></div><div class="clearfix"></div><br>');   
        $('#bmiVal').append('<input type="hidden" class="form-control" id="val_weight" value="'+weight1+'">');   
        $('#form_weight').append('<input type="text" class="form-control" id="weight" name="weight" value="'+weight1+'">');            

        setTimeout(function(){             
          $("#question5").show(); 
          $(".col-md-9").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
        }, 1500);

        //variables for height and weight
        height = $('#height').val();
        weight = weight1;          
        BMI = (weight*0.45)/((height*.025)*(height*.025));
        Mass = BMI.toFixed(1);
        
          //appends data to relevant fields
          $('#height2').append('<input type="text" class="form-control" id="height" value="'+height+'">');  

          $('#summary').append('<label for="name">Height:</label><input type="text" class="sum-control" id="summ-height" value="'+height+'">');  
          $('#weight2').append('<input type="text" class="form-control" id="weight" value="'+weight+'">'); 

          $('#summary').append('<label for="name">Weight:</label><input type="text" class="sum-control" id="sum-weight" value="'+weight+'">'); 
          $('#summary').append('<label for="name">BMI:</label><input type="text" class="sum-control" id="sum-BMI" value="'+Mass+'">');
          $('#body_mass').append('<input type="text" class="form-control" id="mass" name="BMI" value="'+Mass+'">');  
          
        if (BMI >= 16 && BMI < 22){ 
          //skinny shape  
          $('#summary').append('<label for="name">Weight:</label><input type="text" id="weight_class" value="skinny">'); 
          @include('includes.shaper')

        } else if (BMI >= 22 && BMI < 25) {   
          //average shape
          $('#summary').append('<label for="name">Weight:</label><input type="text" id="weight_class" value="average">'); 
          @include('includes.shaper')

        } else if(BMI >= 25 && BMI < 29){
          //aboveaverage2     
          $('#summary').append('<label for="name">Weight:</label><input type="text" id="weight_class" value="aboveaverage">');      
          @include('includes.shaper')

        } else if(BMI >= 29 && BMI < 35){
          //OW
          $('#summary').append('<label for="name">Weight:</label><input type="text" id="weight_class" value="overweight">'); 
          @include('includes.shaper')


        } else if(BMI >= 35 && BMI < 40){
          //Obese
          $('#summary').append('<label for="name">Weight:</label><input type="text" id="weight_class" value="obese">'); 
          @include('includes.shaper')

        } else if(BMI >= 40 && BMI < 43){
          //Morbid
          $('#summary').append('<label for="name">Weight:</label><input type="text" id="weight_class" value="morbid">'); 
          @include('includes.shaper')

        } else if (BMI >= 43){
          
          //morbidly obese
          $('#question5').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">The weight that you entered is dangerously overweight and my system cannot properly advise you at this time. Please come back once we\'ve <a href="">updated our system</a>. If you feel you are recieving this message in error refresh your browser and reenter your body data. </label></div></div><div class="clearfix"></div></div>');

        } else if (BMI < 16){
          
          //anorexic
          $('#question5').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">The weight that you entered is dangerously underweight and my system cannot properly advise you at this time. Please come back once we\'ve <a href="">updated our system</a>. If you feel you are recieving this message in error refresh your browser and reenter your body data. </label></div></div><div class="clearfix"></div></div>');

        } else {
          $('#question5').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Hmmm, this is odd. I am unable to calculate your BMI. Please refresh your browser and enter an adult female height and weight.</label></div></div><div class="clearfix"></div></div>');
        }
      }      
    }
    if(attr == "bust"){
      
     
      
      var reput = input.toUpperCase();
      var bust = reput.match(/[\d\.]+|\D+/g);
      var volInput = bust[0];
      var bandInput = bust[1];

      //Japan
      var c = 55;
      var d = 120;
      var validVolJapan = [];
      while(c <= d){
        validVolJapan.push(c += 5);
      }

      //US
      a = 26;
      b = 50;
      var validVolUS = [];
      while(a <= b){
        validVolUS.push(a += 2);
      }

      //Spain
      e = 70;
      f = 130;
      var validVolSpain = [];
      while(e <= f){
        validVolSpain.push(e += 5);
      }

      //AUS
      g = 4;
      h = 28;
      var validVolAUS = [];
      while(g <= h){
        validVolAUS.push(g += 2);
      }

      var validBandUS = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 
      'AAA', 'AA', 'DD', 'DDD', 'HH', 'HHH'];
      var validBandJapan = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'DD'];
      var validBandAUS = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'AA', 'DD'];

      bandUS = validBandUS.includes(bandInput); //check if the array includes var
      bandJapan = validBandJapan.includes(bandInput); 
      bandAUS = validBandAUS.includes(bandInput); 
      bandSpain = validBandJapan.includes(bandInput); 

      var z =  parseInt(volInput);
      var volUS = validVolUS.includes(z);
      var volJapan = validVolJapan.includes(z);
      var volAUS = validVolAUS.includes(z);
      var volSpain = validVolSpain.includes(z);


      if (!(isNaN(volInput))) {
        if (volUS && bandUS) {
          console.log('Valid US bra measure');
          var country = "US";

          @include('includes.bust')
            
        } else if (volAUS && bandAUS) {
          console.log('Valid AUS bra measure');
          var country = "AUS";

          @include('includes.bust')

        } else if (volSpain && bandSpain) {
          console.log('Valid Spain bra measure');
          var country = "Spain/France";

          @include('includes.bust')

        } else {
          $('#question6').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">The measurement you entered is unrecognized. Click for help determining your <a href="/womens_size_conversion">bust size</a>.</label></div></div><div class="clearfix"></div></div>');
        }
      } else if (!(isNaN(bandInput))) {

        var y =  parseInt(volJapan);
        var volJapan = validVolJapan.includes(y);
        
        if (!(isNaN(volJapan))){
          console.log('Valid Japan bra measure');
          var country = "Japan";

          @include('includes.bust')

        } else {
          $('#question6').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">The measurement you entered is unrecognized. Click for help determining your <a href="/womens_size_conversion">bust size</a>.</label></div></div><div class="clearfix"></div></div>');   
        }
      } else {
        $('#question6').before('<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">The measurement you entered is unrecognized. Click for help determining your <a href="/womens_size_conversion">bust size</a>.</label></div></div><div class="clearfix"></div></div>');
      } //end main else 
    } //end attr bust