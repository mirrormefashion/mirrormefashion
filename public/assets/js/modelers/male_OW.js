document.getElementById("male-OW-head").style.backgroundPosition = `0px 0px`;
document.getElementById("male-OW-neck").style.backgroundPosition = `0px 0px`;
document.getElementById("male-OW-shoulders").style.backgroundPosition = `0px 0px`;
document.getElementById("male-OW-stomach").style.backgroundPosition = `0px -580px`;
document.getElementById("male-OW-legs").style.backgroundPosition = `0px 0px`;

let maleHead = document.querySelector("#male-OW-head");
let maleNeck = document.querySelector("#male-OW-neck");
let maleShoulders = document.querySelector("#male-OW-shoulders");
let maleStomach = document.querySelector("#male-OW-stomach");
let maleLegs = document.querySelector("#male-OW-legs");


//default modeler
$('#reset').click(function(e) {
    e.preventDefault();
    maleHead.style.bottom = "-98px";
    maleNeck.style.bottom = "-25px";
    maleShoulders.style.bottom = "56px";
    maleStomach.style.bottom = "276px";

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
        document.getElementById("slider-breasts-shape").value = "0";
        document.getElementById("slider-arm-size").value = "0";
    }
    if (maleStomach != null) {
        maleStomach.style.backgroundPosition = `0px -580px`;
        document.getElementById("slider-stomach-shape").value = "0";
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
    var slideValHeadSize = document.getElementById("slider-head-size").value;
    var slideValNeckHt = document.getElementById("slider-neck-height").value;
    var slideValNeckWt = document.getElementById("slider-neck-width").value;
    var slideValNeckShape = document.getElementById("slider-neck-shape").value;
    var slideValBreasts = document.getElementById("slider-breasts-shape").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    let slideValArm = document.getElementById("slider-arm-size").value;
    let slideValStomach = document.getElementById("slider-stomach-shape").value;
    let slideValLegs = document.getElementById("slider-leg-size").value;
    let slideValHips = document.getElementById("slider-hip-size").value;
    let slideValCrotch = document.getElementById("slider-crotch-height").value;
    let slideValTorso = document.getElementById("slider-torso-height").value;

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

    if (slideValBreasts != null) {
        if (slideValBreasts == 0) {
            classification = "Average";
        } else if (slideValBreasts == 1) {
            classification = "Dropped";
        } else {
            classification = "Error";
        }
        document.getElementById("label-breast-shape").setAttribute("value", classification);
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

    if (slideValTorso != null) {
        if (slideValTorso == 0) {
            classification = "Average";
        } else if (slideValTorso == 1) {
            classification = "Distended";
        } else {
            classification = "Error";
        }
        document.getElementById("label-torso-height").setAttribute("value", classification);
   }

    if (slideValStomach != null) {
        if (slideValStomach == 0) {
            classification = "Rectangle";

        } else if (slideValStomach == 1) {
            classification = "Layered";

        } else if (slideValStomach == 2) {
            classification = "Average";

        } else if (slideValStomach == 3) {
            classification = "Round";

        } else if (slideValStomach == 4) {
            classification = "Muffintop";

        } else if (slideValStomach == 5) {
            classification = "Spoon";

        } else if (slideValStomach == 6) {
            classification = "Muscular";

        } else {
            classification = "Error";
        }
        document.getElementById("label-stomach-shape").setAttribute("value", classification);
    }


    if (slideValHips != null) {
        if (slideValHips == 0) {
            classification = "No hips";
        } else if (slideValHips == 1) {
            classification = "Some hips";
        } else {
            classification = "Error";
        }
        document.getElementById("label-hip-size").setAttribute("value", classification);
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
    var slideValTorso = document.getElementById("slider-torso-height").value;
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    k_xpos = (slideValNeckWt * -647) + (slideValNeckShape * -3235);
    k_ypos = (slideValShoulderHt * -140);
    ypos = -137 * slideValHeadShape;
    xpos = -647 * slideValHeadSize;

    headBase = -98;
    shouldersBase = 56;
    n = -25;
    s = 276;
    Inc1 = 8; //increments torso
    Inc2 = 10; //incremenets crotch
    headInc = -3; //incs relative to new head pos i.e. increment of head for neck ht 
    headPos = slideValNeckHt * headInc;
    Increment = (slideValTorso * Inc1) + (slideValCrotch * Inc2);
    newShoulders = shouldersBase + Increment;
    newStomach = s + (slideValCrotch * Inc2);
    maleNeck.style.backgroundPosition = `${k_xpos}px ${k_ypos}px`;
    maleHead.style.backgroundPosition = `${xpos}px ${ypos}px`;
    maleShoulders.style.bottom = `${newShoulders}px`;
    maleStomach.style.bottom = `${newStomach}px`;
    nPos = n + slideValShoulderWt * .25;

    if (slideValStomach == 0) {

        document.getElementById("slider-shoulder-height").style.max = "2";
        nPos = (n + 1) + slideValShoulderWt * .25;
        maleNeck.style.bottom = `${nPos + Increment}px`;
        maleHead.style.bottom = `${headBase + headPos + headInc  + Increment}px`;

        if (slideValShoulderHt >= 2) {
            nPos = (n + 3) + slideValShoulderWt * .25;
            maleNeck.style.bottom = `${nPos + Increment}px`;
            document.getElementById("slider-shoulder-height").style.value = "1";
            return
        } else {
            nPos = (n + 3) + slideValShoulderWt * .25;
            maleNeck.style.bottom = `${nPos + Increment}px`;
        }
    } else {
        if (slideValShoulderHt == 0) {

        } else if (slideValShoulderHt == 2) {
            maleHead.style.bottom = `${headBase + headPos + Increment + (2 * headInc)}px`;
            maleNeck.style.bottom = `${nPos + Increment}px`;
        } else {
            nPos = n + slideValShoulderWt * .5;
            maleNeck.style.bottom = `${nPos + Increment}px`;
            maleHead.style.bottom = `${headBase + headPos + Increment + (2 * headInc)}px`;
        }
    }

    if (slideValNeckHt >= 4) {
        x = -3235 + xpos;
        maleHead.style.backgroundPosition = `${x}px ${ypos}px`;
    } else {
        maleHead.style.backgroundPosition = `${xpos}px ${ypos}px`;
    }

}

function recShoulders() {
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    var slideValArm = document.getElementById("slider-arm-size").value;
    var slideValBreast = document.getElementById("slider-breasts-shape").value;
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValTorso = document.getElementById("slider-torso-height").value;

    o_ypos = -290 * slideValStomach;
    o_xpos = (-647 * slideValShoulderWt) + (-5823 * slideValTorso); //stomach width
    xpos = (-647 * slideValShoulderWt) + (-5823 * slideValShoulderHt);
    ypos = (-234 * slideValArm) + (-3510 * slideValBreast);

    maleStomach.style.backgroundPosition = `${o_xpos}px ${o_ypos}px`;

    if (slideValStomach == 0) { //rectangle
        document.getElementById("slider-breasts-shape").value = slideValBreast;
        document.getElementById("slider-breasts-shape").setAttribute("max", 1);
        n = -1170;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else {
        if (slideValStomach == 6) { //muscular
            document.getElementById("slider-breasts-shape").value = "0";
            document.getElementById("slider-breasts-shape").setAttribute("max", 0);
            n = -2340;
            y = n + (-234 * slideValArm);
            maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        } else {
            document.getElementById("slider-breasts-shape").value = slideValBreast;
            document.getElementById("slider-breasts-shape").setAttribute("max", 1);
            maleShoulders.style.backgroundPosition = `${xpos}px ${ypos}px`;
        }
    }


}

function recLegs() {
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValLeg = document.getElementById("slider-leg-size").value;
    var slideValCrotch = document.getElementById("slider-crotch-height").value;
    var slideValHip = document.getElementById("slider-hip-size").value;

    z_xpos = (-647 * slideValLeg) + (-3235 * slideValCrotch);
    z_ypos = (-501 * slideValShoulderWt) + (-4509 * slideValHip);

    if (slideValStomach != 5) {
        //$('#male-OW-legs').css("background-image", "url('/public/assets/img/sprite/male-OW-legs[1].png')");  
        if (slideValStomach == 0) { //rectangle legs
            document.getElementById("slider-hip-size").value = "0";
            document.getElementById("slider-hip-size").setAttribute("max", 0);
            y = -10020;
            z_ypos = y + (-501 * slideValShoulderWt);
            maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        } else if (slideValStomach >= 1 && slideValStomach <= 4) {
            document.getElementById("slider-hip-size").value = slideValHip;
            document.getElementById("slider-hip-size").setAttribute("max", 1);
            y = -1002;
            z_ypos = y + z_ypos;
            maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        } else { //muscular legs
            document.getElementById("slider-hip-size").value = slideValHip;
            document.getElementById("slider-hip-size").setAttribute("max", 1);
            z_ypos = (-501 * slideValHip);
            maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        }
    } else { //spoon legs
        y = -14529;
        z_ypos = y + z_ypos;
        document.getElementById("slider-hip-size").value = slideValHip;
        document.getElementById("slider-hip-size").setAttribute("max", 1);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
    }

}

//head shape
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

function mbreast_shape() {
    /*
    var $target = $("#male-OW-shoulders");
    var gridHeight = $target.height();
    */
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}

function mshoulders_height() {
    recHead();
    recShoulders();
    attrChecker();

}

function mshoulders_width() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}

function marms() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}

function torso_height() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}

function mstomach_shape() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}

function mlegs() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}

function mhips() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();
}

function mcrotch() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}


//disabled sliders
function removeElem() {
    document.getElementById("breasts-label").innerHTML = "Breasts Shape:";
}
removeElem();



/*--------------------- Classify Function ----------------------*/



function classify() {
    stomach = document.getElementById("label-stomach-shape").value;
    width = document.getElementById("slider-shoulder-width").value;

    if (stomach == "layered" || stomach == "average" || stomach == "muffintop" || stomach == "rectangle") {
        if (width >= 4 || stomach == "layered" || stomach == "muffintop") {
            document.getElementById("classification").setAttribute("value", "male triangle");
        } else {
            document.getElementById("classification").setAttribute("value", "male-" + stomach);
        }
    } else {
        document.getElementById("classification").setAttribute("value", "male-" + stomach);
    }
    bodyPosVal('male', 'OW');
} //end function