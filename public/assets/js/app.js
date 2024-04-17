/**
 * Chat Bot Script
 * This script handles user interactions and collects information for a chat bot.
 */

// DOM elements

const chatBody = document.getElementById('chatBody');
const userInput = document.getElementById('userInput');
const sendBtn = document.getElementById('sendBtn');


// if (chatBody == null) {
//     alert(`'Please add this html code to show your chat bot!',<div class="chat_box">
//     <div class="chat_box_main">
//         <div class="chat_box_header">
//             <div class="sophia_pic">
//                 <img src="images/sophia.png" alt="">
//             </div>

//         </div>
//         <div id="chatBody" class="chat_body" style="color: #990000;">
//             <div class="talk_bubble">
//                 Hi there guest visitor! I’m Sophia, your Virtual Fashion Stylist! Are you female, male or non-binary?
//             </div>
//         </div>
//     </div>
//     <div class="chat_box_footer">
//         <input type="text" id="userInput" placeholder="Enter your response here">
//         <button id="sendBtn">Send</button>
//     </div>
// </div>`);
// }
// Event listeners
if (sendBtn != null) {
    sendBtn.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
}

// User responses object to store user input data
var userResponses = {};





// Current state variables
var currentQuestion = 1;
var userSex;
var currentHeight;

/**
 * Function to store a new user response
 * @param {string} userResponse - The user's response.
 */
function storeUserResponse(key, value) {
    // Store the user response in the userResponses object
    userResponses[key] = value;
}

/**
 * Send a message based on user input.
 */
function sendMessage() {
    const userMessage = userInput.value.trim();

    if (!userMessage && currentQuestion !== 3) {
        alert('This field should not be empty!');
        return;
    }

    if (currentQuestion === 3) {
        const selectedAge = getAge();
        if (!selectedAge) {
            alert('Please select your age!');
            return;
        }
        appendMessage('user', `${selectedAge} years of age`);
        userInput.value = '';
    } else {
        appendMessage('user', userMessage);
    }

    userInput.value = '';

    const botResponse = getBotResponse(userMessage);
    setTimeout(() => {
        appendMessage('bot', botResponse);
    }, 500);
}



/**
 * Process user input and determine the bot's response.
 * @param {string} userMessage - The user's message.
 * @returns {string|Array} - The bot's response.
 */
function getBotResponse(userMessage) {
    switch (currentQuestion) {
        case 1:
            return processGenderInput(userMessage);
        case 2:
            return processNameInput(userMessage);
        case 3:
            return processAgeInput();
        case 4:
            return processHeightInput(userMessage);
        case 5:
            return processWeightInput(userMessage);
        case 6:
            return processShoeSizeInput(userMessage);
        case 7:
            return processBraSizeInput(userMessage);

            // Add cases for other questions...
        default:
            return 'I do not recognize your input.';
    }
}
/**
 * Append a message to the chat.
 * @param {string} sender - The sender of the message (user or bot).
 * @param {string|Array} messages - The message or an array of messages to append.
 */
function appendMessage(sender, messages) {
    if (!Array.isArray(messages)) {
        messages = [messages];
    }

    messages.forEach((message) => {
        const messageClass = sender === 'user' ? 'user_reply' : 'talk_bubble';
        const messageElement = document.createElement('div');
        messageElement.className = messageClass;
        messageElement.innerHTML = message;
        chatBody.appendChild(messageElement);
    });

    setTimeout(() => {
        scrollToBottom(chatBody, 1000);
    }, 1500);
}


/**
 * Process gender input and move to the next question.
 * @param {string} userMessage - The user's gender input.
 * @returns {string} - The bot's response.
 */
function processGenderInput(userMessage) {
    const validGenders = ['male', 'female', 'nonbinary'];

    if (validGenders.includes(userMessage.toLowerCase())) {
        userSex = userMessage.toLowerCase();
        storeUserResponse('gender', userSex);
        currentQuestion = 2;

        // Get the height of the entire document
        return `
        What is your full name ? `;
    } else {
        return `
        I do not recognize your input.Please say female, male, or non - binary.
        `;
    }
}





/**
 * Process name input and move to the next question.
 * @param {string} userMessage - The user's name input.
 * @returns {string} - The bot's response.
 */
function processNameInput(userMessage) {
    const name = userMessage.split(" ");
    if (name.length > 1) {
        storeUserResponse('name', userMessage);
        currentQuestion = 3;
        return [`Nice name,${userMessage}!`, `<div class="age_grup">
        <label class="age_grup_tittle">
            Choose your age group and then click the submit button.
        </label>
        <div class="age_grup_body">
        <input type="radio" id="age1" name="age" value="Under 19">
        <label for="age1">Under 19</label><br>
        <input type="radio" id="age2" name="age" value="19 - 39">
        <label for="age2">19 - 39</label><br>
        <input type="radio" id="age3" name="age" value="40 - 64">
        <label for="age3">40 - 64</label><br>
        <input type="radio" id="age4" name="age" value="Over 65">
        <label for="age4">Over 65</label>
        </div>
    </div>`];
    } else {
        return `Please enter your first and last name.`;
    }
}

/**
 * Process age input.
 * @returns {string|boolean} - The selected age range or false if not selected.
 */
function processAgeInput() {
    const selectedAge = getAge();
    if (selectedAge) {
        storeUserResponse('age_range', selectedAge);
        currentQuestion = 4;
        return [`Great, thanks!`, `Please enter your height in inches.`];
    } else {
        return 'Please select your age!';
    }
}

/**
 * Process height input and move to the next question.
 * @param {string} userMessage - The user's height input.
 * @returns {string} - The bot's response.
 */
function processHeightInput(userMessage) {
    const result = getHeight(userMessage);
    if (result.error) {
        return result.message
    } else {
        storeUserResponse('height', result.message);
        currentHeight = result.message;
        currentQuestion = 5;
        return 'What is your weight?';
    }

}

