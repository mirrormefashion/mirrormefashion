/**
 * The function will process body modeler background image position.
 * after processing it will return background images pisition of the body modeler
 * @param {*} sex 
 * @param {*} weight 
 * @returns 
 */



function process(sex, weight) {

    // let weight = document.getElementById('weight-class').value;
    // let sex = $('#sex').val();
    let headBgPos = document.getElementById(`${sex}-${weight}-head`).getAttribute('style');
    let neckBgPos = document.getElementById(`${sex}-${weight}-neck`).getAttribute('style');
    let breastsBgPos = null;
    if (sex == 'female') {
        breastsBgPos = document.getElementById(`${sex}-${weight}-breasts`).getAttribute('style');
    }
    var shouldersBgPos = document.getElementById(`${sex}-${weight}-shoulders`).getAttribute('style');
    let stomachBgPos = document.getElementById(`${sex}-${weight}-stomach`).getAttribute('style');
    let legsBgPos = document.getElementById(`${sex}-${weight}-legs`).getAttribute('style');

    const bodyPos = {
        headBgPos,
        breastsBgPos,
        neckBgPos,
        shouldersBgPos,
        stomachBgPos,
        legsBgPos
    };

    return bodyPos;


}
/**
 * The function will generate body positon 
 * after generating  it will return background images position of the body modeler
 * @param {*} sex 
 * @param {*} weight 
 * @returns 
 */

function bodyPosVal(sex, weight, el = 'bodyPosition') {


    let bodyPos = document.getElementById(el);
    let bodyPosVal = `
            <input type="hidden" name="head_bg_pos" value="${process(sex,weight).headBgPos}">
            <input type="hidden" name="breasts_bg_pos" value ="${process(sex,weight).breastsBgPos}">
            <input type="hidden" name="neck_bg_pos" value ="${process(sex,weight).neckBgPos}">
            <input type="hidden" name="shoulders_bg_pos" value ="${process(sex,weight).shouldersBgPos}">
            <input type="hidden" name="stomach_bg_pos" value ="${process(sex,weight).stomachBgPos}">
            <input type="hidden" name="legs_bg_pos" value ="${process(sex,weight).legsBgPos}">
            <input type="hidden" name="weight_class" value ="${weight}">
            `
    bodyPos.innerHTML = bodyPosVal;
}

/**
 * This function will generate background image url from element 
 * @param {*} el 
 * @returns 
 */
function getBgUrl(el) {
    let bg = "";
    if (el.currentStyle) { // IE
        bg = el.currentStyle.backgroundImage;
    } else if (document.defaultView && document.defaultView.getComputedStyle) { // Firefox
        bg = document.defaultView.getComputedStyle(el, "").backgroundImage;
    } else { // try and get inline style
        bg = el.style.backgroundImage;
    }
    return bg.replace(/url\(['"]?(.*?)['"]?\)/i, "$1");
}


/**
 * This function will check all images are loaded or not.
 * if all images are loaded it will show the body
 * if all images are loaded it will reload the page in spacific time
 * @param {*} models 
 * @param {*} sex 
 */


function modelerLoader(models, sex = 'female', time = 50000) {

    sex.toLowerCase()
    len = models.length,
        counter = 0;
    var isLoad = 0;
    if (models != null) {
        for (let model of models) {
            var image = document.createElement('img');
            image.src = getBgUrl(model);
            image.onload = function(e) {
                incrementCounter();
            };
        }
    }    

    function incrementCounter() {

        counter++;
        if (counter === len) {
            isLoad = 1;
            setTimeout(function() {
                $("#question8").show();
                $('#summit').css('display', 'flex');
                $(".chat-body").animate({
                    scrollTop: $('.col-md-9').prop("scrollHeight")
                }, 1000);
            }, 10000);

            setTimeout(function() {
                var hash = document.getElementById("summit");
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 2000, function() {
                    window.location.hash = hash;
                });
            }, 15000);

        } else if (counter === len - 1 && sex == 'male') {
            isLoad = 1;
            setTimeout(function() {
                $("#question8").show();
                $('#summit').css('display', 'flex');
                $(".chat-body").animate({
                    scrollTop: $('.col-md-9').prop("scrollHeight")
                }, 1000);
            }, 20000);

            setTimeout(function() {
                var hash = document.getElementById("summit");
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 2000, function() {
                    window.location.hash = hash;
                });
            }, 25000);

        }
    }

}

/**
 * 
 * @param {*} sliders 
 */

function sliderTrickgenerator(sliders) {
    if (sliders != null) {
        for (let slider of sliders) {

            setTicks(slider);
        }
    }


    function setTicks(slider) {
        let container = document.getElementById(slider.dataset.tickId);

        const spacing = parseFloat(slider.dataset.tickStep);
        const sliderRange = slider.max - slider.min;
        const tickCount = sliderRange / spacing + 1; // +1 to account for 0

        for (let ii = 0; ii < tickCount; ii++) {
            let tick = document.createElement("span");

            tick.className = "tick-slider-tick";

            container.appendChild(tick);
        }
    }
}

// - Remove whitespace from the string of all inputs. 
function TrimText(el) {
    el.value = el.value.
    replace(/(^\s*)|(\s*$)/gi, ""). // removes leading and trailing spaces
    replace(/[ ]{2,}/gi, " "). // replaces multiple spaces with one space
    replace(/\n +/, "\n"); // removes spaces after newlines
    return;
}
document.addEventListener('change', function(ev) {
    if (ev.target.tagName === 'INPUT' || ev.target.tagName === 'TEXTAREA')
        TrimText(ev.target);
});

// This is shoes size checker 
// This function will return true or false
function isValidshoeSize(n) {
    // /^[-+]?(1|10|2|2.5|25)$/
    // 
    var numStr = /^[0-9]+(\.[05])?$/;
    return numStr.test(n.toString());

}

/**
 * This Function will validate full name
 * @returns 
 *  @param {*} el 
 */

function validateFullName(el) {
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    let name = document.querySelector(el).value;

    if (!regName.test(name)) {

        return false;
    } else {

        return true;
    }
}
/**
 * This Function will check Scroll. and playing will stop on scroling
 * @returns 
 */
function playPauseVideo() {
    let videos = document.querySelectorAll("video");
    videos.forEach((video) => {
        // We can only control playback without insteraction if video is mute
        video.muted = true;
        // Play is a promise so we need to check we have it
        let playPromise = video.play();
        if (playPromise !== undefined) {
            playPromise.then((_) => {
                let observer = new IntersectionObserver(
                    (entries) => {
                        entries.forEach((entry) => {
                            if (
                                entry.intersectionRatio !== 1 &&
                                !video.paused
                            ) {
                                video.pause();
                            } else if (video.paused) {
                                video.play();
                            }
                        });
                    }, { threshold: 0.2 }
                );
                observer.observe(video);
            });
        }
    });
}

// And you would kick this off where appropriate with:
playPauseVideo();