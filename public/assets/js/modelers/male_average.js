document.getElementById("male-average-head").style.backgroundPosition = `0px 0px`;
document.getElementById("male-average-neck").style.backgroundPosition = `0px 0px`;
document.getElementById("male-average-shoulders").style.backgroundPosition = `0px 0px`;
document.getElementById("male-average-stomach").style.backgroundPosition = `0px -606px`;
document.getElementById("male-average-legs").style.backgroundPosition = `0px 0px`;

//Reconsile changes to each feature 

let maleHead = document.querySelector("#male-average-head");
let maleNeck = document.querySelector("#male-average-neck");
let maleShoulders = document.querySelector("#male-average-shoulders");
let maleStomach = document.querySelector("#male-average-stomach");
let maleLegs = document.querySelector("#male-average-legs");


//default modeler
$('#reset').click(function(e) {
    e.preventDefault();
    maleHead.style.bottom = "-96px";
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
        maleStomach.style.backgroundPosition = `0px -606px`;
        document.getElementById("slider-stomach-shape").value = "2";
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
            classification = "Straight";
        } else if (slideValStomach == 2) {
            classification = "Average";
        } else if (slideValStomach == 3) {
            classification = "Pouch";
        } else if (slideValStomach == 4) {
            classification = "Round";
        } else if (slideValStomach == 5) {
            classification = "Muffintop";
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
    k_ypos = (slideValShoulderHt * -119);
    ypos = -137 * slideValHeadShape;
    xpos = -647 * slideValHeadSize;
    headBase = -96; //new value
    shouldersBase = 47;
    n = -41;
    s = 264;
    Inc1 = 8;
    Inc2 = 10;
    headInc = -3; //incs relative to new head pos i.e. increment of head for neck ht 
    headPos = slideValNeckHt * headInc;
    ypos = -137 * slideValHeadShape;
    xpos = -647 * slideValHeadSize;


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
            nPos = (n + 1) + slideValShoulderWt * .25;
            maleNeck.style.bottom = `${nPos + Increment}px`;
            document.getElementById("slider-shoulder-height").style.value = "1";
            return
        } else {
            nPos = (n + 1) + slideValShoulderWt * .25;
            maleNeck.style.bottom = `${nPos + Increment}px`;
        }
    } else {
        if (slideValShoulderHt == 0) {
            maleNeck.style.bottom = `${nPos + Increment}px`;
            maleHead.style.bottom = `${headBase + headPos + headInc  + Increment}px`;
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
        if (slideValNeckWt >= 3) {
            document.getElementById("slider-neck-height").style.value = "2";
        } else {
            document.getElementById("slider-neck-height").style.value = "";

        }
    }




}

function recShoulders() {
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValTorso = document.getElementById("slider-torso-height").value;
    var slideValArm = document.getElementById("slider-arm-size").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    o_xpos = (slideValTorso * -5823) + (slideValShoulderWt * -647);
    o_ypos = -303 * slideValStomach;
    ypos = slideValArm * -241;
    xpos = (-647 * slideValShoulderWt) + (-5823 * slideValShoulderHt);
    maleStomach.style.backgroundPosition = `${o_xpos}px ${o_ypos}px`;

    if (slideValStomach == 0) { //rectangle
        n = -6748;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 1) { //straight
        n = 0;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 2) { //average
        n = -1687;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 3) {
        n = -1687;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 4) {
        n = 0;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 5) {
        n = -1687;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 6) {
        n = -5061;
        y = n + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else {
        defaultModel();
    }


}

function recLegs() {
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValCrotch = document.getElementById("slider-crotch-height").value;
    var slideValLeg = document.getElementById("slider-leg-size").value;
    var slideValHip = document.getElementById("slider-hip-size").value;
    z_xpos = (-647 * slideValLeg) + (-3235 * slideValCrotch);

    if (slideValStomach == 0) { //rectangle
        z = -8604; //rectangle legs pos y
        z_ypos = z + (-478 * slideValShoulderWt) + (-4302 * slideValHip);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-hip-size").setAttribute("max", 0);

    } else { //all others
        z = 0;
        z_ypos = z + (-478 * slideValShoulderWt) + (-4302 * slideValHip);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-hip-size").setAttribute("max", 1);
    }

    if (slideValCrotch == 0) {
        value = "Tall Height";

        maleStomach.style.bottom = "264px";

    } else if (slideValCrotch == 1) {
        value = "Average Height";

        maleStomach.style.bottom = "274px";

    } else if (slideValCrotch == 2) {
        value = "Short Height";

        maleStomach.style.bottom = "284px";

    } else { defaultModel(); }

}

function mhead_shape() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();

}

function mhead_size() {
    recHead();
    recShoulders();
    attrChecker();

}

function mneck_height() {
    recHead();
    recShoulders();
    recLegs();
    attrChecker();


}

function mneck_shape() {
    recHead();
    recShoulders();
    attrChecker();

}

function mneck_width() {
    recHead();
    recShoulders();
    attrChecker();

}


function mshoulders_height() {
    recHead();
    recShoulders();
    recLegs();
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

function mhips() {
    recShoulders();
    recLegs();
    attrChecker();
}


function removeElem() {
    const breast = document.getElementById('breast-size');
    const rowdata = document.getElementById('row-breast');
    document.getElementById("breasts-label").innerHTML = "Breasts Shape:";
    breast.remove();
    rowdata.remove();
    //$("#chat-convo").html("Next");
}
removeElem();




/*--------------------- Process Modeler  ----------------------*/


function classify() {
    $("#summit").show();
    stomach = document.getElementById("label-stomach-shape").value;
    width = document.getElementById("slider-shoulder-width").value;

    if (stomach == "round" || stomach == "muscular") {
        document.getElementById("classification").setAttribute("value", "male-" + stomach);
    } else if (stomach == "rectangle" || stomach == "muffintop") {
        document.getElementById("classification").setAttribute("value", "male-triangle");
    } else if (stomach == "average" || stomach == "straight") {
        if (width >= 4) {
            document.getElementById("classification").setAttribute("value", "male-triangle");
        } else {
            document.getElementById("classification").setAttribute("value", "male-average");
        }
    } else {
        //pouch
        if (width >= 4) {
            if (legs <= 2) {
                document.getElementById("classification").setAttribute("value", "male-triangle");
            } else {
                document.getElementById("classification").setAttribute("value", "male-average");
            }
        } else {
            document.getElementById("classification").setAttribute("value", "male-average");
        }
    }
    bodyPosVal('male', 'average');

} //end function