/**
 * Process weight input and move to the next question.
 * @param {string} userMessage - The user's weight input.
 * @returns {string} - The bot's response.
 */
function processWeightInput(userMessage) {

    const result = getWeight(userMessage);
    if (result.error) {
        return result.message
    } else {
        storeUserResponse('weight', result.message);
        storeUserResponse('bmi', calculateBMI(result.message, currentHeight));

        currentQuestion = 6;
        return 'What is your U.S. shoe size? Format by U.S. size and group. For example, 8.5 womens, 10 mens, or 4.5 kids.?';
    }


}



/**
 * Process shoe size input and move to the next question.
 * Parses the user input to determine U.S. shoe size and category (kids, womens, mens).
 * @param {string} userMessage - The user input containing the size and category (e.g., '8.5 womens').
 * @returns {string} - A message indicating the recognized shoe size and category.
 */
function processShoeSizeInput(userMessage) {
    const result = getShoeSize(userMessage);

    if (result.error) {
        // Handle the error message
        return result.message;
    } else {
        const { size, category } = result;
        storeUserResponse('shoeSize', { size, category });
        // Handle the valid shoe size
        currentQuestion = 7;

        return `Your U.S. shoe size is ${size} ${category}. What is your bra size?`;
    }
}

/**
 * Process bra size input.
 * @param {string} userMessage - The user's bra size input.
 * @returns {string} - The bot's response.
 */
function processBraSizeInput(userMessage) {
    const result = getBraSize(userMessage);
    if (result.error) {
        return result.message;
    } else {
        storeUserResponse('braSize', { vol: result.message.vol, band: result.message.band });

        registerFormFillUp()
        let bodyModelerSection = document.querySelector('#bodyModelerSection');
        bodyModelerSection.style.display = "block";
        setTimeout(function() {
            scrollToNext(bodyModelerSection);
        }, 1500);
        return 'Use the next window to build a body model that best resembles your own body shape.';

    }
}


/**
 * Get the selected age from radio buttons.
 * @returns {string|boolean} - The selected age range or false if not selected.
 */
function getAge() {
    var radios = document.getElementsByName('age');
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return radios[i].value;
        }
    }
    return false;
}


/**
 * Process height input and return a status message.
 * @param {string} input - The user's height input.
 * @returns {string} - The status message.
 */

function getHeight(input) {
    var measurement;

    // Handle height input
    if (input.includes("cm") || input.includes("cent")) {
        var num = parseFloat(input);
        var inches = num / 2.54; // convert centimeters to inches
        measurement = inches.toFixed(2);
    } else if (input.includes("in")) {
        var splitNum = input.split("in");
        measurement = parseFloat(splitNum[0]);
    } else if (input.includes("'")) {
        var splitNum = input.split("'");
        var foot = parseFloat(splitNum[0]);
        var inch = parseInt(splitNum[1]);
        measurement = (foot * 12) + inch;
    } else if (input.includes(".")) {
        var height = parseFloat(input);
        measurement = height;
    } else {
        // Display an error message if the input format is not recognized

        return {
            error: true,
            message: `Please enter your height as inches or centimeters. For example, you can say 175cm or 70in.`
        }
    }
    // Validate the height
    if (measurement >= 58 && measurement <= 95) {


        return {
            error: false,
            message: measurement,
        };

    } else {
        return {
            error: true,
            massage: `My system only recognizes heights between 4'10" (58 inches) and 7'11" (95 inches). Please re-enter your height in inches.`
        }
    }
}


/**
 * Process weight input and return a BMI value or an error message.
 * @param {string} input - The user's weight input.
 * @param {string} sex - The user's gender.
 * @returns {number|string} - The BMI value or an error message.
 */
function getWeight(input) {
    var weight = input.match(/[\d\.]+|\D+/g);

    if (!weight || weight.length < 2) {
        return "Invalid input format. Please provide both a numerical value and a unit (e.g., 150 lbs or 70 kg).";
    }

    var wunit = parseInt(weight[0]);
    var metric = weight[1];

    if (metric !== null) {
        if (metric.match(/pound/g) || metric.match(/kilo/g) || metric.match(/lb/g) || metric.match(/kg/g)) {
            var wunit2 = (metric.match(/pound/g) || metric.match(/lb/g)) ? wunit : Math.round(wunit * 2.205);
            var errorMessage = validateWeight(wunit2);

            if (errorMessage) {

                return {
                    error: true,
                    message: errorMessage
                }
            } else {

                return { error: false, message: wunit2 }
            }


        } else {
            return "Invalid unit. Please use lbs or kgs (e.g., 150 lbs or 70 kg).";
        }
    } else {
        return "Invalid input format. Please provide both a numerical value and a unit (e.g., 150 lbs or 70 kg).";
    }
}

/**
 * Validate the weight and return an error message if it's outside the valid range.
 * @param {number} weight - The user's weight.
 * @returns {string|null} - The error message or null if weight is valid.
 */

function validateWeight(weight) {
    if (weight < 90 || weight > 350) {
        return "You have entered a weight that is dangerously unhealthy. Please enter a weight between 90 - 350lbs or 40 - 159kg to continue.";
    }
    return null;
}
/**
 * Calculate the BMI based on weight and height.
 * @param {number} weight - The user's weight.
 * @param {number} height - The user's height.
 * @returns {number} - The calculated BMI.
 */
function calculateBMI(weight, height) {

    // Add parseFloat to ensure numeric calculations
    var BMI = (parseFloat(weight) * 0.45) / (parseFloat(height) * 0.025 * parseFloat(height) * 0.025);

    console.log(`BMI: ${BMI}`);

    return BMI.toFixed(1);
}

/**
 * Determine the weight class based on height and sex.
 * @param {number} measurement - The user's height measurement.
 * @param {string} sex - The user's gender.
 * @returns {string} - The weight class.
 */

