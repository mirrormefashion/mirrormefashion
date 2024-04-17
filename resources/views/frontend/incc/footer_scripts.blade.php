

@if (Request::is('/'))
    <script src="{{ app()->isLocal() ? asset('public/home/js/app.js') : asset('public/home/js/app.js') }}"></script>
@endif
 

<script>

    //product carousel
    $(document).ready(function() {
        // MDB Lightbox Init
        $(function() {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    });
   
       
    function produce() {
        var x = document.getElementById("summit");

        if (x.classList.contains("hide")) {
            x.classList.remove("hide");

        } else {
            x.classList.add("hide");

        }
        classify();
    }
    //chatbot questions

    var arr = "";

    jQuery(document).ready(function() {
        //Answer in the input Form
        jQuery('#chat-convo').click(function(e) {
            e.preventDefault();
            var attr = $("#form-input").attr("chat");
            var form_input = $('#form-input').val().toLowerCase();
           
            if(form_input=='' & attr !=='age'){
                alert('This field should not empty!');
                return true
            }
            chatbox(attr, form_input);
            $(".para-cont").animate({
                scrollTop: $('.para-cont').prop("scrollHeight")
            }, 1000);
            $("#form-input").val("");
        });

        function chatbox(attr, input) {


            if (attr == "gender") {
                if (input == "male" || input == "female" || input == "non-binary") {
                    $("#form-input").attr("chat", "fname");
                    $("#form-input").attr("pattern", "[a-zA-Z][a-zA-Z ]{2,}");
                    $('#question2').before('<div class="reply-box" ><p>' + input +
                        '</p></div><div class="clearfix"></div><br>');

                    $('#gender-class').append('<input type="text" class="sum-control" id="sex" value="' +
                    input + '" name="gender" required>');

                    $('#' + input + '').attr({
                        'checked': true,
                        'name': 'gender'
                    });

                    setTimeout(function() {
                            $("#question2").show();
                            $(".chat-body").animate({
                                scrollTop: $('.col-md-9').prop("scrollHeight")
                            }, 1000);
                        },
                        1500);

                    arr = "gender:" + input + "," + arr;
                    
                    if (input != "non-binary") {
                        $('#modeler-class').append('<input type="text" class="sum-control" id="modeler" value="' +
                        input + '" name="gender" required>');
                    } else {
                        $('#modeler-class').append('<input type="text" class="sum-control" id="modeler" value="female" name="gender" required>');
                    }
                } else {
                    $('#question2').before('<div class="reply-box" ><p>' + input +
                        '</p></div><div class="clearfix"></div><br>');
                    setTimeout(function() {
                        $('#question2').before(
                            '<div class="form-group"><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">I do not recognize your input. Please say <b>female</b>, <b>male</b> or <b>non-binary</b>. If selecting non-binary as your gender hyphenate between words.</label></div></div><div class="clearfix"></div></div>'
                        );
                    }, 1500);
                }
            }

            if (attr == "fname") {
                $("#form-input").removeAttr("pattern");
                var fullname = input.split(" ");
                a = fullname[0];
                b = fullname[1];

                if (a.length < 3 || !(b)) {
                    $('#question3').before(
                        '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Please enter your first and last name.</label></div></div><div class="clearfix"></div></div>'
                    );
                } else {
                    $("#form-input").attr("chat", "age");
                    $('#question3').before('<div class="reply-box" ><p>' + input +
                        '</p></div><div class="clearfix"></div><br>');

                    document.getElementById("name").setAttribute("value", "" + input + "");

                    setTimeout(function() {

                        $('#question3').before(
                            '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Nice name, ' +
                            input + '!</label></div></div><div class="clearfix"></div></div>');
                    }, 1500);

                    setTimeout(function() {
                        $("#question3").show();
                        $(".chat-body").animate({
                            scrollTop: $('.col-md-9').prop("scrollHeight")
                        }, 1000);
                    }, 3000);

                    arr = "fname:" + input + "," + arr;
                }
            }
            if (attr == "age") {

                var age1 = document.querySelector('input[value="Under 19"]');
                var age2 = document.querySelector('input[value="19 - 39"]');
                var age3 = document.querySelector('input[value="40 - 64"]');
                var age4 = document.querySelector('input[value="Over 65"]');
                var ele = document.getElementsByName('age');

                if (age1.checked || age2.checked || age3.checked || age4.checked) {

                    for (i = 0; i < ele.length; i++) {
                        if (ele[i].checked) {
                            document.getElementById("age").setAttribute("value", "" + ele[i].value + "");
                            $('#question4').before('<div class="reply-box" ><p>' + ele[i].value +
                                ' years of age</p></div><div class="clearfix"></div><br>');
                        }
                    }

                    $("#form-input").attr("chat", "height");
                    setTimeout(function() {
                        $('#question4').before(
                            '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Great, thanks!</label></div></div><div class="clearfix"></div></div>'
                        );
                        $("#question4").show();
                        $(".chat-body").animate({
                            scrollTop: $('.col-md-9').prop("scrollHeight")
                        }, 1000);
                    }, 1500);

                } else {

                    setTimeout(function() {
                        $('#question4').before(
                            '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Select your age group to proceed.</label></div></div><div class="clearfix"></div></div>'
                        );
                    }, 20000);
                }
                arr = "age:" + input + "," + arr;
            }

            if (attr == "height") {

                var sex = $('#sex').val();
                //var height = input.match(/\d\.+/g);
                let height = input.match(/[\d\.]+|\D+/g);
                $('#question5').before('<div class="reply-box" ><p>' + input +
                    '</p></div><div class="clearfix"></div><br>');
                setTimeout(function() {
                    $(".chat-body").animate({
                        scrollTop: $('.col-md-9').prop("scrollHeight")
                    }, 1000);
                }, 1500);
                if (height || input.includes(".") || !(input.includes("cm") || input.includes("cent") || input
                        .includes("in"))) {

                    if (input.includes("cm") || input.includes("cent") || input.includes("in")) {
                        height = input.match(/[\d\.]+|\D+/g);
                        measurement = height;
                        if (input.includes("cm") || input.includes("cent")) {

                            splitNum = input.split("c");
                            num = splitNum[0];
                            metric = splitNum[1];
                            x = num / 2.54; //convert centimeters to inches
                            //cm = num * 2.54; 
                            measurement = x.toFixed(2);
                            @include('frontend.inc.height')
                        } else {

                            splitNum = input.split("in");
                            measurement = splitNum[0];
                            metric = splitNum[1];
                            @include('frontend.inc.height')
                        }
                    } else {
                        if (input.includes("'")) {
                            splitNum = input.split("'");
                            foot = splitNum[0];
                            delimiter = splitNum[1];
                            inch = parseInt(splitNum[2]);
                            measurement = (foot * 12) + inch;
                            @include('frontend.inc.height')

                        } else if (input.includes(".")) {
                            height = input.match(/[\d\.]+|\D+/g);
                            measurement = height;
                            @include('frontend.inc.height')

                        } else {
                            $('#question5').before(
                                '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">I only recognize average adult heights in centimeters and inches. Please re-enter your height in this format: 175cm or 70in or quickly <a href="/sizing-and-conversions-chart" style="color:yellow">convert your measurements</a> here.</label></div></div><div class="clearfix"></div></div>'
                            );
                            setTimeout(function() {
                                $(".chat-body").animate({
                                    scrollTop: $('.col-md-9').prop("scrollHeight")
                                }, 1000);
                            }, 1500);
                        }
                    }
                } else {
                    $('#question5').before(
                        '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Please enter your height as inches or centimeters. For example, you can say 175cm or 70in. To <a href="/sizing-and-conversions-chart" style="color:yellow">convert your measurement to inches</a> follow the link.</label></div></div><div class="clearfix"></div></div>'
                    );
                    setTimeout(function() {
                        $(".chat-body").animate({
                            scrollTop: $('.col-md-9').prop("scrollHeight")
                        }, 1000);
                    }, 1500);
                }
            }
            if (attr == "weight") {
                var sex = $('#sex').val();
                var weight = input.match(/[\d\.]+|\D+/g);
                wunit = parseInt(weight[0]);
                metric = weight[1];

                $('#question55').before('<div class="reply-box" ><p>' + input + '</p></div><div class="clearfix"></div><br>');
                if(metric != null){
                    if (!(metric.match(/pound/g) || metric.match(/kilo/g) || metric.match(/lb/g) || metric.match(/kg/g))) {
                        $('#question55').before(
                            '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">I only recognize lbs and kgs. <a href="">Convert your weight</a> to pounds or kilograms and re-enter</a>.</label></div></div><div class="clearfix"></div></div>'
                        );
                        setTimeout(function() {
                            $(".chat-body").animate({
                                scrollTop: $('.col-md-9').prop("scrollHeight")
                            }, 1000);
                        }, 1500);

                    } else { //measurement is a lb or kg
                        if (metric.match(/pound/g) || metric.match(/lb/g)) {
                            //metric is a lb
                            wunit2 = wunit;
                            @include('frontend.inc.weight')

                        } else {
                            wunit2 = Math.round(wunit * 2.205); //converts kg to lb
                            @include('frontend.inc.weight')
                       }
                    }
                } else {
                    $('#question55').before(
                            '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Please enter your weight in lbs and kgs. Clock here to <a href="">convert your weight</a> to pounds or kilograms and then re-enter.</label></div></div><div class="clearfix"></div></div>'
                        );
                        setTimeout(function() {
                            $(".chat-body").animate({
                                scrollTop: $('.col-md-9').prop("scrollHeight")
                            }, 1000);
                        }, 1500);
                }

                arr = "height:" + input + "," + arr;
            }
            if (attr == "foot") {
                var sex = $('#sex').val();
                orange = input.match(/[\d\.]+|\D+/g);  
                sizing = parseInt(orange[0]);
                red = orange[1];
                //appends slider ticks
                const sliders = document.getElementsByClassName("tick-slider-input");
                sliderTrickgenerator(sliders);
                
                $('#question6').before('<div class="reply-box" ><p>'+input+'</p></div><div class="clearfix"></div><br>');  

                if ( (sizing >= 3.5 && sizing <= 24) && (input.includes("kid") || input.includes("man") || input.includes("men")) ) {  

                    if(input.includes("kid")) {
                        if (sizing >= 3.5 && sizing <= 7) { //needs a regex that checks if .5 is the decimal num
                            document.getElementById("shoe").setAttribute("value", ""+sizing+", kids");
                            
                        } else { 
                            $('#question6').before('<div class="form-group"><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">You have entered a size that is not recognized as a U.S. and kids shoe. Click to <a href="/sizing-and-conversions-chart" style="color:yellow">convert your foot metric</a> here. Re-enter your input when ready.</label></div></div><div class="clearfix"></div></div>');
                            setTimeout(function(){
                            $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
                            }, 1500);
                        }
                    } else if (input.includes("women") || input.includes("woman")) {
                        if (sizing >= 4 && sizing <= 15.5) {
                            document.getElementById("shoe").setAttribute("value", ""+sizing+", womens");
                            
                        } else {
                            $('#question6').before('<div class="form-group"><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">You have entered a size that is not recognized as a U.S. and kids shoe. Click to <a href="/sizing-and-conversions-chart" style="color:yellow">convert your foot metric</a> here. Re-enter your input when ready.</label></div></div><div class="clearfix"></div></div>');
                            setTimeout(function(){
                            $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
                            }, 1500);
                        }
                    } else {
                        if (sizing >= 6 && sizing <= 24) {
                            document.getElementById("shoe").setAttribute("value", ""+sizing+", mens");
                            $("#form-input").attr("chat","conclusion");
                        } else {
                            $('#question6').before('<div class="form-group"><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">You have entered a size that is not recognized as a U.S. and kids shoe. Click to <a href="/sizing-and-conversions-chart" style="color:yellow">convert your foot metric</a> here. Re-enter your input when ready.</label></div></div><div class="clearfix"></div></div>');
                            setTimeout(function(){
                            $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
                            }, 1500);
                        }
                    }  
                    
                    if (sex != "male") {
                        $("#form-input").attr("chat","bust");                        
                        $(".mobile-chat-btn").attr('id', 'chat-ready');
                        setTimeout(function(){
                            $("#question6").show();
                            $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);          
                        }, 3000);
                    } else {
                        setTimeout(function(){
                            $("#question7").show();
                            $("#column-center").show();
                            $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
                        }, 2000);
                        $("#form-input").attr("chat","conclusion");
                        setTimeout(function() {
                            $("#question7").show();
                            $('#summit').css('display','flex');
                            $('#mobile #conclusion').css('display','block');  
                            $('.sticky-parent').css('height','9000vh'); 
                            $('.sticky-parent').css('scroll-behavior','auto'); 
                            $('#mobile-parent').css('height','400vh!important');  
                            $("#column-center").show();
                            $(".chat-body").animate({
                                scrollTop: $('.col-md-9').prop("scrollHeight")
                            }, 1000);
                        }, 3000);
                        
                        setTimeout(function() {
                            $("#question8").show();
                            $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
                        }, 6000);  

                        if (window.matchMedia('screen and (min-width: 800px)').matches){ 
                            $(".mobile-origin").addClass("not_active");
                            setTimeout(function() {
                            window.scrollTo({ 
                                left: 0, 
                                top: document.body.scrollHeight,
                                behavior: "smooth" 
                            });          
                            }, 15000); 
                        } else {

                            setTimeout(function() {
                            document.querySelector('.mobile-summit').scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });    
                            }, 15000); 
                        }
                    }
                } else {
                    $('#question6').before('<div class="form-group"><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">I only recognize U.S. women\'s, men\'s, and kids shoe sizes. Click to <a href="/sizing-and-conversions-chart" style="color:yellow">convert your foot metric</a> here. Re-enter your input when ready.</label></div></div><div class="clearfix"></div></div>');
                    setTimeout(function(){
                    $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
                    }, 1500);
                }
                arr = "weight:" + input + "," + arr;
            } 
            
            if (attr == "bust") {
                var sex = $('#sex').val();
                if (sex != "male") {                    
                    var reput = input.toUpperCase();                    
                    var bust = reput.match(/[\d\.]+|\D+/g);
                    var volInput = bust[0];
                    var bandInput = bust[1];

                    //Japan
                    var c = 55;
                    var d = 110;
                    var validVolJapan = [];
                    while (c <= d) {
                        validVolJapan.push(c += 5);
                    }

                    //US
                    a = 26;
                    b = 48;
                    var validVolUS = [];
                    while (a <= b) {
                        validVolUS.push(a += 2);
                    }

                    //Spain
                    e = 70;
                    f = 125;
                    var validVolSpain = [];
                    while (e <= f) {
                        validVolSpain.push(e += 5);
                    }

                    //AUS
                    g = 4;
                    h = 26;
                    var validVolAUS = [];
                    while (g <= h) {
                        validVolAUS.push(g += 2);
                    }

                    var validBandUS = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
                        'AAA', 'AA', 'DD', 'DDD', 'HH', 'HHH', 'JJ', 'KK'
                    ];

                    bandUS = validBandUS.includes(bandInput); //checks the array var
                    var z = parseInt(volInput);
                    var volUS = validVolUS.includes(z);
                    var volJapan = validVolJapan.includes(z);
                    var volSpain = validVolSpain.includes(z);
                    var volAUS = validVolAUS.includes(z);

                    if (!(isNaN(volInput)) && bandUS && volUS) {
                        var country = "US";
                        document.getElementById("bust").setAttribute("value", "" + volInput + "," + bandInput +
                            "," + country + "");

                        @include('frontend.inc.bust')

                    } else if (!(isNaN(bandInput)) && bandUS && volUS) {
                        if (!(isNaN(volUS))) {
                            var country = "Japan";
                            document.getElementById("bust").setAttribute("value", "" + volInput + "," + bandInput + "," + country + "");

                            function getJaCupSize() {
                                if (bandInput == "A") {
                                    volInput = bandInput.replace(/a/i, 'AA');
                                } else if (bandInput == "B") {
                                    volInput = bandInput.replace(/b/i, 'A');
                                } else if (bandInput == "C") {
                                    volInput = bandInput.replace(/c/i, 'B');
                                } else if (bandInput == "D") {
                                    volInput = bandInput.replace(/d/i, 'C');
                                } else if (bandInput == "E") {
                                    volInput = bandInput.replace(/e/i, 'D');
                                } else if (bandInput == "F") {
                                    volInput = bandInput.replace(/f/i, 'DD');
                                } else if (bandInput == "G") {
                                    volInput = bandInput.replace(/g/i, 'DDD');
                                } else if (bandInput == "H") {
                                    volInput = bandInput.replace(/h/i, 'F');
                                } else if (bandInput == "I") {
                                    volInput = bandInput.replace(/i/i, 'G');
                                } else if (bandInput == "J") {
                                    volInput = bandInput.replace(/j/i, 'H');
                                } else if (bandInput == "K") {
                                    volInput = bandInput.replace(/k/i, 'I');
                                } else {
                                    volInput = bandInput.replace(/a/i, 'C');
                                }
                                $('#bust-wrap').append(
                                    '<input type="text" class="form-control" id="cup" name="cup" value="' +
                                    volInput + '">');
                            }

                            function getJaBandSize() {
                                if (bandJapan == "60") {
                                    bandInput = bandJapan.replace(60, '28');
                                } else if (bandJapan == "65") {
                                    bandInput = bandJapan.replace(65, '30');
                                } else if (bandJapan == "70") {
                                    bandInput = bandJapan.replace(70, '32');
                                } else if (bandJapan == "75") {
                                    bandInput = bandJapan.replace(75, '34');
                                } else if (bandJapan == "80") {
                                    bandInput = bandJapan.replace(80, '36');
                                } else if (bandJapan == "85") {
                                    bandInput = bandJapan.replace(85, '38');
                                } else if (bandJapan == "90") {
                                    bandInput = bandJapan.replace(90, '40');
                                } else if (bandJapan == "95") {
                                    bandInput = bandJapan.replace(95, '42');
                                } else if (bandJapan == "100") {
                                    bandInput = bandJapan.replace(100, '44');
                                } else if (bandJapan == "105") {
                                    bandInput = bandJapan.replace(105, '46');
                                } else if (bandJapan == "110") {
                                    bandInput = bandJapan.replace(110, '48');
                                } else {
                                    bandInput = bandJapan.replace(60, '36');
                                }
                                $('#bust-wrap').append(
                                    '<input type="text" class="form-control" id="band" name="band" value="' +
                                    bandInput + '">');
                            }

                            getJaCupSize();
                            getJaBandSize();
                            @include('frontend.inc.bust')

                        } else {
                            $('#question7').before(
                                '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">The measurement you entered is unrecognized. Click here to <a href="/bra-conversion-chart">convert to a US bra size</a>.</label></div></div><div class="clearfix"></div></div>'
                            );
                        }
                    } else {
                        setTimeout(function() {
                            $('#question7').before(
                                '<div class="form-group" ><div class="talk-bubble tri-right round btm-left"><div class="talktext"><label class="ar-label">Enter a valid US bra measurement. Click here for help determining your <a href="/bra-conversion-chart">bra size</a>.</label></div></div><div class="clearfix"></div></div>'
                            );
                            $(".chat-body").animate({
                                scrollTop: $('.col-md-9').prop("scrollHeight")
                            }, 1000);

                        }, 3000);


                    } //end main else
                } else { //gender is male
                    $('#question7').before('<div class="reply-box" ><p>' + input + '</p></div><div class="clearfix"></div><br>');
                    $("#form-input").attr("chat","conclusion");
                    setTimeout(function() {
                        $("#question7").show();
                        $('#summit').css('display','flex');
                        $('#mobile #conclusion').css('display','block');  
                        $('.sticky-parent').css('height','9000vh'); 
                        $('.sticky-parent').css('scroll-behavior','auto'); 
                        $('#mobile-parent').css('height','400vh!important');  
                        $("#column-center").show();
                        $(".chat-body").animate({
                            scrollTop: $('.col-md-9').prop("scrollHeight")
                        }, 1000);
                    }, 3000);
                        
                    setTimeout(function() {
                        $("#question8").show();
                        $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
                    }, 6000);  

                    if (window.matchMedia('screen and (min-width: 800px)').matches){ 
                        $(".mobile-origin").addClass("not_active");
                        setTimeout(function() {
                            window.scrollTo({ 
                                left: 0, 
                                top: document.body.scrollHeight,
                                behavior: "smooth" 
                            });          
                        }, 15000); 
                    } else {
                        setTimeout(function() {
                            document.querySelector('.mobile-summit').scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });    
                        }, 15000); 
                    }
                }
            } //end attr bust


        }
    });
