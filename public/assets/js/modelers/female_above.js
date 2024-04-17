document.getElementById("female-above-head").style.backgroundPosition = `0px 0px`;
document.getElementById("female-above-neck").style.backgroundPosition = `0px 0px`;
document.getElementById("female-above-breasts").style.backgroundPosition = `0px 0px`;
document.getElementById("female-above-shoulders").style.backgroundPosition = `0px 0px`;
document.getElementById("female-above-stomach").style.backgroundPosition = `0px -628px`;
document.getElementById("female-above-legs").style.backgroundPosition = `0px 0px`;

//Reconsile changes to each feature 
let femaleHead = document.querySelector("#female-above-head");
let femaleNeck = document.querySelector("#female-above-neck");
let femaleBreasts = document.querySelector("#female-above-breasts");
let femaleShoulders = document.querySelector("#female-above-shoulders");
let femaleStomach = document.querySelector("#female-above-stomach");
let femaleLegs = document.querySelector("#female-above-legs");

function remove() {
    let torso = document.getElementById('torso-height');
    let torsoDesc = document.getElementById('row-torso');
    let crotch = document.getElementById('crotch-height');
    let crotchDesc = document.getElementById('row-crotch');
    crotch.remove();
    crotchDesc.remove();
    torso.remove();
    torsoDesc.remove();
}
remove();

//Default Modeler
function defaultModel() {
    if (femaleHead != null) {
        femaleHead.style.backgroundPosition = `0px 0px`;
        femaleHead.style.bottom = `-96px`;
        document.getElementById("slider-head-shape").value = "0";
        document.getElementById("slider-head-size").value = "0";
    }
    if (femaleNeck != null) {
        femaleNeck.style.backgroundPosition = `0px 0px`;
        document.getElementById("slider-neck-shape").value = "0";
        document.getElementById("slider-neck-width").value = "0";
        document.getElementById("slider-neck-height").value = "0"; 
    }
    if (femaleBreasts != null) {
        femaleBreasts.style.backgroundPosition = `0px 0px`;
        femaleBreasts.style.bottom = `99px`;
        document.getElementById("slider-breasts-shape").value = "0";
    }
    if (femaleShoulders != null) {
        femaleShoulders.style.backgroundPosition = `0px 0px`;
        document.getElementById("slider-shoulder-height").value = "0";
        document.getElementById("slider-shoulder-width").value = "0";
        document.getElementById("slider-arm-size").value = "0";
    }
    if (femaleStomach != null) {
        femaleStomach.style.backgroundPosition = `0px -628px`;
        document.getElementById("slider-stomach-shape").value = "2";
    }
    if (femaleLegs != null) {
        femaleLegs.style.backgroundPosition = `0px 0px`;
        document.getElementById("slider-leg-size").value = "0";
        document.getElementById("slider-hip-size").value = "0";
        document.getElementById("slider-crotch-height").value = "0";
    }
}

$('#reset').onclick(function(e) {
    e.preventDefault();
    defaultModel();
});