function getWeightClass(measurement, sex) {
    var weightClass;
    if (measurement >= 58 && measurement <= 95) {
        if ((sex != "male") && (measurement >= 58 && measurement < 77)) {
            if (measurement >= 58 && measurement < 63) {
                return weightClass = "short";
            } else if (measurement >= 63 && measurement < 67) {
                return weightClass = "average";
            } else if (measurement >= 67 && measurement < 71) {
                return weightClass = "above";
            } else if (measurement >= 71 && measurement < 77) {
                return weightClass = "tall";
            } else {
                if (measurement < 58) {
                    //anorexic
                } else {
                    //morbidly obese
                }
            }
        } else if ((sex == "male") && (measurement >= 58 && measurement < 95)) {

            if (measurement >= 58 && measurement < 68) {
                return weightClass = "short";
            } else if (measurement >= 68 && measurement < 74) {
                return weightClass = "average";
            } else if (measurement >= 74 && measurement < 80) {
                return weightClass = "above";
            } else if (measurement >= 80 && measurement < 95) {
                return weightClass = "tall";
            } else {
                if (measurement < 58) {
                    //anorexic
                } else {
                    //morbidly obese
                }
            }
        }
    }
}

/**
 * Parses the user input to determine U.S. shoe size and category (kids, womens, mens).
 * @param {string} input - The user input containing the size and category (e.g., '8.5 womens').
 * @returns {Object} - An object containing the recognized shoe size and category, or an object with error details.
 */
function getShoeSize(input) {
    // Use a regular expression to extract the numeric value and category from the input
    const match = input.match(/([\d.]+)\s*([a-zA-Z]+)/);

    // Check if the input is in the correct format
    if (!match) {
        return {
            error: true,
            message: 'Invalid shoe size. Please enter a numeric value followed by the unit (e.g., 8.5 womens).',
        };
    }

    // Extract the sizing and category from the regex match
    const sizing = parseFloat(match[1]);
    const category = match[2].toLowerCase();

    // Helper function to check if a size is within a specified range
    const isValidSize = (size, min, max) => size >= min && size <= max;

    // Switch statement to handle different shoe categories
    switch (category) {
        case 'kid':
        case 'kids':
            return isValidSize(sizing, 3.5, 7) ? { size: sizing, category: 'kids' } : invalidShoeSizeMessage();
        case 'women':
        case 'woman':
        case 'womens':
        case 'womans':
            return isValidSize(sizing, 4, 15.5) ? { size: sizing, category: 'womens' } : invalidShoeSizeMessage();
        case 'men':
        case 'mens':
        case 'man':
        case 'mans':
            return isValidSize(sizing, 6, 24) ? { size: sizing, category: 'mens' } : invalidShoeSizeMessage();
        default:
            return {
                error: true,
                message: `I only recognize U.S. women's, men's, and kids shoe sizes. Click to <a href="/sizing-and-conversions-chart" style="color:yellow">convert your foot metric</a> here. Re-enter your input when ready.`,
            };
    }
}

/**
 * Returns an error message for invalid shoe sizes.
 * @returns {Object} - An object with the error flag and message.
 */
function invalidShoeSizeMessage() {
    return {
        error: true,
        message: 'Invalid shoe size. Please enter a valid size for the specified category.',
    };
}





/**
 * Processes user input to determine bra size information for different countries.
 * @param {string} userInput - The user input containing the volume and band size (e.g., '32C').
 * @returns {string} - A message indicating the recognized bra size and country.
 */
function getBraSize(userInput) {
    // Convert input to uppercase for case-insensitive matching
    var uppercasedInput = userInput.toUpperCase();

    // Extract volume and band size from the input
    var sizeComponents = uppercasedInput.match(/[\d\.]+|\D+/g);
    var volume = sizeComponents[0];
    var bandSize = sizeComponents[1];

    // Define valid volume ranges for different countries
    var validVolRanges = {
        'Japan': { start: 55, end: 110, step: 5 },
        'US': { start: 26, end: 48, step: 2 }
        // Add more countries if needed
    };

    // Check if the provided volume and band sizes are valid for the US
    var isValidVolUS = isValidVolume(parseInt(volume), validVolRanges['US']);
    var isValidBandUS = isValidBandSize(bandSize);

    if (!(isNaN(volume)) && isValidBandUS && isValidVolUS) {
        return setBraSizeValue(volume, bandSize, 'US');
    } else if (!(isNaN(bandSize)) && isValidBandUS && isValidVolUS) {
        if (!(isNaN(isValidVolUS))) {

            convertAndSetJaCupAndBandSizes();
            return setBraSizeValue(volume, bandSize, 'Japan');
        } else {
            return {
                error: true,
                message: `The measurement you entered is unrecognized. Click here to <a href="/bra-conversion-chart">convert to a US bra size</a>`
            }
        }
    } else {
        return {
            error: true,
            message: `Enter a valid US bra measurement. Click here for help determining your <a href="/bra-conversion-chart">bra size</a>`
        }
    }

    /**
     * Checks if a volume size is within a valid range for a given country.
     * @param {number} size - The volume size to check.
     * @param {Object} range - The valid range for the country.
     * @returns {boolean} - True if the size is valid, false otherwise.
     */
    function isValidVolume(size, range) {
        return size >= range.start && size <= range.end && (size - range.start) % range.step === 0;
    }

    /**
     * Checks if a band size is valid for the US.
     * @param {string} band - The band size to check.
     * @returns {boolean} - True if the band size is valid, false otherwise.
     */
    function isValidBandSize(band) {
        var validBandUS = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'AAA', 'AA', 'DD', 'DDD', 'HH', 'HHH', 'JJ', 'KK'];
        return validBandUS.includes(band);
    }

    /**
     * Sets the bra size value for the specified country in the DOM.
     * @param {string} vol - The volume size.
     * @param {string} band - The band size.
     * @param {string} country - The country code.
     * @returns {Object} - An object containing the bra size details.
     */
    function setBraSizeValue(vol, band, country) {
        // Modify vol and band if needed
        convertAndSetJaCupAndBandSizes();

        return {
            error: false,
            message: {
                vol,
                band,
                country
            }
        };
    }

    /**
     * Converts and sets the Japanese cup and band sizes in the DOM.
     */
    function convertAndSetJaCupAndBandSizes() {
        // Mapping for Japanese cup sizes
        var jaCupMapping = {
            'A': 'AA',
            'B': 'A',
            'C': 'B',
            'D': 'C',
            'E': 'D',
            'F': 'DD',
            'G': 'DDD',
            'H': 'F',
            'I': 'G',
            'J': 'H',
            'K': 'I'
        };

        if (jaCupMapping[volume]) {
            volume = jaCupMapping[volume];
        }

        // Mapping for Japanese band sizes
        var jaBandMapping = {
            '60': '28',
            '65': '30',
            '70': '32',
            '75': '34',
            '80': '36',
            '85': '38',
            '90': '40',
            '95': '42',
            '100': '44',
            '105': '46',
            '110': '48'
        };

        if (jaBandMapping[bandSize]) {
            bandSize = jaBandMapping[bandSize];
        }
    }



}