</script>

<script>

"use strict"

// Adding scroll event listener
document.addEventListener('scroll', horizontalScroll);

//Selecting Elements
let sticky = document.querySelector('.sticky');
let stickyParent = document.querySelector('.sticky-parent');

let scrollWidth = sticky.scrollWidth;
let verticalScrollHeight = stickyParent.getBoundingClientRect().height-sticky.getBoundingClientRect().height;
let scrolled = stickyParent.getBoundingClientRect().top; 
sticky.scrollLeft = (scrollWidth/verticalScrollHeight)*(-scrolled)*1.05;
const conclusion = document.getElementById("conclusion");

//Scroll function 
function horizontalScroll(){

    //Checking whether the sticky element has entered into view or not
    let stickyPosition = sticky.getBoundingClientRect().top;
    if(stickyPosition > 1){
        return;
    }else{
        let scrolled = stickyParent.getBoundingClientRect().top; 
        sticky.scrollLeft = (scrollWidth/verticalScrollHeight)*(-scrolled)*1.05;
    
    }
}

$('#proceed-now').click(function(e) {
    e.preventDefault();
    $('#origin').css('display','flex');
    $('.sticky-parent').css('height','7500vh');
    setTimeout(function() {
        window.scrollTo({ 
            left: 0, 
            top: document.body.scrollHeight,
            behavior: "smooth" 
        });                         
    }, 500);

});