function attrChecker() {
    var slideValHeadShape = document.getElementById("slider-head-shape").value;
    var slideValNeckHt = document.getElementById("slider-neck-height").value;
    var slideValNeckWt = document.getElementById("slider-neck-width").value;
    var slideValNeckShape = document.getElementById("slider-neck-shape").value;
    let slideValBreasts = document.getElementById("slider-breasts-shape").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    let slideValStomach = document.getElementById("slider-stomach-shape").value;
    let slideValHips = document.getElementById("slider-hip-size").value;

    if (slideValHeadShape != null) {
        if (slideValHeadShape == 0) {
            classification = "Oval Shape";
        } else if (slideValHeadShape == 1) {
            classification = "Oblong Shape";
        } else if (slideValHeadShape == 2) {
            classification = "Round Shape";
        } else {
            classification = "Error";
        }
        document.getElementById("label-head-shape").setAttribute("value", classification);
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
            classification = "Strong";
        } else if (slideValShoulderHt == 2) {
            classification = "Average";
        } else if (slideValShoulderHt == 3) {
            classification = "Average";
        } else if (slideValShoulderHt == 4) {
            classification = "Dropped";
        } else {
            classification = "Error";
        }

        document.getElementById("label-shoulder-height").setAttribute("value", classification);
    }

    if (slideValBreasts != null) {
        if (slideValBreasts == 0) {
            classification = "AA/A Cup";
        } else if (slideValBreasts == 1) {
            classification = "B Cup";
        } else if (slideValBreasts == 2) {
            classification = "C Cup";
        } else if (slideValBreasts == 3) {
            classification = "D/DD Cup";
        } else if (slideValBreasts == 4) {
            classification = "DDD/E Cup";
        } else if (slideValBreasts == 5) {
            classification = "F/G Cup";
        } else if (slideValBreasts == 6) {
            classification = "HH Cup";
        } else if (slideValBreasts == 7) {
            classification = "HHH Cup";
        } else if (slideValBreasts == 8) {
            classification = "J/K Cup";
        } else { defaultModel(); }

        document.getElementById("label-breast-shape").setAttribute("value", classification);

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
            classification = "Pouch";
        } else if (slideValStomach == 2) {
            classification = "Average";
        } else if (slideValStomach == 3) {
            classification = "Muffintop";
        } else if (slideValStomach == 4) {
            classification = "Spoon";
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
        } else if (slideValHips == 2) {
            classification = "Wide hips";
        } else {
            classification = "Error";
        }

        document.getElementById("label-hip-size").setAttribute("value", classification);
    }

}

function recHead() {
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    var slideValNeckWt = document.getElementById("slider-neck-width").value;
    var slideValNeckHt = document.getElementById("slider-neck-height").value;
    var slideValNeckShape = document.getElementById("slider-neck-shape").value;
    var slideValHeadSize = document.getElementById("slider-head-size").value;
    var slideValHeadShape = document.getElementById("slider-head-shape").value;
    let slideValStomach = document.getElementById("slider-stomach-shape").value;
    ypos = -145 * slideValHeadShape;
    xpos = -481 * slideValHeadSize;
    k_xpos = (slideValNeckShape * -2405) + (slideValNeckWt * -481);
    headBase = -96;
    headInc = -3;
    headPos = slideValNeckHt * headInc;

    if (slideValStomach == 0 && slideValShoulderHt >= 3) {
        return false
    } else {
        if (slideValShoulderHt == 0 || slideValShoulderHt == 2 || slideValShoulderHt == 4) {
            if (slideValShoulderHt == 2 || slideValShoulderHt == 4) {
                femaleHead.style.bottom = `${headBase + headPos + (2 * headInc)}px`;
            } else { 
                femaleHead.style.bottom = `${headBase + headPos + headInc}px`;
            }
        } else {
            femaleHead.style.bottom = `${headBase + headPos + (2 * headInc)}px`;
        }
    }

    if (slideValNeckHt >= 4) {
        femaleHead.style.backgroundPosition = `${-2405 + xpos}px ${ypos}px`;
    } else {
        femaleHead.style.backgroundPosition = `${xpos}px ${ypos}px`;
    }
}

function recBreasts() {
    let slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    let slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    let slideValStomach = document.getElementById("slider-stomach-shape").value;
    let slideValBreasts = document.getElementById("slider-breasts-shape").value;
    e_xpos = (-481 * slideValShoulderWt);
    e_ypos = (-266 * slideValBreasts); //breasts

    chestBase = 99;
    chestDec = 4;
    chestPos = chestBase - (slideValShoulderHt * chestDec);

    if (slideValStomach == 0) {
        n = -4329;
        xpos = n + e_xpos;
        femaleBreasts.style.backgroundPosition = `${xpos}px ${e_ypos}px`;
        chestDec = 5;
        chestPos = chestBase - (slideValShoulderHt * chestDec);
        femaleBreasts.style.bottom = `${chestPos}px`;
    } else {
        femaleBreasts.style.backgroundPosition = `${e_xpos}px ${e_ypos}px`;
        femaleBreasts.style.bottom = `${chestPos}px`;
    }

}

