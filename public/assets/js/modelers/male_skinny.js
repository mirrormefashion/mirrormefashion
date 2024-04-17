document.getElementById("male-skinny-head").style.backgroundPosition = `0px 0px`;
document.getElementById("male-skinny-neck").style.backgroundPosition = `0px 0px`;
document.getElementById("male-skinny-shoulders").style.backgroundPosition = `0px 0px`;
document.getElementById("male-skinny-stomach").style.backgroundPosition = `0px -263px`;
document.getElementById("male-skinny-legs").style.backgroundPosition = `0px 0px`;


//Reconsile changes to each feature 


let maleHead = document.querySelector("#male-skinny-head");
let maleNeck = document.querySelector("#male-skinny-neck");
let maleShoulders = document.querySelector("#male-skinny-shoulders");
let maleStomach = document.querySelector("#male-skinny-stomach");
let maleLegs = document.querySelector("#male-skinny-legs");

//default modeler
$('#reset').click(function(e) {
    e.preventDefault();
    maleHead.style.bottom = "-93px";
    maleNeck.style.bottom = "-42px";
    maleShoulders.style.bottom = "47px";
    maleStomach.style.bottom = "264px";

    if (maleHead != null) {
        maleHead.style.backgroundPosition = `0px 0px`;
        document.getElementById("slider-head-shape").value = "0";
        document.getElementById("slider-head-size").value = "0";
    }
    if (maleNeck != null) {
        maleNeck.style.backgroundPosition = `0px 0px`;
        document.getElementById("slider-neck-shape").value = "0";
        document.getElementById("slider-neck-height").value = "0";
        document.getElementById("slider-neck-width").value = "0";
    }
    if (maleShoulders != null) {
        maleShoulders.style.backgroundPosition = `0px 0px`;
        document.getElementById("slider-shoulder-height").value = "0";
        document.getElementById("slider-shoulder-width").value = "0";
        document.getElementById("slider-arm-size").value = "0";
    }
    if (maleStomach != null) {
        maleStomach.style.backgroundPosition = `0px -263px`;
        document.getElementById("slider-stomach-shape").value = "1";
        document.getElementById("slider-torso-height").value = "0";
    }
    if (maleLegs != null) {
        maleLegs.style.backgroundPosition = `0px 0px`;
        document.getElementById("slider-crotch-height").value = "0";
        document.getElementById("slider-leg-size").value = "0";
        document.getElementById("slider-hip-size").value = "0";
    }
});

function attrChecker() {
    var slideValHeadShape = document.getElementById("slider-head-shape").value;
    var slideValNeckHt = document.getElementById("slider-neck-height").value;
    var slideValNeckWt = document.getElementById("slider-neck-width").value;
    var slideValNeckShape = document.getElementById("slider-neck-shape").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    let slideValStomach = document.getElementById("slider-stomach-shape").value;
    let slideValCrotch = document.getElementById("slider-crotch-height").value;

    if (slideValHeadShape != null) {
        if (slideValHeadShape == 0) {
            classification = "Oval Shape";
        } else if (slideValHeadShape == 1) {
            classification = "Oblong Shape";
        } else if (slideValHeadShape == 2) {
            classification = "Round Shape";
        } else if (slideValHeadShape == 3) {
            classification = "Coned Shape";
        } else {
            classification = "Error";
        }
        document.getElementById("label-head-shape").setAttribute("value", classification);
    }

    if (slideValNeckHt != null) {
        if (slideValNeckHt == 0) {
            classification = "Tall";
        } else if (slideValNeckHt == 1) {
            classification = "Tall";
        } else if (slideValNeckHt == 2) {
            classification = "Average";
        } else if (slideValNeckHt == 3) {
            classification = "Average";
        } else if (slideValNeckHt == 4) {
            classification = "Short";
        } else {
            classification = "Error";
        }

        document.getElementById("label-neck-height").setAttribute("value", classification);
    }

    if (slideValNeckShape != null) {
        if (slideValNeckShape == 0) {
            classification = "Average";
        } else if (slideValNeckShape == 1) {
            classification = "Trapezoidal";
        } else {
            classification = "Error";
        }
        document.getElementById("label-neck-shape").setAttribute("value", classification);
    }

    if (slideValNeckWt != null) {
        if (slideValNeckWt == 0) {
            classification = "Thin";
            measurement = "11.5cm";
        } else if (slideValNeckWt == 1) {
            classification = "Average";
            measurement = "13cm";
        } else if (slideValNeckWt == 2) {
            classification = "Average";
            measurement = "14.5cm";
        } else if (slideValNeckWt == 3) {
            classification = "Girthy";
            measurement = "16cm";
        } else if (slideValNeckWt == 4) {
            classification = "Girthy";
            measurement = "17.5cm";
        } else {
            classification = "Error";
        }
        document.getElementById("label-neck-width").setAttribute("value", classification);
    }

    if (slideValShoulderHt != null) {
        if (slideValShoulderHt == 0) {
            classification = "Strong";
        } else if (slideValShoulderHt == 1) {
            classification = "Average";
        } else if (slideValShoulderHt == 2) {
            classification = "Dropped";
        } else {
            classification = "Error";
        }

        document.getElementById("label-shoulder-height").setAttribute("value", classification);

    }

    if (slideValShoulderWt != null) {
        if (slideValShoulderWt == 0) {
            classification = "Narrow";

        } else if (slideValShoulderWt == 1) {
            classification = "Narrow";

        } else if (slideValShoulderWt == 2) {
            classification = "Average";

        } else if (slideValShoulderWt == 3) {
            classification = "Average";

        } else if (slideValShoulderWt == 4) {
            classification = "Average";

        } else if (slideValShoulderWt == 5) {
            classification = "Average";

        } else if (slideValShoulderWt == 6) {
            classification = "Average";

        } else if (slideValShoulderWt == 7) {
            classification = "Broad";

        } else if (slideValShoulderWt == 8) {
            classification = "Broad";

        } else {
            classification = "Error";
        }

        document.getElementById("label-shoulder-width").setAttribute("value", classification);


    }

    if (slideValStomach != null) {
        if (slideValStomach == 0) {
            classification = "Rectangle";
        } else if (slideValStomach == 1) {
            classification = "Average";
        } else if (slideValStomach == 2) {
            classification = "Muffintop";
        } else {
            classification = "Error";
        }
        document.getElementById("label-stomach-shape").setAttribute("value", classification);

    }

    if (slideValCrotch != null) {
        if (slideValCrotch == 0) {
            classification = "Average";

        } else if (slideValCrotch == 1) {
            classification = "Distended";

        } else if (slideValCrotch == 2) {
            value = "Tall";

        } else {
            classification = "Error";
        }

        document.getElementById("label-crotch-height").setAttribute("value", classification);
    }
} 

