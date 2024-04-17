document.getElementById("male-morbid-head").style.backgroundPosition = `0px 0px`;
document.getElementById("male-morbid-neck").style.backgroundPosition = `0px 0px`;
document.getElementById("male-morbid-shoulders").style.backgroundPosition = `0px 0px`;
document.getElementById("male-morbid-stomach").style.backgroundPosition = `0px -580px`;
document.getElementById("male-morbid-legs").style.backgroundPosition = `0px 0px`;


//Reconsile changes to each feature 


let maleHead = document.querySelector("#male-morbid-head");
let maleNeck = document.querySelector("#male-morbid-neck");
let maleShoulders = document.querySelector("#male-morbid-shoulders");
let maleStomach = document.querySelector("#male-morbid-stomach");
let maleLegs = document.querySelector("#male-morbid-legs");
//var slideValHeadShape = document.getElementById("slider-head-shape").value;
//var slideValHeadSize = document.getElementById("slider-head-size").value;

var neckPos = maleNeck.style.bottom = "33px";
var nPos = neckPos.split("px");
nn = nPos[0];
neckPosFinal = maleNeck.style.bottom = `${nn * -1}px`
console.log("neckPos within global scope: " + neckPosFinal);

// Checks that images fully loaded
window.addEventListener("load", event => {
    var image = document.querySelector('img');
    if (image.complete && image.naturalHeight !== 0) {
        console.log("image loaded");
    } else {
        console.log("image NOT loaded");
    }

});

// Create Default Male OW
function defaultModel() {
    if (maleHead != null) {
        maleHead.style.backgroundPosition = `0px 0px`;
    }
    if (maleNeck != null) {
        maleNeck.style.backgroundPosition = `0px 0px`;
    }
    /*if (maleBreasts != null) {
        maleBreasts.style.backgroundPosition = `0px -1856px`;
    } */
    if (maleShoulders != null) {
        maleShoulders.style.backgroundPosition = `0px -10428px`;
    }
    if (maleStomach != null) {
        maleStomach.style.backgroundPosition = `0px -232px`;
    }
    if (maleLegs != null) {
        maleLegs.style.backgroundPosition = `0px 0px`;
    }
}


function recHead() {
    var slideValNeckHt = document.getElementById("slider-neck-height").value;
    var slideValCrotch = document.getElementById("slider-crotch-height").value;
    var slideValTorso = document.getElementById("slider-torso-height").value;
    var position = maleHead.style.backgroundPosition;
    var split = position.split(" ");
    a = split[0];
    b = split[1];
    xpos = parseInt(a);
    ypos = parseInt(b);

    headBase = -98;
    Inc1 = -8; //stomach move 272px to 280px and 290px
    Inc2 = -18;
    neckBase = `${nn * -1}`;
    shouldersBase = 58;
    torsoInc = 10;
    heightInc = 3;

    if (slideValCrotch == 0) {

        x = (headBase - (Inc1 * slideValCrotch)) + ((torsoInc * slideValTorso) + -(heightInc * slideValNeckHt));
        document.getElementById('male-morbid-head').style.bottom = `${x}px`;
        n = (neckBase - (Inc1 * slideValCrotch)) + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-neck').style.bottom = `${n}px`;
        s = (shouldersBase - (Inc1 * slideValCrotch)) + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-shoulders').style.bottom = `${s}px`;
    } else if (slideValCrotch == 1) {

        x = headBase - Inc1 + (-(heightInc * slideValNeckHt) + (torsoInc * slideValTorso));
        document.getElementById('male-morbid-head').style.bottom = `${x}px`;
        n = neckBase - Inc1 + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-neck').style.bottom = `${n}px`;
        s = (shouldersBase - (Inc1 * slideValCrotch)) + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-shoulders').style.bottom = `${s}px`;
    } else if (slideValCrotch == 2) {

        x = headBase - Inc2 + (-(heightInc * slideValNeckHt) + (torsoInc * slideValTorso));
        document.getElementById('male-morbid-head').style.bottom = `${x}px`;
        n = neckBase - Inc2 + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-neck').style.bottom = `${n}px`;
        s = shouldersBase - Inc2 + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-shoulders').style.bottom = `${s}px`;
    } else {

        x = (headBase - (Inc1 * slideValCrotch)) + ((torsoInc * slideValTorso) + -(heightInc * slideValNeckHt));
        document.getElementById('male-morbid-head').style.bottom = `${x}px`;
        n = (neckBase - (Inc1 * slideValCrotch)) + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-neck').style.bottom = `${n}px`;
        s = (shouldersBase - (Inc1 * slideValCrotch)) + (torsoInc * slideValTorso);
        document.getElementById('male-morbid-shoulders').style.bottom = `${s}px`;
    }
}