/**
 * Global  Script
 * This script handles all common script.
 */

// DOM element
//all dom element will be there/**
/* scrollToNext will move to the next section.
 * @param {string} element - The user's name input.
 * @returns {string} - The bot's response.
 */
function scrollToNext(nextElement) {
    const isMobile = window.innerWidth <= 768;

    // If the device is mobile, do nothing and return early
    if (isMobile && nextElement) {
        setTimeout(() => {
            nextElement.scrollIntoView({ behavior: 'smooth', block: 'end' });
        }, 500)
        return;
    }


    let duration = 1000; // Adjust the duration as needed
    let start = window.pageYOffset;
    let end = document.body.offsetHeight - window.innerHeight;
    console.log('End', end, document.body.offsetHeight, window.innerHeight);
    // Adjusted for scrolling from top to bottom
    let startTime;

    function scrollAnimation(currentTime) {
        if (!startTime) startTime = currentTime;

        let progress = currentTime - startTime;
        let easeInOutQuad = progress => progress < 0.5 ? 2 * progress * progress : -1 + (4 - 2 * progress) * progress;

        window.scrollTo(0, start + (end - start) * easeInOutQuad(progress / duration));

        if (progress < duration) {
            window.requestAnimationFrame(scrollAnimation);
        }
    }

    window.requestAnimationFrame(scrollAnimation);
}



/**
 * Scroll to the bottom of an element with animation.
 * @param {HTMLElement} element - The element to scroll.
 * @param {number} duration - The duration of the scroll animation.
 */