function recHead() {
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    let slideValNeckShape = document.getElementById("slider-neck-shape").value;
    var slideValNeckHt = document.getElementById("slider-neck-height").value;
    var slideValHeadSize = document.getElementById("slider-head-size").value;
    var slideValHeadShape = document.getElementById("slider-head-shape").value;
    var slideValNeckWt = document.getElementById("slider-neck-width").value;
    var slideValCrotch = document.getElementById("slider-crotch-height").value;
    var slideValStomach = document.getElementById("slider-stomach-shape").value;

    k_xpos = (slideValNeckWt * -647) + (slideValNeckShape * -3235);
    k_ypos = (slideValShoulderHt * -119);
    ypos = -137 * slideValHeadShape;
    xpos = -647 * slideValHeadSize;
    neckAdj = (slideValCrotch * 9); //old code: neckAdj = (slideValTorso * 6) + (slideValCrotch * 9);
    headBase = -100; //new value
    shouldersBase = 31;
    neckbase = -45;
    s = 232;
    Inc1 = 12;
    Inc2 = 10;
    headInc = -3; //incs relative to new head pos i.e. increment of head for neck ht 
    headPos = slideValNeckHt * headInc;
    torsoInc = 6;
    heightInc = 3;

    headPos = slideValNeckHt * headInc;
    Increment = slideValCrotch * Inc2;
    newShoulders = shouldersBase + Increment;
    newStomach = s + (slideValCrotch * Inc2);
    maleNeck.style.backgroundPosition = `${k_xpos}px ${k_ypos}px`;
    maleHead.style.backgroundPosition = `${xpos}px ${ypos}px`;
    maleShoulders.style.bottom = `${newShoulders}px`;
    maleStomach.style.bottom = `${newStomach}px`;
    nPos = neckbase + (slideValShoulderWt * .25);

    if (slideValStomach == 0) {
        document.getElementById("slider-shoulder-height").style.max = "2";
        maleNeck.style.bottom = `${nPos + Increment}px`;
        maleHead.style.bottom = `${headBase + headPos + Increment}px`;

        if (slideValShoulderHt >= 2) {
            nPos = n + slideValShoulderWt * .5;
            maleNeck.style.bottom = `${nPos + Increment}px`;
            document.getElementById("slider-shoulder-height").style.value = "1";
            return
        } else {
            maleNeck.style.bottom = `${nPos + Increment}px`;
        }
    } else {
        if (slideValShoulderHt == 0) {
            maleNeck.style.bottom = `${nPos + Increment}px`;
            maleHead.style.bottom = `${headBase + headPos + Increment}px`;
        } else {
            //nPos = n + slideValShoulderWt * .5;
            maleNeck.style.bottom = `${nPos + Increment}px`;
            maleHead.style.bottom = `${headBase + headPos + Increment + (2 * headInc)}px`;
        }
    }

    if (slideValNeckHt >= 4) {
        x = -3235 + xpos;
        maleHead.style.backgroundPosition = `${x}px ${ypos}px`;
    } else {
        maleHead.style.backgroundPosition = `${xpos}px ${ypos}px`;
        if (slideValNeckWt >= 3) {
            document.getElementById("slider-neck-height").style.value = "2";
        } else {
            document.getElementById("slider-neck-height").style.value = "";

        }
    }
}