function recShoulders() {
    let slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    let slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    let slideValArm = document.getElementById("slider-arm-size").value;
    let slideValStomach = document.getElementById("slider-stomach-shape").value;
    let slideValNeckWt = document.getElementById("slider-neck-width").value;
    o_ypos = (-314 * slideValStomach); //stomach width
    o_xpos = (-481 * slideValShoulderWt); //stomach width
    ypos = (-1475 * slideValArm) + (-295 * slideValShoulderHt);
    xpos = (-481 * slideValShoulderWt);
    neckBase = -10;

    femaleStomach.style.backgroundPosition = `${xpos}px ${o_ypos}px`;
    document.getElementById("slider-shoulder-height").style.max = "4";
    document.getElementById("slider-shoulder-height").value = slideValShoulderHt;
    nPos = neckBase + (slideValShoulderWt * .5);


    if (slideValStomach == 0) {
        n = -4329;
        x = n + xpos;
        femaleShoulders.style.backgroundPosition = `${x}px ${ypos}px`;
        document.getElementById("slider-shoulder-height").style.max = "2";

        if (slideValShoulderHt >= 3) {
            y = (-1475 * slideValArm) + (-295 * 2);
            document.getElementById("slider-shoulder-height").value = "2";
            femaleShoulders.style.backgroundPosition = `${x}px ${y}px`;
            recHead(false);
        } else {
            y = (-1475 * slideValArm) + (-295 * slideValShoulderHt);
            document.getElementById("slider-shoulder-height").value = slideValShoulderHt;
            femaleShoulders.style.backgroundPosition = `${x}px ${y}px`;

            if(slideValShoulderHt == 1){
                neckBase = -8;
                femaleNeck.style.bottom = `${nPos}px`;
            }
        }
    } else {
        n = 0;
        x = n + xpos;
        femaleShoulders.style.backgroundPosition = `${x}px ${ypos}px`;
    }

    if (slideValShoulderHt == 0) {
        femaleNeck.style.bottom = `${nPos}px`;
        femaleNeck.style.backgroundPosition = `${k_xpos}px 0px`;

    } else if (slideValShoulderHt == 1 || slideValShoulderHt == 2) {
        femaleNeck.style.bottom = `${nPos}px`;
        femaleNeck.style.backgroundPosition = `${k_xpos}px -161px`; 
        if (slideValShoulderHt == 2) {
            if (slideValStomach == 0 && slideValArm == 4) {
                nPos = (neckBase - 4) + slideValShoulderWt * .5;
                femaleNeck.style.bottom = `${nPos}px`;
            } else {
                femaleNeck.style.bottom = `${nPos}px`;
            }            
        }

    } else if (slideValShoulderHt == 3 || slideValShoulderHt == 4) {
        femaleNeck.style.bottom = `${nPos}px`;
        femaleNeck.style.backgroundPosition = `${k_xpos}px -322px`;
        
    } else { defaultModel(); }

    if (slideValShoulderHt == 2 && slideValNeckWt >= 2 || slideValShoulderHt == 4 && slideValNeckWt >= 2) {
       femaleNeck.style.bottom = `${neckBase + -2}px`;
    }
}

function recLegs() {
    let slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    let slideValStomach = document.getElementById("slider-stomach-shape").value;
    let slideValLegs = document.getElementById("slider-leg-size").value;
    let slideValHips = document.getElementById("slider-hip-size").value;
    xpos = (-481 * slideValShoulderWt);
    z_xpos = (-481 * slideValLegs) + (-2405 * slideValHips);
    document.getElementById("slider-hip-size").style.max = "2";
    document.getElementById("slider-hip-size").value = slideValHips;

    if (slideValStomach == 0) { //rectangle
        z = -4644; //rectangle legs pos y
        z_ypos = z + (-516 * slideValShoulderWt);
        document.getElementById("slider-hip-size").style.max = "1";

        if (slideValHips == 2) {
            x = -2405 + (-481 * slideValLegs);
            document.getElementById("slider-hip-size").value = "1";
            femaleLegs.style.backgroundPosition = `${x}px ${z_ypos}px`;
        } else {
            document.getElementById("slider-hip-size").value = slideValHips;
            femaleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        }
    } else if (slideValStomach >= 1 && slideValStomach <= 3) { //all others
        z = 0;
        z_ypos = z + (-516 * slideValShoulderWt);
        femaleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;

    } else if (slideValStomach == 4) { //spoon
        z = -9288;
        z_ypos = z + (-516 * slideValShoulderWt);
        femaleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;

    } else { defaultModel(); }

}