function scrollToBottom(element, duration) {
    var start = element.scrollTop;
    var target = element.scrollHeight - element.clientHeight;
    var currentTime = 0;
    var increment = 20;

    function animateScroll() {
        currentTime += increment;
        var easing = Math.sin(currentTime / duration * (Math.PI / 2));
        element.scrollTop = start + easing * (target - start);

        if (currentTime < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    animateScroll();
}
/**
 * Initializes the slider functionality for desktop view.
 * The function checks if the current device is not mobile (window width > 768 pixels).
 * If it's not mobile, the function sets up a slider with specific behaviors.
 */
function initializeHorizontalScroll() {
    // Check if the current device is a mobile device (window width <= 768 pixels)
    const isMobile = window.innerWidth <= 768;

    // If the device is mobile, do nothing and return early
    if (isMobile) {
        return;
    }

    // Select all elements with the class "section" to be used as slider items
    const items = document.querySelectorAll(".section");

    // Select the main slider container
    const slider = document.querySelector(".main_container_wrapper");

    // Variables to store slider width, item width, and current scroll position
    let sliderWidth;
    let itemWidth;
    let currentPos = 0;

    /**
     * Initializes the slider by setting up initial properties,
     * such as the slider width and the body height.
     */
    function init() {
        sliderWidth = slider.getBoundingClientRect().width;
        itemWidth = sliderWidth / items.length;
        document.body.style.height = `${
    sliderWidth - (window.innerWidth - window.innerHeight)
}px`;
    }

    /**
     * Sets the width of the slider based on the combined width of its items.
     */
    function setSliderWidth() {
        let totalWidth = 0;
        items.forEach((item) => {
            totalWidth += item.offsetWidth;
        });

        slider.style.width = `${totalWidth}px`;
    }

    /**
     * Animates the slider by updating its position based on the current scroll position.
     * This function is called recursively using requestAnimationFrame for smooth animation.
     */
    function animate() {
        init();
        setSliderWidth();
        currentPos = window.scrollY;
        slider.style.transform = `translateX(${-currentPos}px)`;
        requestAnimationFrame(animate);
    }

    // Start the animation loop to continuously update the slider position
    animate();
}



// Wait for the HTML content to be fully loaded before executing the script
document.addEventListener("DOMContentLoaded", function() {
    // Select the loader container element using its class
    const loaderContainer = document.querySelector('.loader-container');

    // Hide the loader container once the content is fully loaded
    if (loaderContainer !== null) {
        loaderContainer.style.display = 'none';
    }

});

/**
 * Home page  Script
 * This script handles all home script.
 */
// DOM element

function validateUserType() {
    const userType = document.getElementById('selectedUserType').value;
    const agreeCheckbox = document.getElementById('agreeBtn');

    if (userType === '') {
        alert(`Please select a user type`);
        return false;
    } else if (!agreeCheckbox.checked) {
        alert(`Please agree that you are above 18 years old`);
        return false;
    } else {
        return userType;
    }
}

function hideSections(sections) {
    sections.forEach(section => {
        if (section.style.display !== 'none') {
            section.style.display = 'none';
        }
    });
}

function userRegisterChecker() {
    const userType = validateUserType();
    const sopiaChatSection = document.querySelector('#sopiaChatSection');
    const advertiserSection = document.querySelector('#advertiserSection');
    const bodyModelerSection = document.querySelector('#bodyModelerSection');
    const registationSection = document.querySelector('#registationSection');
    const retailerSection = document.querySelector('#retailerSection');

    const commonSections = [sopiaChatSection, advertiserSection, bodyModelerSection, registationSection, retailerSection];

    hideSections(commonSections);
    storeUserResponse('user_type', userType);
    console.log(userType);
    console.log(userResponses);
    switch (userType) {
        case 'retailer':
            retailerSection.style.display = 'flex';
            setTimeout(() => scrollToNext(retailerSection), 500);
            break;
        case 'influencer':
        case 'shopper':

            sopiaChatSection.style.display = 'flex';
            setTimeout(() => scrollToNext(sopiaChatSection), 500);
            break;
        case 'advertiser':
            document.querySelector("#advertiserSection input[name='user_type']").value = userType;
            advertiserSection.style.display = 'flex';
            setTimeout(() => scrollToNext(advertiserSection), 500);
            break;
        default:
            // Code to execute if none of the cases match
            break;
    }
}
/**
 * Populates the registration form fields with data from the userResponses object.
 * @function
 */
/**
 * Populates the registration form fields with data from the userResponses object.
 * @function
 */
function registerFormFillUp() {
    // Mapping between form input names and corresponding properties in userResponses
    const inputMappings = {
        'name': 'name',
        'bust': ['braSize.vol', 'braSize.band'],
        'shoe_size': ['shoeSize.size', 'shoeSize.category'],
        'weight': 'weight',
        'height': 'height',
        'bmi': 'bmi',
        'age_range': 'age_range',
        'gender': 'gender'
    };
    console.log(userResponses)

    for (const [inputName, userResponseProp] of Object.entries(inputMappings)) {

        // Constructing the query selector for the input element within the registration form
        let prefixEl = `#userRegisterForm`;
        let inputElement = document.querySelector(`${prefixEl} input[name='${inputName}']`);

        // Check if the input element exists
        if (inputElement !== null) {
            // Special handling for radio buttons
            if (inputElement.type === 'radio') {
                // Find the radio button with the matching value and set it as checked
                let radioWithValue = document.querySelector(`input[name='${inputName}'][value='${getNestedPropertyValue(userResponses, userResponseProp)}']`);
                if (radioWithValue !== null) {
                    radioWithValue.checked = true;
                }
            } else {
                // Set the value for other input types
                let value = typeof userResponseProp === 'string' ?
                    getNestedPropertyValue(userResponses, userResponseProp) :
                    userResponseProp.map(prop => getNestedPropertyValue(userResponses, prop)).join(', ');

                inputElement.value = value;
            }
        }
    }
}


/**
 * Helper function to retrieve nested property value from an object.
 * @function
 * @param {Object} obj - The object from which to retrieve the nested property value.
 * @param {string} propPath - The path to the nested property (e.g., 'braSize.vol').
 * @returns {*} - The value of the nested property.
 */
function getNestedPropertyValue(obj, propPath) {
    return propPath.split('.').reduce((o, p) => o[p], obj);
}

function goToNextSection(element) {
    const sopiaChatSection = document.querySelector('#sopiaChatSection');
    const advertiserSection = document.querySelector('#advertiserSection');
    const bodyModelerSection = document.querySelector('#bodyModelerSection');
    const registationSection = document.querySelector('#registationSection');
    const retailerSection = document.querySelector('#retailerSection');
    const FashionProfessionalSection = document.querySelector('#FashionProfessionalSection');

    const commonSections = [sopiaChatSection, advertiserSection, bodyModelerSection, registationSection, retailerSection, FashionProfessionalSection];

    hideSections(commonSections);
    let section = document.querySelector(element);
    section.style.display = "block";
    setTimeout(function() {
        scrollToNext(section);
    }, 1500);
}

function goToRegisterSection(element) {
    let section = document.querySelector(element);
    section.style.display = "block";
    setTimeout(function() {
        scrollToNext(section);
    }, 1500);
}


/**
 * Initializes the body modeler JavaScript functionality.
 * @function
 */


function femaleSkinnyInit() {
    const featureHead = new Image();
    const featureNeck = new Image();
    const featureShoulders = new Image();
    const featureBreast = new Image();
    const featureStomach = new Image();
    const featureLegs = new Image();


    /*---- source image differs for each modeler ----*/
    featureHead.src = assetBaseUrl + "/assets/img/sprite/female/Female-Skinny-Head.png"; //name of modeler changes, nothing else

    featureNeck.src = assetBaseUrl + "/assets/img/sprite/female/Female-Skinny-Neck.png";
    featureShoulders.src = assetBaseUrl + "/assets/img/sprite/female/Female-Skinny-Shoulders.png";
    featureBreast.src = assetBaseUrl + "/assets/img/sprite/female/Female-Skinny-Breast.png";
    featureStomach.src = assetBaseUrl + "/assets/img/sprite/female/Female-Skinny-Stomach.png";
    featureLegs.src = assetBaseUrl + "/assets/img/sprite/female/Female-Skinny-Legs.png";

    const head = document.getElementById("canvas_head");
    const head_ctx = head.getContext("2d");
    const feature_width = 500;
    const head_width = head.width = 500;
    const head_height = head.height = 100;

    /*--- neck ---*/
    const neck = document.getElementById('canvas_neck');
    const neck_ctx = neck.getContext('2d');
    const neck_width = neck.width = 500;
    const neck_height = neck.height = 100;

    /*--- Breast ---*/
    const breast = document.getElementById('canvas_breast');
    const breast_ctx = breast.getContext('2d');
    const breast_width = breast.width = 500;
    const breast_height = breast.height = 195;

    /*--- Shoulders ---*/
    const shoulders = document.getElementById('canvas_shoulders');
    const shoulders_ctx = shoulders.getContext('2d');
    const shoulders_width = shoulders.width = 500;
    const shoulders_height = shoulders.height = 236;

    /*--- Stomach ---*/
    const stomach = document.getElementById('canvas_stomach');
    const stomach_ctx = stomach.getContext('2d');
    const stomach_width = stomach.width = 500;
    const stomach_height = stomach.height = 266;

    /*--- Legs ---*/
    const legs = document.getElementById('canvas_legs');
    const legs_ctx = legs.getContext('2d');
    const legs_width = legs.width = 500;
    const legs_height = legs.height = 460;

    /*--- Rear Model ---*/
    const head_rear = document.getElementById("canvas_head_rear");
    const head_rear_ctx = head_rear.getContext("2d");
    const head_rear_width = head_rear.width = 500;
    const head_rear_height = head_rear.height = 100;

    const neck_rear = document.getElementById('canvas_neck_rear');
    const neck_rear_ctx = neck_rear.getContext('2d');
    const neck_rear_width = neck_rear.width = 500;
    const neck_rear_height = neck_rear.height = 100;

    const shoulders_rear = document.getElementById('canvas_shoulders_rear');
    const shoulders_rear_ctx = shoulders_rear.getContext('2d');
    const shoulders_rear_width = shoulders_rear.width = 500;
    const shoulders_rear_height = shoulders_rear.height = 236;

    const back = document.getElementById('canvas_back');
    const back_ctx = back.getContext('2d');
    const back_width = back.width = 500;
    const back_height = back.height = 266;

    const bottom = document.getElementById('canvas_bottom');
    const bottom_ctx = bottom.getContext('2d');
    const bottom_width = bottom.width = 500;
    const bottom_height = bottom.height = 460;

    featureHead.onload = () => { head_ctx.drawImage(featureHead, 0, 0, feature_width, head_height, 0, 0, feature_width, head_height); }
    featureNeck.onload = () => { neck_ctx.drawImage(featureNeck, 0, 0, feature_width, neck_height, 0, 0, feature_width, neck_height); }
    featureBreast.onload = () => { breast_ctx.drawImage(featureBreast, 0, 0, feature_width, breast_height, 0, 0, feature_width, breast_height); }
    featureShoulders.onload = () => { shoulders_ctx.drawImage(featureShoulders, 0, 0, feature_width, shoulders_height, 0, 0, feature_width, shoulders_height); }
    featureStomach.onload = () => { stomach_ctx.drawImage(featureStomach, 0, 0, feature_width, stomach_height, 0, 0, feature_width, stomach_height); }
    featureLegs.onload = () => { legs_ctx.drawImage(featureLegs, 0, 0, feature_width, legs_height, 0, 0, feature_width, legs_height); }

    function animate_head(headShape, headWidth) {
        head_ctx.clearRect(0, 0, head_width, head_height);
        head_ctx.drawImage(featureHead, headShape, headWidth, head_width, head_height, 0, 0, head_width, head_height);
    };

    function animate_neck(neckWidth, neckHeight) {
        neck_ctx.clearRect(0, 0, neck_width, neck_height);
        neck_ctx.drawImage(featureNeck, neckWidth, neckHeight, neck_width, neck_height, 0, 0, neck_width, neck_height);
    };

    function animate_shoulder(shoulderHeight, shoulderWidth) {
        shoulders_ctx.clearRect(0, 0, shoulders_width, shoulders_height);
        shoulders_ctx.drawImage(featureShoulders, shoulderWidth, shoulderHeight, shoulders_width, shoulders_height, 0, 0, shoulders_width, shoulders_height);
    };

    function animate_stomach(stomachShape, stomachWidth) {
        stomach_ctx.clearRect(0, 0, stomach_width, stomach_height);
        stomach_ctx.drawImage(featureStomach, stomachWidth, stomachShape, stomach_width, stomach_height, 0, 0, stomach_width, stomach_height);

    };

    function animate_leg(legWidth, legSize) {
        legs_ctx.clearRect(0, 0, legs_width, legs_height);
        legs_ctx.drawImage(featureLegs, legSize, legWidth, legs_width, legs_height, 0, 0, legs_width, legs_height);

    };

    function animate_breast(breastWidth, breastHeight) {
        breast_ctx.clearRect(0, 0, breast_width, breast_height);
        breast_ctx.drawImage(featureBreast, breastWidth, breastHeight, breast_width, breast_height, 0, 0, breast_width, breast_height);
    };




    let topmostObj = document.querySelectorAll(".topmost");

    topmostObj.forEach(function(elem) {
        elem.addEventListener('change', function() {
            let head_shape_slide_value = document.getElementById("slider-head-shape").value;
            let headElem = document.getElementById("canvas_head");
            let neckElem = document.getElementById("canvas_neck");
            let breastElem = document.getElementById("canvas_breast");
            let shouldersElem = document.getElementById("canvas_shoulders");
            let head_size_slide_value = document.getElementById("slider-head-size").value;
            let NHSV = document.getElementById("slider-neck-height").value;
            let NWSV = document.getElementById("slider-neck-width").value;
            let breast_size_slide_value = document.getElementById("slider-breast-size").value;
            let shoulder_height_slide_value = document.getElementById("slider-shoulder-height").value;
            let shoulder_width_slide_value = document.getElementById("slider-shoulder-width").value;
            let stomach_shape_slide_value = document.getElementById("slider-stomach-shape").value;
            let arm_size_slide_value = document.getElementById("slider-arm-size").value;
            let arm_length_slide_value = document.getElementById("slider-arm-length").value;
            let torso_height_slide_value = document.getElementById("slider-torso-height").value;
            let leg_size_slide_value = document.getElementById("slider-leg-size").value;
            let hip_size_slide_value = document.getElementById("slider-hip-size").value;
            let crotch_height_slide_value = document.getElementById("slider-crotch-height").value;

            let neck_height_max = parseInt(document.getElementById("slider-neck-height").getAttribute("max"));
            let neck_width_max = parseInt(document.getElementById("slider-neck-width").getAttribute("max"));
            let breast_max = parseInt(document.getElementById("slider-breast-size").getAttribute("max"));
            let shoulder_height_max = parseInt(document.getElementById("slider-shoulder-height").getAttribute("max"));
            let shoulder_width_max = parseInt(document.getElementById("slider-shoulder-width").getAttribute("max"));
            let arm_size_max = parseInt(document.getElementById("slider-arm-size").getAttribute("max"));
            let stomach_shape_max = parseInt(document.getElementById("slider-stomach-shape").getAttribute("max"));
            let leg_size_max = parseInt(document.getElementById("slider-leg-size").getAttribute("max"));
            let hip_size_max = parseInt(document.getElementById("slider-hip-size").getAttribute("max"));
            let bottom_shape = parseInt(document.getElementById("slider-crotch-height").getAttribute("max"));

            currHeadPos = 222;
            currNeckPos = 271;
            currBreastPos = 347;
            currShouldersPos = 364;
            headInc = 4;
            torsoInc = 10;
            bustInc = shoulder_height_slide_value * 2;
            headMove = NHSV * headInc;
            newPos = currHeadPos + (parseInt(headMove) + parseInt(NWSV));

            let getNeckHeight = ((neck_height_max + 1) * neck_height) * shoulder_height_slide_value;
            let getShoulderHeight = ((arm_size_max + 1) * shoulders_height); //236
            let getTorsoHeight = ((stomach_shape_max + 1) * stomach_height);
            let sizeHip = ((leg_size_max + 1) * legs_width) * hip_size_slide_value;
            let getCrotchHeight = ((leg_size_max + 1) * (hip_size_max + 1) * legs_width) * crotch_height_slide_value;
            let arm_distention = ((shoulder_width_max + 1) * shoulders_width) * arm_length_slide_value;
            let headShape = head_height * head_shape_slide_value;
            let headWidth = head_width * head_size_slide_value;
            headElem.style.top = `${newPos - (torsoInc * torso_height_slide_value)}px`;
            let neckWidth = neck_width * NWSV;
            let neckHeight = getNeckHeight + (neck_height * NHSV);
            neckElem.style.top = `${currNeckPos - (torsoInc * torso_height_slide_value)}px`;
            let breastShape = breast_width * breast_size_slide_value;
            let breastSize = ((breast_max + 1) * breast_height) * shoulder_width_slide_value;
            breastElem.style.top = `${(currBreastPos + bustInc) - (torsoInc * torso_height_slide_value)}px`;
            let shoulderHt = getShoulderHeight * shoulder_height_slide_value + (shoulders_height * arm_size_slide_value);
            let shoulderWidth = (shoulders_width * shoulder_width_slide_value) + arm_distention;
            shouldersElem.style.top = `${currShouldersPos - (torsoInc * torso_height_slide_value)}px`;
            let stomachShape = (stomach_height * stomach_shape_slide_value) + (torso_height_slide_value * getTorsoHeight);
            let stomachWidth = (stomach_width * shoulder_width_slide_value);
            let legSize = (legs_width * leg_size_slide_value) + sizeHip + getCrotchHeight;
            let legs2 = legs_height * shoulder_width_slide_value;
            //let shapeBottom = bottom_shape * ;           

            if (stomach_shape_slide_value <= 1) { //average, curvy stomach
                n = 0;
                x = 0;
                var legWidth = legs2 + n;
                var shoulderHeight = shoulderHt + x;
                var breastHeight = breastSize;
            } else if (stomach_shape_slide_value == 2) { //MT
                n = 0;
                x = 0;
                var legWidth = legs2 + n;
                var shoulderHeight = shoulderHt + x;
                var breastHeight = breastSize;
            } else if (stomach_shape_slide_value == 3) { //rectangle
                n = 4140; //hard coded due to unequal number of images on each sprites
                x = (shoulder_height_max + 1) * (arm_size_max + 1) * shoulders_height;
                a = (breast_max + 1) * breast_height;
                var legWidth = legs2 + n;
                var shoulderHeight = shoulderHt + x;
                var breastHeight = breastSize + a;
                console.log("value spoon: " + x);
            } else { //MT spoon 
                n = 8280;
                x = 0;
                var legWidth = legs2 + n;
                var shoulderHeight = shoulderHt + x;
                var breastHeight = breastSize;
            }

            animate_head(headWidth, headShape);
            animate_neck(neckWidth, neckHeight);
            animate_breast(breastShape, breastHeight);
            animate_shoulder(shoulderHeight, shoulderWidth);
            animate_stomach(stomachShape, stomachWidth);
            animate_leg(legWidth, legSize);
        });
    });
}


/**
 * Toggles the visibility of the password field and updates the visibility icon accordingly.
 */
function togglePasswordVisibility() {
    // Get the password field element
    var passwordField = document.getElementById("pass");
    // Get the visibility icon element
    var showPassImage = document.getElementById("showPassWord");

    // If the password field is currently hidden
    if (passwordField.type === "password") {
        // Show the password field
        passwordField.type = "text";
        // Update the visibility icon to show the hide password image
        showPassImage.src = assetBaseUrl + "/assets/img/login/show_pass.png";
    } else {
        // Otherwise, if the password field is currently visible
        // Hide the password field
        passwordField.type = "password";
        // Update the visibility icon to show the show password image
        showPassImage.src = assetBaseUrl + "/assets/img/login/hide_pass.png";
    }
}


/**
 * Toggles the visibility of modeler sections based on the selected option.
 * @param {HTMLSelectElement} selectElement - The dropdown element containing modeler options.
 */
function toggleControllers(selectElement) {
    // Define a mapping of modeler classes to corresponding DOM elements.
    const modelersGroup = {
        head_and_neck: document.querySelector('.head_and_neck'),
        shoulder_and_arm: document.querySelector('.shoulder_and_arm'),
        breast_and_torso: document.querySelector('.breast_and_torso'),
        leg_and_hip: document.querySelector('.leg_and_hip')
    };

    // Get the selected value from the dropdown.
    const selectedValue = selectElement.value;

    // Hide all modeler sections initially.
    hideSections(Object.values(modelersGroup));

    // Get the controls wrapper element.
    const controlsWrap = document.querySelector('.controls');

    // Toggle the visibility of the controls wrapper based on the selected value.
    controlsWrap.style.display = selectedValue ? 'block' : 'none';

    // Show the selected modeler section if a valid option is chosen.
    if (selectedValue && modelersGroup[selectedValue]) {
        modelersGroup[selectedValue].style.display = 'block';
    }
}

/**
 * Toggles the visibility of the controls wrapper and associated icons.
 */
function toggleCollapse() {
    // Get the controls wrapper and icon elements.
    const controlsWrap = document.querySelector('.controls');
    const plusIcon = document.querySelector('.collapsible .plus');
    const minusIcon = document.querySelector('.collapsible .minus');

    // Toggle the display property of the controls wrapper and update icons accordingly.
    controlsWrap.style.display = controlsWrap.style.display === 'block' || controlsWrap.style.display === '' ? 'none' : 'block';
    plusIcon.style.display = controlsWrap.style.display === 'block' ? 'none' : 'block';
    minusIcon.style.display = controlsWrap.style.display === 'block' ? 'block' : 'none';
}

function toggleMenu(id) {

    let toggle = document.querySelector(id);

    if (toggle.style.left == '0px') {
        toggle.style.left = ' -150%'
        toggle.style.width = '0'
        document.body.style.overflow = "scroll"

    } else {
        document.body.style.overflow = "hidden"
        toggle.style.left = '0px'
        toggle.style.width = '100vw'
    }
}

function mainNavBarInit() {
    let menu_container = document.querySelector('.menu_container');

    if (menu_container.style.display == 'none' || menu_container.style.display == '') {

        menu_container.style.display = 'block'
        menu_container.style.top = '75px'
    } else {
        menu_container.style.display = 'none'
        menu_container.style.top = ' -120%'
    }

}

function formValidateInit() {
    const emailEl = document.querySelector('#email');
    const passwordEl = document.querySelector('#password');
    const confirmPasswordEl = document.querySelector('#passwordConfirm');
    const form = document.querySelector('#regForm');



    const checkEmail = () => {
        let valid = false;
        const email = emailEl.value.trim();
        if (!isRequired(email)) {
            showError(emailEl, 'Email cannot be blank.');
        } else if (!isEmailValid(email)) {
            showError(emailEl, 'Email is not valid.')
        } else {
            showSuccess(emailEl);
            valid = true;
        }
        return valid;
    };

    const checkPassword = () => {
        let valid = false;


        const password = passwordEl.value.trim();

        if (!isRequired(password)) {
            showError(passwordEl, 'Password cannot be blank.');
        } else {
            showSuccess(passwordEl);
            valid = true;
        }

        return valid;
    };

    const checkConfirmPassword = () => {
        let valid = false;
        // check confirm password
        const confirmPassword = confirmPasswordEl.value.trim();
        const password = passwordEl.value.trim();

        if (!isRequired(confirmPassword)) {
            showError(confirmPasswordEl, 'Please enter the password again');
        } else if (password !== confirmPassword) {
            showError(confirmPasswordEl, 'The password does not match');
        } else {
            showSuccess(confirmPasswordEl);
            valid = true;
        }

        return valid;
    };

    const isEmailValid = (email) => {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

    // const isPasswordSecure = (password) => {
    //     const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    //     return re.test(password);
    // };

    const isRequired = value => value === '' ? false : true;
    const isBetween = (length, min, max) => length < min || length > max ? false : true;


    const showError = (input, message) => {
        // get the form-field element
        const formField = input.parentElement;
        // add the error class
        formField.classList.remove('success');
        formField.classList.add('error');

        // show the error message
        const error = formField.querySelector('small');
        error.textContent = message;
    };

    const showSuccess = (input) => {
        // get the form-field element
        const formField = input.parentElement;

        // remove the error class
        formField.classList.remove('error');
        formField.classList.add('success');

        // hide the error message
        const error = formField.querySelector('small');
        error.textContent = '';
    }

    if (form != null) {
        form.addEventListener('submit', function(e) {
            // prevent the form from submitting
            // e.preventDefault();



            let isEmailValid = checkEmail(),
                isPasswordValid = checkPassword(),
                isConfirmPasswordValid = checkConfirmPassword();

            let isFormValid =
                isEmailValid &&
                isPasswordValid &&
                isConfirmPasswordValid;

            // submit to the server if the form is valid
            if (isFormValid) {

                document.querySelector('#regForm').submit();
            } else {
                e.preventDefault();
            }

            // validate fields

        });
    }



    const debounce = (fn, delay = 5000) => {
        let timeoutId;
        return (...args) => {
            // cancel the previous timer
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            // setup a new timer
            timeoutId = setTimeout(() => {
                fn.apply(null, args)
            }, delay);
        };
    };

    if (form != null) {
        form.addEventListener('input', debounce(function(e) {
            switch (e.target.id) {

                case 'email':
                    checkEmail();
                    break;
                case 'password':
                    checkPassword();
                    break;
                case 'passwordConfirmation':
                    checkConfirmPassword();
                    break;
            }
        }));
    }
}