function recShoulders() {
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValArm = document.getElementById("slider-arm-size").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    let slideValNeckShape = document.getElementById("slider-neck-shape").value;
    o_ypos = -263 * slideValStomach;
    o_xpos = -647 * slideValShoulderWt;
    ypos = slideValArm * -230;
    xpos = (-647 * slideValShoulderWt) + (-5823 * slideValShoulderHt);
    k_xpos = (-647 * slideValShoulderWt) + (-3235 * slideValNeckShape);
    maleStomach.style.backgroundPosition = `${o_xpos}px ${o_ypos}px`;

    if (slideValStomach == 0) { //rectangle
        n = -2300;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 1) { //average
        n = 0;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 2) { //MT
        n = -1150;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else {
        defaultModel();
    }

    if (slideValShoulderHt == 0) {
        maleNeck.style.backgroundPosition = `${k_xpos}px 0px`;

    } else if (slideValShoulderHt == 1) {
        maleNeck.style.backgroundPosition = `${k_xpos}px -114px`;

    } else {
        maleNeck.style.backgroundPosition = `${k_xpos}px -228px`;

    }
}

function recLegs() {
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValCrotch = document.getElementById("slider-crotch-height").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValLeg = document.getElementById("slider-leg-size").value;
    z_xpos = (-647 * slideValLeg) + (-1941 * slideValCrotch);
    z_ypos = -457 * slideValShoulderWt;

    if (slideValStomach == 0) { //rectangle
        z = -4113 + z_ypos; //rectangle legs pos y   
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z}px`;

    } else { //all others
        z = 0 + z_ypos;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z}px`;
    }

    if (slideValCrotch == 0) {
        maleStomach.style.bottom = "231px";

    } else if (slideValCrotch == 1) {
        maleStomach.style.bottom = "245px";

    } else if (slideValCrotch == 2) {
        maleStomach.style.bottom = "254px";

    } else { defaultModel(); }
}


function mhead_shape() {
    recHead();
    attrChecker();
}

function mhead_size() {
    recHead();
    attrChecker();
}

function mneck_height() {
    recHead();
    attrChecker();
}

function mneck_shape() {
    recHead();
    attrChecker();
}

function mneck_width() {
    recHead();
    attrChecker();
}

function mshoulders_height() {
    recShoulders();
    recHead();
    recLegs();
    attrChecker();
}

function mshoulders_width() {
    recShoulders();
    recHead();
    recLegs();  
    attrChecker();  
}

function marms() {
    recShoulders();
    recHead();
    recLegs();    
    attrChecker();
}


function mstomach_shape() {
    recShoulders();
    recHead();
    recLegs();
    attrChecker();
}

function mlegs() {
    recShoulders();
    recHead();
    recLegs();  
    attrChecker();  
}

function mcrotch() {
    recShoulders();
    recHead();
    recLegs();   
    attrChecker(); 
}

//disabled sliders
function removeElem() {
    const torso = document.getElementById('torso-height');
    const rowTorso = document.getElementById('row-torso');    
    const hip = document.getElementById('hip-size');
    const rowHip = document.getElementById('row-hip');
    const breasts = document.getElementById('breast-size');
    const breastsRow = document.getElementById('row-breast');
    torso.remove();
    rowTorso.remove();
    hip.remove();
    rowHip.remove();
    breasts.remove();
    breastsRow.remove();
} removeElem();





/*--------------------- Process Modeler  ----------------------*/


function classify() {
    stomach = document.getElementById("label-stomach-shape").value;
    width = document.getElementById("slider-shoulder-width").value;

    if (stomach == "muffintop" || stomach == "rectangle") {
        if (width >= 4) {
            document.getElementById("classification").setAttribute("value", "male triangle");
        } else {
            document.getElementById("classification").setAttribute("value", "male-" + stomach);
        }
    } else {
        document.getElementById("classification").setAttribute("value", "male-average");
    }
    bodyPosVal('male', 'skinny');
} //end function