$('#submit-model').click(function(e) { 
    e.preventDefault();
    $('#conclusion').css('display','flex');
    $('.sticky-parent').css('height','10000vh');
    setTimeout(function() {
        window.scrollTo({ 
            left: 0, 
            top: document.body.scrollHeight,
            behavior: "smooth" 
        });                      
    }, 500);
});

$('#mobile-submit').click(function(e) { 
    e.preventDefault();
    $('#mobile-parent').css('height', '500vh!important');
    setTimeout(function() {
        $('#conclusion').css('display','block');   
    }, 500); 
    $('#mobile-parent').css('height', '500vh!important');
    setTimeout(function() {
        document.querySelector('.mobile-conclusion').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });    
    }, 3000); 
});

</script>
<script>
    var lastScrollPos = 0;

    document.addEventListener("scroll", function(){ 
    var newScrollPos = window.pageYOffset || document.documentElement.scrollTop; 

        if (newScrollPos == lastScrollPos) {
            $('#precursor').css('min-width', '110vw');
        } else {
            $('#precursor').css('min-width', '100vw');
        } 
    //lastScrollTop = newScrollPos <= 0 ? 0 : newScrollPos; // For Mobile or negative scrolling
    }, false);

</script>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "flex";
        evt.currentTarget.className += " active";
    }