function recShoulders() {
    recHead();
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;
    var slideValArm = document.getElementById("slider-arm-size").value;
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValHip = document.getElementById("slider-hip-size").value;
    var slideValBreast = document.getElementById("slider-breasts-shape").value;
    //var sh_po = maleShoulders.style.backgroundPosition;
    //var splitsh_po = sh_po.split(" ");
    var stomach_pos = maleStomach.style.backgroundPosition;
    var splitstomach = stomach_pos.split(" ");
    var legs_pos = maleLegs.style.backgroundPosition;
    var splitlegs = legs_pos.split(" ");
    var neck_pos = maleNeck.style.backgroundPosition;
    var splitneck = neck_pos.split(" ");
    i = splitstomach[0];
    k = splitstomach[1];
    o_xpos = parseInt(i);
    o_ypos = parseInt(k);
    l = splitlegs[0];
    z_xpos = parseInt(l);
    //b = splitsh_po[1];
    //ypos = parseInt(b);
    i = splitneck[0];
    k = splitneck[1];
    k_xpos = parseInt(i);
    k_ypos = parseInt(k);

    xpos = (-647 * slideValShoulderWt) + (-5832 * slideValShoulderHt);
    o_xpos = xpos - (-5832 * slideValShoulderHt);
    maleShoulders.style.backgroundPosition = `${xpos}px ${ypos}px`;
    maleStomach.style.backgroundPosition = `${o_xpos}px ${o_ypos}px`;


    //reconsiles all ypos shoulders variants, i.e. breast shape and arm size
    if (slideValStomach == 0) { //rectangle shape
        z = -1170;
        y = (slideValBreast * 15 * -234) + (-234 * slideValArm);
        ypos = z += y;
        o_xpos = 0;
        document.getElementById("slider-leg-size").setAttribute("max", 4);
        document.getElementById("slider-hip-size").setAttribute("max", 0);

    } else if (slideValStomach >= 1 && slideValStomach <= 5) {
        z = 0;
        y = (slideValBreast * 15 * -234) + (-234 * slideValArm);
        ypos = z += y;
        document.getElementById("slider-leg-size").setAttribute("max", 4);
        document.getElementById("slider-hip-size").setAttribute("max", 1);
        //maleShoulders.style.backgroundPosition = `${xpos}px ${ypos}px`; 
        if (slideValStomach == 1) {
            o_xpos = -290; //layered
        } else if (slideValStomach == 2) {
            o_xpos = -580; //average
        } else if (slideValStomach == 3) {
            o_xpos = -870; //round
        } else if (slideValStomach == 4) {
            o_xpos = -1160; //muffintop 
        } else if (slideValStomach == 5) {
            o_xpos = -1450; //spoon      
            document.getElementById("slider-leg-size").setAttribute("max", 4);
            document.getElementById("slider-hip-size").setAttribute("max", 2);
        } else { defaultModel(); }

    } else if (slideValStomach == 6) { //muscular shape
        z = -2340;
        ypos = z += (-234 * slideValArm);
        o_xpos = z;
    } else { defaultModel(); }

    //moves neck position based on shoulder height
    if (slideValShoulderHt == 0) {
        maleNeck.style.backgroundPosition = `${k_xpos}px 0px`;

    } else if (slideValShoulderHt == 1) {
        maleNeck.style.backgroundPosition = `${k_xpos}px -140px`;

    } else if (slideValShoulderHt == 2) {
        maleNeck.style.backgroundPosition = `${k_xpos}px -280px`;

    } else { defaultModel(); }
}