//Modeler Functions
//head shape
function mhead_shape() {
    recHead();
    recShoulders();
    recBreasts();
    attrChecker();
}

function mhead_size() {
    recHead();
    recShoulders();
    recBreasts();
    attrChecker();
}

function mneck_height() {
    recHead();
    recShoulders();
    recBreasts();
    attrChecker();
}

function mneck_shape() {
    recHead();
    recShoulders();
    recBreasts();
    attrChecker();
}

function mneck_width() {
    recHead();
    recShoulders();
    recBreasts();
    attrChecker();
}

function mbreast_shape() {
    recHead();
    recShoulders();
    recBreasts();
    recLegs();
    attrChecker();
}

function mshoulders_height() {
    recHead();
    recShoulders();
    recBreasts();
    recLegs();
    attrChecker();
}

function mshoulders_width() {
    recHead();
    recShoulders();
    recBreasts();
    recLegs();
    attrChecker();
}

function marms() {
    recHead();
    recShoulders();
    recBreasts();
    recLegs();
    attrChecker();
}

function mstomach_shape() {
    recHead();
    recShoulders();
    recBreasts();
    recLegs();
    attrChecker();
}

function mlegs() {
    recHead();
    recShoulders();
    recBreasts();
    recLegs();
    attrChecker();
}

function mhips() {
    recShoulders();
    recBreasts();
    recLegs();
    attrChecker();
}




function classify() {

    stomach = document.getElementById("label-stomach-shape").value;
    bust = document.getElementById("slider-breasts-shape").value;
    shoulders = document.getElementById("slider-shoulder-height").value;
    legs = document.getElementById("slider-leg-size").value;
    hips = document.getElementById("slider-hip-size").value;

    if (stomach == "Muffintop" || "Spoon" || "Rectangle") {
        if (bust >= 5) {
            document.getElementById("classification").setAttribute("value", stomach);
            document.getElementById("variant").setAttribute("value", "Voluptuous");
        } else {
            document.getElementById("classification").setAttribute("value", stomach);
            document.getElementById("variant").setAttribute("value", "Classic");
        }
    } else if (stomach == "Average") {
        if (legs == 0) {
            if (bust >= 3) {
                document.getElementById("classification").setAttribute("value", "diamond");
            } else {
                if (shoulders <= 1) { //strong shoulders
                    document.getElementById("classification").setAttribute("value", "diamond");
                } else {
                    document.getElementById("classification").setAttribute("value", "curvy-average");
                }
            }
        } else if (legs >= 1 && legs <= 2) {
            if (bust >= 5) {
                document.getElementById("classification").setAttribute("value", "curvy-hourglass");
            } else {
                document.getElementById("classification").setAttribute("value", "curvy-average");
            }
        } else {
            if (bust <= 2) {
                if (shoulders <= 1) {
                    document.getElementById("classification").setAttribute("value", "applepear");
                } else {
                    document.getElementById("classification").setAttribute("value", "curvy-pear");
                }
            } else {
                document.getElementById("classification").setAttribute("value", "curvy-hourglass");
            }
        }
    } else {
        //stomach is muffintop
        if (bust >= 5) {
            document.getElementById("classification").setAttribute("value", stomach);
            document.getElementById("variant").setAttribute("value", "Voluptuous");
        } else {
            document.getElementById("classification").setAttribute("value", stomach);
            document.getElementById("variant").setAttribute("value", "Classic");
        }
    }


    bodyPosVal('female', 'above');

} //end function