</script>

<script>
    //Toggle Front/Back body
    function showBody() {
        var x = document.getElementById("front-body");
        var y = document.getElementById("back-body");

        if (x.style.display === "none") {
            y.style.display = "none";
            x.style.display = "flex";
            document.getElementById("fb-on").innerHTML = "Show Body Rear";

        } else {
            x.style.display = "none";
            y.style.display = "flex";
            document.getElementById("fb-on").innerHTML = "Show Body Front";

        }
    }

    
   /*  //collapse model controller
    function collapseControlr() {

    }

const icon = document.querySelectorAll('.openicon');

icon.forEach(icon => {
    icon.addEventListener('click', function handleClick(event) {
        console.log('box clicked', event);

        var open = document.getElementById('toggle-open');
        var close = document.getElementById('toggle-closed');
        var icon = document.querySelector('m-modeller');

        if (open.style.display === "none") {
            open.style.display = "none";
            close.style.display = "block";
            icon.style.display = "flex";
            $('.openicon').css('top', '5.5%');
        } else {
            open.style.display = "block";
            close.style.display = "none";
            icon.style.display = "none";
            $('.openicon').css('top', '16.5%');

        }
    });
}); */
</script>



<script>
    document.addEventListener("change", buildModeler);

    function buildModeler() {
        let weight = document.getElementById('weight-class').value;
        let sex = $('#modeler').val();
        let el = document.getElementById('column-center');
        let rowdata = document.getElementById('row-breast');
        let breast = document.getElementById('breasts');
        let breastsize = document.getElementById('breast-size');
        const torso = document.getElementById('torso-height');
        const torsoDesc = document.getElementById('row-torso');
        const crotch = document.getElementById('crotch-height');
        const crotchDesc = document.getElementById('row-crotch');


        if (weight) {
           
            shape = sex + "_" + weight; //OW, morbid, skinny, average //female_skinny
            document.getElementById("head").id = `${sex}-${weight}-head`;
            document.getElementById("neck").id = `${sex}-${weight}-neck`;
            document.getElementById("shoulders").id = `${sex}-${weight}-shoulders`;
            document.getElementById("stomach").id = `${sex}-${weight}-stomach`;
            document.getElementById("legs").id = `${sex}-${weight}-legs`;

            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = `{{ static_asset('assets/js/modelers/${shape}.js') }}`;

            document.body.appendChild(script);
            el.classList.add(`${shape}`);

            if (sex !== "male") {
                document.getElementById("breasts").id = `${sex}-${weight}-breasts`;
            } else {
                crotch.remove();
                crotchDesc.remove();
                torso.remove();
                torsoDesc.remove();
                if (weight === "OW") {
                    breast.remove();
                } else {
                    rowdata.remove();
                    breast.remove();
                    breastsize.remove();
                }
            }
        } 
    }

    document.removeEventListener("change", buildModeler);
</script>

<script>

    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

<script>
    /* stops scrolling when active div becomes visibile */
    let origin = document.getElementById('origin'),
        origin_class = origin.className,
        pos_map = window.innerHeight*2 - window.innerHeight/2;
        
    if (window.matchMedia('screen and (max-width: 800px)').matches) {
        window.addEventListener('scroll', function (event) {            
            if (window.scrollY >= pos_map && origin_class === "not_active") { 
                window.scroll({
                    top: origin.top,
                    left: 0,
                    behavior: "smooth",
                });
            } else {
                console.log("relevant div not within viewport");
            }
        }, false);
    } 


</script>