//head shape
function mhead_shape(val, controller = true) {
    if (maleHead != null) {
        var position = maleHead.style.backgroundPosition;
        var split = position.split(" ");
        a = split[0];
        b = split[1];
        xpos = parseInt(a);
        ypos = parseInt(b);

        if (val == 0) {
            maleHead.style.backgroundPosition = `${xpos}px 0px`;
            value = "Oval Shape";
        } else if (val == 1) {
            maleHead.style.backgroundPosition = `${xpos}px -129px`;
            value = "Oblong Shape";

        } else if (val == 2) {
            maleHead.style.backgroundPosition = `${xpos}px -258px`;
            value = "Round Shape";

        } else if (val == 3) {
            maleHead.style.backgroundPosition = `${xpos}px -387px`;
            value = "Coned Shape";
        } else {
            defaultModel();
        }
        if (controller) {
            document.getElementById("label-head-shape").setAttribute("value", value);
        }
    }

}

function mhead_size(val, controller = true) {
    if (maleHead != null) {
        var position = maleHead.style.backgroundPosition;
        var split = position.split(" ");
        a = split[0];
        b = split[1];
        xpos = parseInt(a);
        ypos = parseInt(b);

        if (val == 0) {
            maleHead.style.backgroundPosition = `0px ${ypos}px`;
            value = "51cm";

        } else if (val == 1) {
            maleHead.style.backgroundPosition = `-647px ${ypos}px`;
            value = "53.5cm";

        } else if (val == 2) {
            maleHead.style.backgroundPosition = `-1294px ${ypos}px`;
            value = "61cm";

        } else if (val == 3) {
            maleHead.style.backgroundPosition = `-1941px ${ypos}px`;
            value = "63.5cm";

        } else if (val == 4) {
            maleHead.style.backgroundPosition = `-2588px ${ypos}px`;
            value = "66cm";

        } else {
            defaultModel();
        }
        if (controller) {
            document.getElementById("label-head-size").setAttribute("value", value);
        }
    }

}

function mneck_height(val, controller = true) {

    recHead();

    if (val == 0) {
        value = "Tall";
    } else if (val == 1) {
        value = "Tall";
    } else if (val == 2) {
        value = "Tall";
    } else if (val == 3) {
        value = "Average";
    } else if (val == 4) {
        value = "Average";
    } else if (val == 5) {
        value = "Short";
    } else if (val == 6) {
        value = "Short";
    } else if (val == 7) {
        value = "Hidden";
    } else { defaultModel(); }

    if (controller) {
        document.getElementById("label-neck-height").setAttribute("value", value);
    }

}

function mneck_shape(val, controller = true) {

    var slideValNeckWt = document.getElementById("slider-neck-width").value;
    var $target = $("#male-morbid-neck");
    var gridWidth = $target.width();
    var k = (-gridWidth * val) * 5;
    var position = maleNeck.style.backgroundPosition;
    var split = position.split(" ");
    b = split[1];
    k_ypos = parseInt(b);
    k_xpos = k += (slideValNeckWt * -647);


    maleNeck.style.backgroundPosition = `${k_xpos}px ${k_ypos}px`;
    //document.getElementById("male-morbid-neck-rear").style.backgroundPosition = `${xpos}px ${ypos}px`; 

    if (val == 0) {
        value = "Average";
    } else if (val == 1) {
        value = "Trapezoidal";
    } else { defaultModel(); }
    if (controller) {
        document.getElementById("label-neck-shape").setAttribute("value", value);
    }
}

function mneck_width(val, controller = true) {
    var slideValNeckShape = document.getElementById("slider-neck-shape").value;
    var position = maleNeck.style.backgroundPosition;
    var split = position.split(" ");
    b = split[1];
    k_ypos = parseInt(b);

    k_xpos = (val * -647) + (slideValNeckShape * -3235);
    maleNeck.style.backgroundPosition = `${k_xpos}px ${k_ypos}px`;

    if (val == 0) {
        value = "thin";
        measurement = "11.5cm";
    } else if (val == 1) {
        value = "average";
        measurement = "13cm";
    } else if (val == 2) {
        value = "average";
        measurement = "14.5cm";
    } else if (val == 3) {
        value = "girthy";
        measurement = "16cm";
    } else if (val == 4) {
        value = "girthy";
        measurement = "17.5cm";
    } else {
        defaultModel();
    }

    if (controller) {
        document.getElementById("label-neck-width").setAttribute("value", value);
    }
}

function mbreast_shape(val, controller = true) {
    /*
    var $target = $("#male-morbid-shoulders");
    var gridHeight = $target.height();
    */
    var slideValArm = document.getElementById("slider-arm-size").value;
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var position = maleShoulders.style.backgroundPosition;
    var split = position.split(" ");
    a = split[0];
    xpos = parseInt(a);
    ypos = (val * -3510) + (slideValArm * -234);


    if (slideValStomach == 0) {
        z = -1170;
        y = z + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
    } else if (slideValStomach >= 1 && slideValStomach <= 5) {
        z = 0;
        y = z + ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
    } else { defaultModel(); }


    if (val == 0) {
        value = "Average";
    } else {
        value = "Drooped";
    }

    if (controller) {
        document.getElementById("label-breast-shape").setAttribute("value", value);
    }


}

function mshoulders_height(val, controller = true) {
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var sh_po = maleShoulders.style.backgroundPosition;
    var neck_pos = maleNeck.style.backgroundPosition;
    var stomach_pos = maleStomach.style.backgroundPosition;

    var splitneck = neck_pos.split(" ");
    i = splitneck[0];
    k = splitneck[1];
    k_xpos = parseInt(i);
    k_ypos = parseInt(k);
    var splitstomach = stomach_pos.split(" ");
    p = splitstomach[1];
    o_ypos = parseInt(p);
    var splitsh_po = sh_po.split(" ");
    h = splitsh_po[1];
    ypos = parseInt(h);
    xpos = (-647 * slideValShoulderWt) + (-5832 * val);

    maleShoulders.style.backgroundPosition = `${xpos}px ${ypos}px`;

    if (val == 0) {
        maleStomach.style.backgroundPosition = `${xpos}px ${o_ypos}px`;
        maleNeck.style.backgroundPosition = `${k_xpos}px 0px`;
        maleNeck.style.bottom = "-33px";
        value = "Strong";

    } else if (val == 1) {
        xpos = xpos - -5832;
        maleStomach.style.backgroundPosition = `${xpos}px ${o_ypos}px`;
        maleNeck.style.backgroundPosition = `${k_xpos}px -140px`;
        maleNeck.style.bottom = "-32px";
        value = "Average";

    } else if (val == 2) {
        xpos = xpos - -11664;
        maleStomach.style.backgroundPosition = `${xpos}px ${o_ypos}px`;
        maleNeck.style.backgroundPosition = `${k_xpos}px -280px`;
        maleNeck.style.bottom = "-34px";
        value = "Dropped";

    } else { defaultModel(); }

    if (controller) {
        document.getElementById("label-shoulder-height").setAttribute("value", value);
    }
    recHead();
}

function mshoulders_width(val, controller = true) {
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValArm = document.getElementById("slider-arm-size").value;
    var slideValHip = document.getElementById("slider-hip-size").value;
    var slideValBreast = document.getElementById("slider-breasts-shape").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;

    var stomach_pos = maleStomach.style.backgroundPosition;
    var splitstomach = stomach_pos.split(" ");
    var legs_pos = maleLegs.style.backgroundPosition;
    var splitlegs = legs_pos.split(" ");
    i = splitstomach[0];
    k = splitstomach[1];
    o_xpos = parseInt(i);
    o_ypos = parseInt(k);
    l = splitlegs[0];
    z_xpos = parseInt(l);

    ypos = (slideValBreast * -3510) + (slideValArm * -234);
    xpos = (-647 * val) + (-5832 * slideValShoulderHt);
    o_xpos = xpos - (-5832 * slideValShoulderHt);

    maleStomach.style.backgroundPosition = `${o_xpos}px ${o_ypos}px`;


    if (slideValStomach == 0) {
        x = -1170;
        y = x + ypos;
        z = -936;
        z_ypos = z += (-468 * val);
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;

    } else if (slideValStomach == 5) {
        x = 0;
        y = x + ypos;
        z = -5148;
        z_ypos = z += ((-468 * val) + (-4212 * slideValHip));
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;

    } else {
        x = 0;
        y = x + ypos;
        z = 0;
        z_ypos = z += (-468 * slideValHip);
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
    }

    newNeckPos = maleNeck.style.bottom;
    var splitNeck = newNeckPos.split("px");
    newPos = splitNeck[0];


    if (val == 0) {
        maleNeck.style.bottom = `${newPos}px`;
        value = "Narrow";

    } else if (val == 1) {
        maleNeck.style.bottom = `${newPos}px`;
        value = "Narrow";

    } else if (val == 2) {
        maleNeck.style.bottom = `${newPos}px`;
        value = "Average";

    } else if (val == 3) {
        maleNeck.style.bottom = `${newPos}px`;
        value = "Average";

    } else if (val == 4) {
        maleNeck.style.bottom = `${newPos}px`;
        value = "Average";

    } else if (val == 5) { //n is concatenating the 1 to newPos when it should be performing addition
        //n = newPos += 1;
        // maleNeck.style.bottom = `${n}px`;
        value = "Average";
        console.log("x: " + n);
    } else if (val == 6) {
        //n = newPos += 1;
        // maleNeck.style.bottom = `${n}px`;
        value = "Average";
        console.log("x: " + n);
    } else if (val == 7) {
        //n = newPos += 1;
        // maleNeck.style.bottom = `${n}px`;
        value = "Broad";
        console.log("x: " + n);
    } else if (val == 8) {
        //n = newPos += 1;
        // maleNeck.style.bottom = `${n}px`;
        value = "Broad";
        console.log("x: " + n);
    } else { value = "Error" }

    if (controller) {
        var labelit = `<label>Shoulders Width:</label><input type="text" class="feature-val" value="${value}">`;
        document.getElementById("male-shoulders-width").innerHTML = labelit;
    }

}

function marms(val, controller = true) {
    var slideValBreast = document.getElementById("slider-breasts-shape").value;
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValArm = document.getElementById("slider-arm-size").value
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var slideValShoulderHt = document.getElementById("slider-shoulder-height").value;

    x = -1170;
    y = x + ypos;
    ypos = (slideValBreast * -3510) + (slideValArm * -234);
    xpos = (-647 * slideValShoulderWt) + (-5832 * slideValShoulderHt);

    if (slideValStomach == 0) {
        z = -1170;
        y = z += ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach >= 1 && slideValStomach <= 5) {
        z = 0;
        y = z += ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else if (slideValStomach == 6) {
        z = -2340;
        y = z += ypos;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;

    } else { defaultModel(); }

    if (val == 0) {
        value = "Arm 1";
    } else if (val == 1) {
        val = "Arm 2";
    } else if (val == 2) {
        value = "Arm 3";
    } else if (val == 3) {
        value = "Arm 4";
    } else if (val == 4) {
        value = "Arm 5";
    } else { defaultModel(); }

    if (controller) {
        document.getElementById("label-arm-size").setAttribute("value", value);
    }


}

function torso_height(val, controller = true) {

    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var position = maleStomach.style.backgroundPosition;
    var split = position.split(" ");
    b = split[1];
    ypos = parseInt(b);
    xpos = (val * -5823) + (slideValShoulderWt * -647);
    maleStomach.style.backgroundPosition = `${xpos}px ${ypos}px`;

    if (val == 0) {
        maleShoulders.style.bottom = "58px";
        maleNeck.style.bottom = "-33px"; //may need to parse value of style.bottom and then add +10 to account for different neck pos'
        value = "Average";

    } else if (val == 1) {
        maleShoulders.style.bottom = "68px";
        maleNeck.style.bottom = "-23px";
        value = "Distended";

    } else { defaultModel(); }

    if (controller) {
        document.getElementById("label-arm-size").setAttribute("value", value);
    }
    recHead();
}

function mstomach_shape(val, controller = true) {
    var slideValBreast = document.getElementById("slider-breasts-shape").value;
    var slideValLeg = document.getElementById("slider-leg-size").value;
    var slideValArm = document.getElementById("slider-arm-size").value;
    var slideValHip = document.getElementById("slider-hip-size").value;
    var slideValShoulderWt = document.getElementById("slider-shoulder-width").value;
    var position = maleStomach.style.backgroundPosition;
    var split = position.split(" ");
    var sh_po = maleShoulders.style.backgroundPosition;
    var splitsh_po = sh_po.split(" ");
    var legs_pos = maleLegs.style.backgroundPosition;
    var splitlegs = legs_pos.split(" ");

    a = split[0];
    o_xpos = parseInt(a);
    h = splitsh_po[0];
    g = splitsh_po[1];
    l = splitlegs[0];
    z_xpos = parseInt(l);
    xpos = parseInt(h);

    document.getElementById("slider-leg-size").setAttribute("max", 4);
    document.getElementById("slider-hip-size").setAttribute("max", 1);

    if (val == 0) {
        ypos = -1170;
        x = -936;
        z_ypos = x += (-468 * slideValShoulderWt);
        y = (slideValArm * -234) + (slideValBreast * -3510) + ypos;
        maleStomach.style.backgroundPosition = `${o_xpos}px 0px`;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-leg-size").setAttribute("max", 4);
        document.getElementById("slider-hip-size").setAttribute("max", 0);
        value = "Rectangle";

        if (slideValLeg == 4) {
            document.getElementById("slider-leg-size").value = "3";
            maleLegs.style.backgroundPosition = `${(-647 * 3)}px ${z_ypos}px`;
        } else {
            maleLegs.style.backgroundPosition = `${(-647 * slideValLeg)}px ${z_ypos}px`;
        }
    } else if (val == 1) {
        ypos = 0;
        y = (slideValArm * -234) + (slideValBreast * -3510) + ypos;
        x = 0;
        z_ypos = x += (-468 * slideValHip);
        maleStomach.style.backgroundPosition = `${o_xpos}px -290px`;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        value = "Layered";

    } else if (val == 2) {
        ypos = 0;
        y = (slideValArm * -234) + (slideValBreast * -3510) + ypos;
        x = 0;
        z_ypos = x += (-468 * slideValHip);
        maleStomach.style.backgroundPosition = `${o_xpos}px -580px`;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        value = "Average";

    } else if (val == 3) {
        ypos = 0;
        y = (slideValArm * -234) + (slideValBreast * -3510) + ypos;
        x = 0;
        z_ypos = x += (-468 * slideValHip);
        maleStomach.style.backgroundPosition = `${o_xpos}px -870px`;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        value = "Round";

    } else if (val == 4) {
        ypos = 0;
        y = (slideValArm * -234) + (slideValBreast * -3510) + ypos;
        x = 0;
        z_ypos = x += (-468 * slideValHip);
        maleStomach.style.backgroundPosition = `${o_xpos}px -1160px`;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        value = "Muffintop";

    } else if (val == 5) {
        ypos = 0;
        y = (slideValArm * -234) + (slideValBreast * -3510) + ypos;
        x = -5148;
        z_ypos = (x * slideValHip) + (-468 * slideValShoulderWt);
        maleStomach.style.backgroundPosition = `${o_xpos}px -1450px`;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-leg-size").setAttribute("max", 4);
        document.getElementById("slider-hip-size").setAttribute("max", 2);
        value = "Spoon";
    } else if (val == 6) {
        ypos = -2340;
        y = (slideValArm * -234) + ypos;
        x = 0;
        z_ypos = x += (-468 * slideValHip);
        maleStomach.style.backgroundPosition = `${o_xpos}px -1740px`;
        maleShoulders.style.backgroundPosition = `${xpos}px ${y}px`;
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        value = "Muscular";

    } else {
        defaultModel();
    }

    if (controller) {
        document.getElementById("label-stomach-shape").setAttribute("value", value);
    }

}

function mlegs(val, controller = true) {
    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValLeg = document.getElementById("slider-leg-size").value;
    var slideValCrotch = document.getElementById("slider-crotch-height").value;
    var slideValHip = document.getElementById("slider-hip-size").value;
    var legs_pos = maleLegs.style.backgroundPosition;
    var splitlegs = legs_pos.split(" ");
    n = splitlegs[1];
    z_ypos = parseInt(n);

    z_xpos = (-647 * val) + (-3235 * slideValCrotch);
    maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;

    if (slideValStomach == 0) {
        y = -936;
        z_ypos = y + (-468 * slideValStomach);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;

        document.getElementById("slider-leg-size").setAttribute("max", 3);
        document.getElementById("slider-hip-size").setAttribute("max", 0);
        if (slideValLeg == 4) {
            document.getElementById("slider-leg-size").value = "3";
            maleLegs.style.backgroundPosition = `${(-647 * 3)}px ${z_ypos}px`;
        } else {
            document.getElementById("slider-leg-size").value = val;
        }
    } else if (slideValStomach >= 1 && slideValStomach <= 4 || slideValStomach == 6) {
        y = 0;
        z_ypos = y += (-468 * slideValHip);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-leg-size").setAttribute("max", 4);
        document.getElementById("slider-hip-size").setAttribute("max", 1);

    } else if (slideValStomach == 5) { //spoon shape

        y = -5148 + (-468 * slideValStomach);
        z_ypos = y += (-4212 * slideValHip);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-leg-size").setAttribute("max", 4);
        document.getElementById("slider-hip-size").setAttribute("max", 2);
    } else {
        defaultModel();
    }

    if (slideValStomach == 0) {
        if (val == 0) {
            value = "Leg 1";
            size = "60cm";
        } else if (val == 1) {
            value = "Leg 2";
            size = "60cm";
        } else if (val == 2) {
            value = "Leg 3";
            size = "60cm";
        } else if (val == 3) {
            value = "Leg 4";
            size = "60cm";
        } else if (val == 4) {
            value = "Leg 4";
            size = "60cm";
        } else {
            defaultModel();
        }
    } else {
        if (val == 0) {
            value = "Leg 1";
            size = "60cm";
        } else if (val == 1) {
            value = "Leg 2";
            size = "60cm";
        } else if (val == 2) {
            value = "Leg 3";
            size = "60cm";
        } else if (val == 3) {
            value = "Leg 4";
            size = "60cm";
        } else if (val == 4) {
            value = "Leg 5";
            size = "60cm";
        } else {
            defaultModel();
        }
    }

    if (controller) {
        document.getElementById("label-leg-size").setAttribute("value", value);
    }
}




//crotch
function mcrotch(val, controller = true) {
    var slideValLeg = document.getElementById("slider-leg-size").value;
    var legs_pos = maleLegs.style.backgroundPosition;
    var splitlegs = legs_pos.split(" ");
    m = splitlegs[1];
    z_ypos = parseInt(m);
    z_xpos = (-647 * slideValLeg) + (-3235 * val);
    maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;

    if (val == 0) {
        value = "Tall Height";

        maleStomach.style.bottom = "267px";

    } else if (val == 1) {
        value = "Average Height";

        maleStomach.style.bottom = "280px";

    } else if (val == 2) {
        value = "Short Height";

        maleStomach.style.bottom = "290px";

    } else { defaultModel(); }

    if (controller) {
        document.getElementById("label-crotch-height").setAttribute("value", value);
    }
    recHead();
}

//hips
function mhips(val, controller = true) {

    var slideValStomach = document.getElementById("slider-stomach-shape").value;
    var slideValCrotch = document.getElementById("slider-crotch-height").value;
    var slideValLeg = document.getElementById("slider-leg-size").value;
    var slideValHip = document.getElementById("slider-hip-size").value;
    var legs_pos = maleLegs.style.backgroundPosition;
    var splitlegs = legs_pos.split(" ");
    m = splitlegs[0];
    z_xpos = parseInt(m);

    if (slideValStomach == 0) {
        y = -936;
        z_ypos = y + (-468 * slideValStomach);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-leg-size").style.max = "3";
        document.getElementById("slider-hip-size").style.max = "0";
        value = "No hips";
        if (val == 4) {
            document.getElementById("slider-leg-size").value = "3";

            maleLegs.style.backgroundPosition = `${(-647 * 3)}px ${z_ypos}px`;
        } else {
            document.getElementById("slider-leg-size").value = slideValLeg;
            maleLegs.style.backgroundPosition = `${(-647 * slideValLeg)}px ${z_ypos}px`;
        }

    } else if (slideValStomach == 5) { //spoon shape
        y = -5148 + (-468 * slideValStomach);
        z_ypos = y += (-4212 * slideValHip);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-leg-size").style.max = "4";
        document.getElementById("slider-hip-size").style.max = "2";
        if (val == 0) {
            value = "No hips";
        } else {
            value = "Some hips";
        }
    } else {
        y = 0;
        z_ypos = y += (-468 * slideValHip);
        maleLegs.style.backgroundPosition = `${z_xpos}px ${z_ypos}px`;
        document.getElementById("slider-leg-size").style.max = "4";
        document.getElementById("slider-hip-size").style.max = "1";
        if (val == 0) {
            value = "No hips";
        } else if (val == 1) {
            value = "Small hips";
        } else if (val == 2) {
            value = "Wide hips";
        } else { defaultModel(); }
    }



    if (controller) {
        document.getElementById("label-hips-size").setAttribute("value", value);
    }
}


/*---------------------- Process Data ----------------------*/


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
    bodyPosVal('male', 'morbid');
} //end function